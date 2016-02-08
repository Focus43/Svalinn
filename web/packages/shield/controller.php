<?php defined('C5_EXECUTE') or die(_("Access Denied."));

	class ShieldPackage extends Package {

        protected $pkgHandle 			= 'shield';
        protected $appVersionRequired 	= '5.6.1';
        protected $pkgVersion 			= '0.63';


        /**
         * @return string
         */
        public function getPackageName(){
            return t('shield');
        }


        /**
         * @return string
         */
        public function getPackageDescription() {
            return t('Svalinn site assets');
        }


        /**
         * Run hooks high up in the load chain
         * @return void
         */
        public function on_start(){
            define('SHIELD_TOOLS_URL', BASE_URL . REL_DIR_FILES_TOOLS_PACKAGES . '/' . $this->pkgHandle . '/');
            define('SHIELD_IMAGES_URL', DIR_REL . '/packages/' . $this->pkgHandle . '/img/');

            // Autoload classes
            Loader::registerAutoload(array(
                'ShieldPageController' => array('library', 'shield_page_controller', $this->pkgHandle),
                'ShieldDog'			   => array('model', 'shield_dog', $this->pkgHandle),
                'ShieldDogList'		   => array('model', 'shield_dog_list', $this->pkgHandle)
            ));
        }


        /**
         * Proxy to the parent uninstall method
         * @return void
         */
        public function uninstall() {
            parent::uninstall();

            try {
                $db = Loader::db();
                $db->Execute("DROP TABLE Dogs");
            }catch(Exception $e){ /* fail gracefully */ }
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
            $pkgObj  = Package::getByHandle($this->pkgHandle);
            $version = ($pkgObj instanceof Package) ? $pkgObj->getPackageVersion() : '';
            $this->runUpgradeTasks($version)
                ->setupCollectionAttributes()
                ->setupUserAttributes()
                ->setupBlocks()
                ->setupPageTypes()
                ->setupTheme()
                ->setupSitePages()
                ->setupStacks()
                ->setupFileSets()
                ->setupSpecialPageAttributes();
        }


        /**
         * Run per-version tasks. The version passed in is the version being upgraded *to*.
         * @return ShieldPackage
         */
        private function runUpgradeTasks( $version ){
            // Get the handle
            $handle   = sprintf('v%s', str_replace('.', '_', (string)(float)$version));
            $klass    = sprintf('UpgradeTask_%s', $handle);
            $filePath = DIR_PACKAGES . '/' . $this->pkgHandle . '/' . DIRNAME_LIBRARIES . '/upgrade_task/' . $handle . '.php';

            if( file_exists($filePath) ){
                // Register for autoloading
                Loader::registerAutoload(array(
                    $klass => array('library', "upgrade_task/{$handle}", $this->pkgHandle)
                ));

                // Test to see if the class exists (ie. was autoloaded)
                if( class_exists($klass) ){
                    try {
                        call_user_func_array(array($klass, 'run'), array( $this ));
                    }catch(Exception $e){
                        throw new Exception("Tried executing upgrade_task {$handle} but failed.");
                    }
                }
            }

            // Return package instance
            return $this;
        }


        /**
         * @return ShieldPackage
         */
        private function setupCollectionAttributes(){
            if( ! is_object(CollectionAttributeKey::getByHandle('nav_item_class')) ){
                CollectionAttributeKey::add($this->attributeType('text'), array(
                    'akHandle'  => 'nav_item_class',
                    'akName'    => 'Nav Class'
                ), $this->packageObject());
            }

            return $this;
        }


        /**
         * @return ShieldPackage
         */
        private function setupUserAttributes(){
            return $this;
        }


        /**
         * @return ShieldPackage
         */
        private function setupBlocks(){
            return $this;
        }


        /**
         * @return ShieldPackage
         */
        private function setupPageTypes(){
            if( !is_object($this->pageType('home')) ){
                CollectionType::add(array('ctHandle' => 'home', 'ctName' => 'Home'), $this->packageObject());
            }

            if( !is_object($this->pageType('default')) ){
                CollectionType::add(array('ctHandle' => 'default', 'ctName' => 'Default'), $this->packageObject());
            }

            if( !is_object($this->pageType('default_2_column')) ){
                CollectionType::add(array('ctHandle' => 'default_2_column', 'ctName' => 'Default: 2 Column'), $this->packageObject());
            }

            if( !is_object($this->pageType('default_2_equal_column')) ){
                CollectionType::add(array('ctHandle' => 'default_2_equal_column', 'ctName' => 'Default: 2 Equal Column'), $this->packageObject());
            }

            if( !is_object($this->pageType('sublanding')) ){
                CollectionType::add(array('ctHandle' => 'sublanding', 'ctName' => 'Sub Landing'), $this->packageObject());
            }

            if( !is_object($this->pageType('pro_landing')) ){
                CollectionType::add(array('ctHandle' => 'pro_landing', 'ctName' => 'Pro Landing'), $this->packageObject());
            }

            if( !is_object($this->pageType('breeds')) ){
                CollectionType::add(array('ctHandle' => 'breeds', 'ctName' => 'Breeds'), $this->packageObject());
            }

            if( !is_object($this->pageType('training')) ){
                CollectionType::add(array('ctHandle' => 'training', 'ctName' => 'Training'), $this->packageObject());
            }

            if( !is_object($this->pageType('guarantee')) ){
                CollectionType::add(array('ctHandle' => 'guarantee', 'ctName' => 'Guarantee'), $this->packageObject());
            }

            if( !is_object($this->pageType('testimonials')) ){
                CollectionType::add(array('ctHandle' => 'testimonials', 'ctName' => 'Testimonials'), $this->packageObject());
            }

            if( !is_object($this->pageType('handler_training')) ){
                CollectionType::add(array('ctHandle' => 'handler_training', 'ctName' => 'Handler Training'), $this->packageObject());
            }

            if( !is_object($this->pageType('training_classes')) ){
                CollectionType::add(array('ctHandle' => 'training_classes', 'ctName' => 'Training Classes'), $this->packageObject());
            }

            return $this;
        }

        /**
         * @return ShieldPackage
         */
        private function setupSpecialPageAttributes(){
            return $this;
        }

        /**
         * @return ShieldPackage
         */
        private function setupTheme(){
            try {
                $themeObj = PageTheme::add('svalinn', $this->packageObject());
                $themeObj->applyToSite();
            }catch(Exception $e){ /* fail gracefully */ }

            return $this;
        }


        /**
         * @return ShieldPackage
         */
        private function setupSitePages(){
            // setup single pages
            SinglePage::add('/our_dogs', $this->packageObject());
            SinglePage::add('/our_dogs/details', $this->packageObject());
            SinglePage::add('/contact', $this->packageObject());

            // dashboard pages
            $dogs = SinglePage::add('/dashboard/shield/dogs', $this->packageObject());
            if( is_object($dogs) ){
                $dogs->setAttribute('icon_dashboard', 'icon-list');
            }
            SinglePage::add('/dashboard/shield/dogs/search', $this->packageObject());

            return $this;
        }


        /**
         * @return ShieldPackage
         */
        private function setupStacks(){
            if(!is_object(Stack::getByName('Testimonial Quotes'))) {
                Stack::addStack('Testimonial Quotes');
            }

            if(!is_object(Stack::getByName('Footer Left'))) {
                Stack::addStack('Footer Left');
            }

            return $this;
        }


        /**
         * @return ShieldPackage
         */
        private function setupFileSets(){
            return $this;
        }


        /**
         * @param Page $parent The parent page that the page being added should go under
         * @param string $name Name of the page
         * @param string Handle of the page_type to use
         * @return Page
         */
        public function pageFactory( Page $parent, $name, $typeHandle = 'default' ){
            return $parent->add( $this->pageType($typeHandle), array(
                'cName' => $name,
                'pkgID' => $this->packageObject()->getPackageID()
            ));
        }


        /**
         * Get or create an attribute set, for a certain attribute key category (if passed).
         * Will automatically convert the $attrSetHandle from handle_form_name to Handle Form Name
         * @param string $attrSetHandle
         * @param string $attrKeyCategory
         * @return AttributeSet
         */
        private function getOrCreateAttributeSet( $attrSetHandle, $attrKeyCategory = null ){
            if( $this->{ 'attr_set_' . $attrSetHandle } === null ){
                // try to load an existing Attribute Set
                $attrSetObj = AttributeSet::getByHandle( $attrSetHandle );

                // doesn't exist? create it, if an attributeKeyCategory is passed
                if( !is_object($attrSetObj) && !is_null($attrKeyCategory) ){
                    // ensure the attr key category can allow multiple sets
                    $akc = AttributeKeyCategory::getByHandle( $attrKeyCategory );
                    $akc->setAllowAttributeSets( AttributeKeyCategory::ASET_ALLOW_MULTIPLE );

                    // *now* add the attribute set
                    $attrSetObj = $akc->addSet( $attrSetHandle, t( $this->getHelper('text')->unhandle($attrSetHandle) ), $this->packageObject() );
                }

                // assign the $attrSetObj
                $this->{ 'attr_set_' . $attrSetHandle } = $attrSetObj;
            }

            return $this->{ 'attr_set_' . $attrSetHandle };
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


        /**
         * @return CollectionType
         */
        private function pageType( $handle ){
            if( $this->{ "pt_{$handle}" } === null ){
                $this->{ "pt_{$handle}" } = CollectionType::getByHandle( $handle );
            }
            return $this->{ "pt_{$handle}" };
        }


        /**
         * @return AttributeType
         */
        private function attributeType( $atHandle ){
            if( $this->{ "at_{$atHandle}" } === null ){
                $this->{ "at_{$atHandle}" } = AttributeType::getByHandle( $atHandle );
            }
            return $this->{ "at_{$atHandle}" };
        }


        /**
         * Get an attribute key category object (eg: an entity category) by its handle
         * @return AttributeKeyCategory
         */
        private function attributeKeyCategory( $handle ){
            if( !($this->{ "akc_{$handle}" } instanceof AttributeKeyCategory) ){
                $this->{ "akc_{$handle}" } = AttributeKeyCategory::getByHandle( $handle );
            }
            return $this->{ "akc_{$handle}" };
        }


        /**
         * Memoize helpers so they're only loaded once.
         * @param string $handle Handle of the helper to load
         * @param string $pkg Package to get the helper from
         * @return ...Helper class of some sort
         */
        private function getHelper( $handle, $pkg = false ){
            $helper = '_helper_' . preg_replace("/[^a-zA-Z0-9]+/", "", $handle);
            if( $this->{$helper} === null ){
                $this->{$helper} = Loader::helper($handle, $pkg);
            }
            return $this->{$helper};
        }

    }
