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
        }
		
	}
