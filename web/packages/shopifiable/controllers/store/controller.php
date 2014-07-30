<?php defined('C5_EXECUTE') or die("Access Denied.");

    class StoreController extends Controller {

        protected $supportsPageCache = true;

        public function on_start(){
            $this->addHeaderItem('<meta name="shopifiable-store" value="'.ShopifiablePackage::STORE_URL.'" />');
            $this->addHeaderItem(Loader::helper('html')->css('store.css', 'shopifiable'));
            $this->addFooterItem(Loader::helper('html')->javascript('components/imagesloaded.min.js', 'shopifiable'));
            $this->addFooterItem(Loader::helper('html')->javascript('components/masonry.min.js', 'shopifiable'));
            $this->addFooterItem(Loader::helper('html')->javascript('shopifiable.js', 'shopifiable'));

            // Always load
            $this->set('collectionList', Shopifiable::getSmartCollections());
            $this->set('formHelper', Loader::helper('form'));
        }


        public function view(){
            $this->set('productList', Shopifiable::getProducts(array(
                'published_status'  => 'published',
                'limit'             => 100
            )));

        }


        /**
         * If a specific collection (ie. "filter by men") is requested.
         * @param null $id
         */
        public function collection( $id = null ){
            $this->set('activeCollectionID', $id);
            $this->set('productList', Shopifiable::getProducts(array(
                'collection_id'     => $id,
                'published_status'  => 'published',
                'limit'             => 100
            )));
        }

    }