<?php defined('C5_EXECUTE') or die("Access Denied.");

    class StoreProductController extends Controller {

        public function on_start(){
            $this->addHeaderItem('<meta name="shopifiable-store" value="https://svalinn.myshopify.com" />');
            $this->addHeaderItem(Loader::helper('html')->css('store.css', 'shopifiable'));
            $this->addFooterItem(Loader::helper('html')->javascript('shopifiable.js', 'shopifiable'));
            $this->set('formHelper', Loader::helper('form'));
        }


        public function view( $productID = null ){
            if( is_null($productID) ){ return; }

            try {
                $productObj = Shopifiable::getProductByID($productID);
                $this->set('productObj', $productObj);
            }catch(Exception $e){
                return;
            }
        }

    }