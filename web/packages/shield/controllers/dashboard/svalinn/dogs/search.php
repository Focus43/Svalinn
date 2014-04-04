<?php

	class DashboardShieldDogsSearchController extends Controller {
	
		public $helpers = array('form');
	
		public function on_start() {
//            echo 'search on start';exit;
		}
		
		
		public function view(){
//            echo 'search view';exit;
			$searchInstance = 'dogs' . time();
			$this->addHeaderItem(Loader::helper('html')->css('dashboard/app.dashboard.css', 'svalinn'));
			$this->addHeaderItem( '<meta id="svalinnToolsDir" value="'.SHIELD_TOOLS_URL.'" />' );
			$this->addFooterItem('<script type="text/javascript">$(function() { ccm_setupAdvancedSearch(\''.$searchInstance.'\'); });</script>');
			$this->addFooterItem(Loader::helper('html')->javascript('dashboard/app.dashboard.js', 'svalinn'));
			$this->set('listObject', $this->dogListObj());
			$this->set('listResults', $this->dogListObj()->getPage());
			$this->set('searchInstance', $searchInstance);
		}
		
		
		public function dogListObj(){
			if( $this->_dogListObj === null ){
				$this->_dogListObj = new DogList();
				$this->applySearchFilters( $this->_dogListObj );
			}
			return $this->_dogListObj;
		}
		
		
		private function applySearchFilters( DogList $listObj ){
			if( !empty($_REQUEST['numResults']) ){
				$listObj->setItemsPerPage( $_REQUEST['numResults'] );
			}
			
			if( !empty($_REQUEST['keywords']) ){
				$listObj->filterByKeywords( $_REQUEST['keywords'] );
			}
			
			if( !empty($_REQUEST['breedHandle']) ){
				$listObj->filterByBreedHandle( $_REQUEST['breedHandle'] );
			}
			
			return $listObj;
		}
	
	}