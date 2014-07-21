<?php defined('C5_EXECUTE') or die(_("Access Denied."));
	
	class ShopifiablePackage extends Package {

        // Shopify credentials; can hard-code in if preferred
        const API_KEY   = '3791e5dce66c68ed8166de3d21b0a18f',
              PASSWORD  = 'eb2d8d90aadd6cc44de31abe1e6c5c9d',
              HOST_NAME = 'svalinn.myshopify.com';


	    protected $pkgHandle 			= 'shopifiable';
	    protected $appVersionRequired 	= '5.6.1.2';
	    protected $pkgVersion 			= '0.02';
	
		
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

            Loader::registerAutoload(array(
                'Shopifiable' => array('library', 'shopifiable', $this->pkgHandle)
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
	    
		
		/**
		 * @return void
		 */
	    public function upgrade(){
			parent::upgrade();
			$this->installAndUpdate();
	    }
		
		
		/**
		 * @return void
		 */
		public function install() {
	    	$this->_packageObj = parent::install(); 
			$this->installAndUpdate();
	    }
		
		
		/**
		 * Handle all the updating methods
		 * @return void
		 */
		private function installAndUpdate(){
			$this->setupSinglePages();
		}


		/**
		 * @return SuperBlocksPackage
		 */
		private function setupSinglePages(){
            SinglePage::add('/store', $this->packageObject());
            SinglePage::add('/store/product', $this->packageObject());
			
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
