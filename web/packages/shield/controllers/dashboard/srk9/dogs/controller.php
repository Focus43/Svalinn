<?php

	class DashboardSrk9DogsController extends Controller {
	
	
		public function on_start(){
//            echo 'start';exit;
			$this->addHeaderItem(Loader::helper('html')->css('dashboard/app.dashboard.css', 'svalinn'));
		}
	
	
		public function view() {
            // just redirecting to the search page
			$this->redirect('/dashboard/svalinn/dogs/search');
		}
		
		
		public function add(){
			$this->set('dogObj', new Dogs);
		}
		
		
		public function edit( $id ){
//            echo 'edit';exit;
			$this->set('dogObj', Dogs::getByID($id));
		}
		
		
		public function save( $id = null ) {
			$personnelObj = Dogs::getByID($id);
			$personnelObj->setPropertiesFromArray($_POST);
			$personnelObj->save();
			$this->redirect('/dashboard/svalinn/dogs/search');
		}
	
	}