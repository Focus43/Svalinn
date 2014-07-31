<?php defined('C5_EXECUTE') or die(_("Access Denied."));

    /**
     * Add authorization of some sort...
     */
    try {
        // getallheaders() is unreliable across environments (ie. w/ FastCGI in prod), so
        // use the standard $_SERVER variable here
        $webhookTasks   = explode('/', $_SERVER['HTTP_X_SHOPIFY_TOPIC']);
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

        // This doesn't matter; Shopify's webhooks only look for HTTP 201 header response
        print_r($webhookTasks);
    }catch(Exception $e){
        Log::addEntry(sprintf(
            "Failed webhook - Exception: %s\n\nHeaders:%s\n\nBody:%s\n",
            $e->getMessage(),
            print_r(getallheaders(), true),
            print_r(file_get_contents('php://input'), true)
        ));
    }