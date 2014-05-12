<?php defined('C5_EXECUTE') or die(_("Access Denied."));

    /**
     * Class OurDogsController
     * @todo: show message on no results
     */
    class OurDogsController extends ShieldPageController {
		
		protected $includeThemeAssets = true;


        public function view(){
            $this->set('listObject', $this->dogListObj());
            $this->set('listResults', $this->dogListObj()->getPage());
            $this->set('imageHelper', Loader::helper('image'));
        }


        /**
         * Filter by breed type
         */
        public function breed( $breed = null ){
            if( $breed ){
                $this->set('filteredBy', $breed);
                $this->dogListObj()->filterByBreedHandle($breed);
                $this->view();
            }
        }


        /**
         * Filter by protection level
         */
        public function protection_level( $level = null ){
            if( $level ){
                $this->set('filteredBy', (int) $level);
                $this->dogListObj()->filterByProtectionHandle($level);
                $this->view();
            }
        }


        public function dogListObj(){
            if( $this->_dogListObj === null ){
                $this->_dogListObj = new ShieldDogList();
                $this->_dogListObj->sortByName();
            }
            return $this->_dogListObj;
        }
		
	}
