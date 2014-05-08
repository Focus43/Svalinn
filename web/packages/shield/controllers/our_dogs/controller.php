<?php defined('C5_EXECUTE') or die(_("Access Denied."));

	class OurDogsController extends ShieldPageController {
		
		protected $includeThemeAssets = true;


        public function view(){
            $this->set('listObject', $this->dogListObj());
            $this->set('listResults', $this->dogListObj()->getPage());
            $this->set('imageHelper', Loader::helper('image'));
        }


        public function dogListObj(){
            if( $this->_dogListObj === null ){
                $this->_dogListObj = new ShieldDogList();
                $this->applySearchFilters( $this->_dogListObj );
            }
            return $this->_dogListObj;
        }


        private function applySearchFilters( ShieldDogList $listObj ){
            if( !empty($_REQUEST['breedHandle']) ){
                $listObj->filterByBreedHandle( $_REQUEST['breedHandle'] );
            }
        }
		
	}
