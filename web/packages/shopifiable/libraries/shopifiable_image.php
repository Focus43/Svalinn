<?php defined('C5_EXECUTE') or die("Access Denied.");

    /**
     * Yes singletons suck, but just use it...
     * Class ShopifiableImage
     */
    class ShopifiableImage extends ImageHelper {

        const CACHED_IMAGE_WIDTH  = 800,
              CACHED_IMAGE_HEIGHT = 550;

        protected $fileHelper;

        protected static $instance = null;

        // Prevent direct instantiation view 'new'
        protected function __construct(){
            $this->fileHelper = Loader::helper('file');
        }

        protected static function _instance(){
            if( self::$instance === null ){
                self::$instance = new self;
            }
            return self::$instance;
        }


        public static function getOrCreate( $httpImageSrc ){
            $fileName = self::getCachedFileName($httpImageSrc);
            $filePath = self::getCachedFileSystemDir($fileName);

            // Ensure the {root}/files/cache/shopifiable directory exists
            if( !is_dir(SHOPIFIABLE_IMAGE_CACHE_DIR) ){
                @mkdir(SHOPIFIABLE_IMAGE_CACHE_DIR, DIRECTORY_PERMISSIONS_MODE);
                @chmod(SHOPIFIABLE_IMAGE_CACHE_DIR, DIRECTORY_PERMISSIONS_MODE);
            }

            // If the file doesn't exist, then create it
            if( ! file_exists($filePath) ){
                self::_instance()->create($httpImageSrc, $filePath, self::CACHED_IMAGE_WIDTH, self::CACHED_IMAGE_HEIGHT, true);
            }

            // Return the URL to the cached image
            return SHOPIFIABLE_IMAGE_CACHE_URL . $fileName;
        }


        public static function getCachedFileName( $httpImageSrc ){
            return md5($httpImageSrc) . '.' . self::_instance()->fileHelper->getExtension(preg_replace('/\?.*/', '', $httpImageSrc));
        }


        protected static function getCachedFileSystemDir( $cachedFileName ){
            return SHOPIFIABLE_IMAGE_CACHE_DIR . $cachedFileName;
        }

    }