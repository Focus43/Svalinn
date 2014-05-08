<?php defined('C5_EXECUTE') or die("Access Denied.");

	class DashboardShieldDogsController extends Controller {
	
		public function view() {
            // just redirecting to the search page
			$this->redirect('/dashboard/shield/dogs/search');
		}
		
		
		public function add(){
			$this->set('dogObj', new ShieldDog);
		}
		
		
		public function edit( $id ){
			$this->set('dogObj', ShieldDog::getByID($id));
		}
		
		
		public function save( $id = null ) {
			$dogObj = ShieldDog::getByID($id);
            $dogObj->setPropertiesFromArray($_POST);
            $dogObj->save();
			$this->redirect('/dashboard/shield/dogs/search');
		}
	
	}