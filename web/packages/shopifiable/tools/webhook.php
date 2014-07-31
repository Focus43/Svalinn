<?php defined('C5_EXECUTE') or die(_("Access Denied."));

    /**
     * getallheaders() is unreliable across environments (eg. w/ FastCGI in production on
     * Pagodabox, unless its running PHP 5.4.x, it fails) - so to better parse the
     * incoming HTTP request headers, use the $_SERVER variable here...
    */
    $httpKeys = array_filter(array_keys($_SERVER), function($k){
        return (bool) (strpos($k,'HTTP',0) !== false);
    });
    $httpRequestHeaders = array_intersect_key($_SERVER, array_flip($httpKeys));


    /**
     * @todo: Add authorization of some sort...
     */
    try {
        // getallheaders() is unreliable across environments (ie. w/ FastCGI in prod), so
        // use the standard $_SERVER variable here
        $webhookTasks   = explode('/', $httpRequestHeaders['HTTP_X_SHOPIFY_TOPIC']);
        $webhookClass   = 'ShopifiableWebhook' . ucfirst($webhookTasks[0]);
        $webhookMethod  = $webhookTasks[1];
        $postBody       = json_decode(file_get_contents('php://input'));

        // Register the proper class for autoloading
        Loader::registerAutoload(array(
            $webhookClass => array('library', sprintf('webhooks/%s', $webhookTasks[0]), 'shopifiable')
        ));

        // Throw an exception if class method can't be reached
        if( ! is_callable(array($webhookClass, $webhookMethod)) ){
            throw new Exception(sprintf('Class: %s, Method: %s', $webhookClass, $webhookMethod));
        }

        // Call ShopifiableWebhook{$webhookClass}::$webhookMethod} w/ $postBody as parameter
        call_user_func_array(array($webhookClass, $webhookMethod), array($postBody));
    }catch(Exception $e){
        Log::addEntry(sprintf(
            "Failed webhook - Exception: %s\n\nHeaders:%s\n\nBody:%s\n",
            $e->getMessage(),
            print_r($httpRequestHeaders, true),
            print_r(file_get_contents('php://input'), true)
        ));
    }