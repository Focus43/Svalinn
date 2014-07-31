<?php defined('C5_EXECUTE') or die(_("Access Denied."));

    /**
     * Class ShopifiableWebhookCollections
     * Handle calls from the Shopify webhook on collection events.
     */
    class ShopifiableWebhookCollections {

        /**
         * Purge the cache.
         */
        protected static function purgeCache(){
            // Unset the /store page from the full page cache
            $cache = PageCache::getLibrary();
            $cache->purge(Page::getByPath('/store'));
            // Purge redis data
            ConcreteRedis::db()->del(Shopifiable::REDIS_SMART_COLLECTIONS);
        }


        /**
         * For now all we're doing is purging the cache.
         * @param null $postBody
         */
        public static function create( $postBody = null ){
            self::purgeCache();
            Log::addEntry("New Collection added: \n" . print_r($postBody,true));
        }


        /**
         * For now all we're doing is purging the cache.
         * @param null $postBody
         */
        public static function update( $postBody = null ){
            self::purgeCache();
            Log::addEntry("Collections updated: \n" . print_r($postBody,true));
        }


        /**
         * For now all we're doing is purging the cache.
         * @param null $postBody
         */
        public static function delete( $postBody = null ){
            self::purgeCache();
            Log::addEntry("Collection deleted: \n" . print_r($postBody,true));
        }

    }