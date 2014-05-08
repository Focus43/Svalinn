<?php defined('C5_EXECUTE') or die("Access Denied.");

	class DashboardShieldDogsSearchController extends Controller {
	
		public $helpers = array('form');
		
		
		public function view(){
			$searchInstance = 'dogs' . time();
			$this->addHeaderItem( '<meta name="svalinn-tools" content="'.SHIELD_TOOLS_URL.'" />' );
			$this->addFooterItem('<script type="text/javascript">$(function() { ccm_setupAdvancedSearch(\''.$searchInstance.'\'); });</script>');
			$this->addFooterItem(Loader::helper('html')->javascript('dashboard/shield.dashboard.js', 'shield'));
			$this->set('listObject', $this->dogListObj());
			$this->set('listResults', $this->dogListObj()->getPage());
			$this->set('searchInstance', $searchInstance);
		}
		
		
		public function dogListObj(){
			if( $this->_dogListObj === null ){
				$this->_dogListObj = new ShieldDogList();
				$this->applySearchFilters( $this->_dogListObj );
			}
			return $this->_dogListObj;
		}
		
		
		private function applySearchFilters( ShieldDogList $listObj ){
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