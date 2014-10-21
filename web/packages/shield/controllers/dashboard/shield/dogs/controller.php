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
            $birthDate = new DateTime($_POST['birthdate'], new DateTimeZone('UTC'));
            $_POST['birthdate'] = $birthDate->format('Y-m-d H:i:s');
            if( empty($_POST['reservedUntil']) ){
                $_POST['reservedUntil'] = null;
            }else{
                $reservedUntil = new DateTime($_POST['reservedUntil'], new DateTimeZone('UTC'));
                $_POST['reservedUntil'] = $reservedUntil->format('Y-m-d H:i:s');
            }
            $dogObj->setPropertiesFromArray($_POST);
            $dogObj->save();
			$this->redirect('/dashboard/shield/dogs/search');
		}


        public static function getFileSets(){
            $fsl = new FileSetList();
            $listArr = $fsl->get();
            $fileSetList = array("0" => "Choose an image set...");

            foreach ($listArr as $set) {
                $fileSetList[$set->getFileSetID()] = $set->getFileSetName();
            }

            return $fileSetList;
        }
	
	}