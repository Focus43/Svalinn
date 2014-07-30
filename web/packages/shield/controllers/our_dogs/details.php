<?php defined('C5_EXECUTE') or die(_("Access Denied."));

	class OurDogsDetailsController extends ShieldPageController {
		
		protected $includeThemeAssets = true;


        public function view( $dogID = null ){
            $dogObj = ShieldDog::getByID($dogID);

            // If dog object doesn't exist, redirect
            if( !((int)$dogObj->getDogID() >= 1) ){
                $this->redirect('/our_dogs');
                return;
            }

            // Dog found OK; render view
            $this->set('dogObj', $dogObj);
            $this->set('imageHelper', Loader::helper('image'));

            $variant = $this->getDogProductVariation($dogObj->getName());
            if( is_object($variant) ){
                $this->set('variantID', $variant->id);
            }
        }


        protected function getDogProductVariation( $name ){
            $productObj = Shopifiable::getProductByID(329962243);
            foreach($productObj->variants AS $variantObj){
                if( $variantObj->title == $name ){
                    return $variantObj;
                }
            }
        }
		
	}
