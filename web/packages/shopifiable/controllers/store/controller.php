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
            $this->_collectionList = Shopifiable::getSmartCollections();
            $this->set('collectionList', $this->_collectionList);
            $this->set('formHelper', Loader::helper('form'));
        }


        public function view(){
            // From the collection list, get the 'All' collection
            $collectionObjAll = array_filter($this->_collectionList->smart_collections, function($collObj){
                return (bool)($collObj->handle == 'all');
            });

            $this->set('activeCollectionID', $collectionObjAll[0]->id);
            $this->set('productList', Shopifiable::getProducts(array(
                'collection_id'     => $collectionObjAll[0]->id,
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