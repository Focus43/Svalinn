<?php defined('C5_EXECUTE') or die(_("Access Denied."));
	
	class ShopifiablePackage extends Package {

        // Shopify credentials; can hard-code in if preferred
        const API_KEY   = '3791e5dce66c68ed8166de3d21b0a18f',
              PASSWORD  = 'eb2d8d90aadd6cc44de31abe1e6c5c9d',
              HOST_NAME = 'svalinn.myshopify.com';


	    protected $pkgHandle 			= 'shopifiable';
	    protected $appVersionRequired 	= '5.6.1.2';
	    protected $pkgVersion 			= '0.05';
	
		
		/**
		 * @return string
		 */
	    public function getPackageName(){
	        return t('Shopifiable');
	    }
		
		
		/**
		 * @return string
		 */
	    public function getPackageDescription() {
	        return t('Custom shopify sutff');
	    }


        /**
         * @return void
         */
        public function on_start(){
            define('SHOPIFIABLE_PACKAGE_DIR', $this->packageObject()->getRelativePath());
            define('SHOPIFIABLE_TOOLS_URL', BASE_URL . REL_DIR_FILES_TOOLS_PACKAGES . '/' . $this->pkgHandle . '/');
            define('SHOPIFIABLE_IMAGE_CACHE_DIR', DIR_FILES_CACHE . '/shopifiable/');
            define('SHOPIFIABLE_IMAGE_CACHE_URL', REL_DIR_FILES_CACHE . '/shopifiable/');

            Loader::registerAutoload(array(
                'Shopifiable' => array('library', 'shopifiable', $this->pkgHandle),
                'ShopifiableImage' => array('library', 'shopifiable_image', $this->pkgHandle)
            ));
        }


        /**
		 * Proxy to the parent uninstall method
		 * @return void
		 */
	    public function uninstall() {
	        parent::uninstall();
			
			try {
				
			}catch(Exception $e){ /* FAIL GRACEFULLY */ }
	    }


        private function checkDependencies(){
            $redisPackage = Package::getByHandle('concrete_redis');
            if( !($redisPackage instanceof Package) || !($redisPackage->isPackageInstalled()) ){
                throw new Exception(sprintf('%s requires the ConcreteRedis package', $this->getPackageName()));
            }
        }
	    
		
		/**
		 * @return void
		 */
	    public function upgrade(){
            $this->checkDependencies();
			parent::upgrade();
			$this->installAndUpdate();
	    }
		
		
		/**
		 * @return void
		 */
		public function install() {
            $this->checkDependencies();
	    	$this->_packageObj = parent::install(); 
			$this->installAndUpdate();
	    }
		
		
		/**
		 * Handle all the updating methods
		 * @return void
		 */
		private function installAndUpdate(){
			$this->setupSinglePages()
                 ->setupJobs();
		}


		/**
		 * @return ShopifiablePackage
		 */
		private function setupSinglePages(){
            SinglePage::add('/store', $this->packageObject());
            SinglePage::add('/store/product', $this->packageObject());
			
			return $this;
		}


        /**
         * @return ShopifiablePackage
         */
        private function setupJobs(){
            Loader::model('job');
            Job::installByPackage('shopifiable_image_import', $this->packageObject());

            return $this;
        }


        /**
         * Get the package object; if it hasn't been instantiated yet, load it.
         * @return Package
         */
        private function packageObject(){
            if( $this->_packageObj === null ){
                $this->_packageObj = Package::getByHandle( $this->pkgHandle );
            }
            return $this->_packageObj;
        }
	    
	}
