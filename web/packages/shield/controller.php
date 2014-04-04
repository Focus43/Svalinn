<?php defined('C5_EXECUTE') or die(_("Access Denied."));

	class ShieldPackage extends Package {

        protected $pkgHandle 			= 'shield';
        protected $appVersionRequired 	= '5.6.1';
        protected $pkgVersion 			= '0.28';


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

            // set theme paths
            //View::getInstance()->setThemeByPath('/login', 'clinica_site');

            // autoload classes
            Loader::registerAutoload(array(
                // page controller
                'ShieldPageController' => array('library', 'shield_page_controller', $this->pkgHandle),
                'Dogs'			    => array('model', 'dogs', $this->pkgHandle),
                'DogList'		    => array('model', 'dog_list', $this->pkgHandle)
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
            $this->setupUserAttributes()
                ->setupBlocks()
                ->setupPageTypes()
                ->setupTheme()
                ->setupSitePages()
                ->setupStacks()
                ->setupFileSets()
                ->setupSpecialPageAttributes();
        }


        /**
         * @return ShieldPackage
         */
        private function setupCollectionAttributes(){

//            if( !is_object(CollectionAttributeKey::getByHandle('blog_categories')) ){
//                CollectionAttributeKey::add( $this->attributeType('select'), array(
//                    'akHandle'              => 'blog_categories',
//                    'akName'                => 'Blog Categories',
//                    'akIsSearchableIndexed' => 1,
//                    'akIsSearchable'        => 1,
//                    'akSelectAllowMultipleValues' => 1
//                ), $this->packageObject());
//            }
//
//            if( !is_object(CollectionAttributeKey::getByHandle('blog_description')) ){
//                CollectionAttributeKey::add( $this->attributeType('textarea'), array(
//                    'akHandle'              => 'blog_description',
//                    'akName'                => 'Blog Description',
//                    'akTextareaDisplayMode' => 'rich_text_basic'
//                ), $this->packageObject());
//            }

            return $this;
        }


        /**
         * @return ShieldPackage
         */
        private function setupUserAttributes(){
//            if( !is_object(UserAttributeKey::getByHandle('name')) ){
//                UserAttributeKey::add( $this->attributeType('text'), array(
//                    'akHandle'              => 'name',
//                    'akName'                => 'Name',
//                    'akIsSearchableIndexed' => 1,
//                    'akIsSearchable'        => 1
//                ), $this->packageObject());
//            }

            return $this;
        }


        /**
         * @return ShieldPackage
         */
        private function setupBlocks(){
//            // PageChoozer
//            if(!is_object(BlockType::getByHandle('page_choozer'))) {
//                BlockType::installBlockTypeFromPackage('page_choozer', $this->packageObject());
//            }
//
//            // Blog Page List
//            if(!is_object(BlockType::getByHandle('blog_page_list'))) {
//                BlockType::installBlockTypeFromPackage('blog_page_list', $this->packageObject());
//            }

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

            if( !is_object($this->pageType('blog')) ){
                CollectionType::add(array('ctHandle' => 'blog', 'ctName' => 'Blog'), $this->packageObject());
            }

            if( !is_object($this->pageType('sublanding')) ){
                CollectionType::add(array('ctHandle' => 'sublanding', 'ctName' => 'Sub Landing'), $this->packageObject());
            }

            return $this;
        }

        /**
         * @return ShieldPackage
         */
        private function setupSpecialPageAttributes(){

            $eaku = AttributeKeyCategory::getByHandle('collection');
            $eaku->setAllowAttributeSets(AttributeKeyCategory::ASET_ALLOW_SINGLE);

            $pageType = CollectionType::getByHandle('sublanding');

            $themeSet = AttributeSet::getByHandle('page_extras');
            if ( !is_object($themeSet) ) {
                $themeSet = $eaku->addSet('page_extras',t('Page Extras'),$this->packageObject());
            }

            if( !is_object(CollectionAttributeKey::getByHandle('main_header')) ){
                CollectionAttributeKey::add( $this->attributeType('text'), array(
                    'akHandle'              => 'main_header',
                    'akName'                => 'Main Header',
                    'akIsSearchableIndexed' => 1,
                    'akIsSearchable'        => 1
                ), $this->packageObject())->setAttributeSet($themeSet);

                $ak1= CollectionAttributeKey::getByHandle('main_header');
                $pageType->assignCollectionAttribute($ak1);
            }

            if( !is_object(CollectionAttributeKey::getByHandle('sub_header')) ){
                CollectionAttributeKey::add( $this->attributeType('text'), array(
                    'akHandle'              => 'sub_header',
                    'akName'                => 'Sub Header',
                    'akIsSearchableIndexed' => 1,
                    'akIsSearchable'        => 1
                ), $this->packageObject())->setAttributeSet($themeSet);

                $ak2= CollectionAttributeKey::getByHandle('sub_header');
                $pageType->assignCollectionAttribute($ak2);
            }

            if( !is_object(CollectionAttributeKey::getByHandle('body_class')) ){
                CollectionAttributeKey::add( $this->attributeType('text'), array(
                    'akHandle'              => 'body_class',
                    'akName'                => 'Body Class',
                    'akIsSearchableIndexed' => 1,
                    'akIsSearchable'        => 1
                ), $this->packageObject())->setAttributeSet($themeSet);

                $ak3= CollectionAttributeKey::getByHandle('body_class');
                $pageType->assignCollectionAttribute($ak3);
            }

            return $this;
        }

        /**
         * @return ShieldPackage
         */
        private function setupTheme(){
            try {
                PageTheme::add('svalinn', $this->packageObject());
            }catch(Exception $e){ /* fail gracefully */ }

            return $this;
        }


        /**
         * @return ShieldPackage
         */
        private function setupSitePages(){

            // setup single pages
            SinglePage::add('/dogs-sale', $this->packageObject());

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
//            if( !is_object(FileSet::getByName('Featured Dog Photos')) ){
//                FileSet::createAndGetSet('Featured Dog Photos', FileSet::TYPE_PUBLIC);
//            }

            return $this;
        }


        /**
         * @param Page $parent The parent page that the page being added should go under
         * @param string $name Name of the page
         * @param string Handle of the page_type to use
         * @return Page
         */
        private function pageFactory( Page $parent, $name, $typeHandle = 'default' ){
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
         * "Memorize" helpers so they're only loaded once.
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
