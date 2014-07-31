<?php defined('C5_EXECUTE') or die(_("Access Denied."));

    /**
     * Class ShopifiableWebhookProducts
     * This class doesn't handle any image processing or anything else; all it does is
     * take the data passed by Shopify's webhook (a product) and serializes it in a tmp
     * directory for later processing by a Job.
     *
     * @todo: bust existing page caches and cached objects in Redis
     * @todo:
     */
    class ShopifiableWebhookProducts {

        const QUEUE_TMP_DIR = 'product_queue';


        /**
         * Pass a filename and a string and this will write the file to the tmp directory.
         * @param string $fileName
         * @param mixed $data
         * @return void
         */
        protected static function putToTmpDir( $fileName, $data ){
            $fileHelper   = Loader::helper('file');
            $tmpDirectory = $fileHelper->getTemporaryDirectory();
            $tmpQueued    = $tmpDirectory . '/' . self::QUEUE_TMP_DIR;

            // Create temp directory if doesn't exist
            if( ! is_dir($tmpQueued) ){
                @mkdir($tmpQueued, DIRECTORY_PERMISSIONS_MODE);
                @chmod($tmpQueued, DIRECTORY_PERMISSIONS_MODE);
            }

            // If a file already exists, delete the existing one first (always want latest)
            if( is_file("{$tmpQueued}/{$fileName}") ){
                unlink("{$tmpQueued}/{$fileName}");
            }

            // Create the new file
            $fileHelper->append("{$tmpQueued}/{$fileName}", serialize($data));
        }


        /**
         * Handle the "create" webhook.
         * @param stdClass $postBody Product JSON from the webhook.
         * @return void
         */
        public static function create( $postBody = null ){
            $fileName = md5($postBody->id);
            self::putToTmpDir($fileName, $postBody);
            Log::addEntry(print_r($postBody,true));
        }


        /**
         * Handle the "update" webhook.
         * @param stdClass $postBody Product JSON from the webhook.
         * @return void
         */
        public static function update( $postBody = null ){
            $fileName = md5($postBody->id);
            self::putToTmpDir($fileName, $postBody);
            Log::addEntry("Updated product {$postBody->handle}");
        }

    }