<?php

	class DogsForSaleController extends Srk9PageController {
		
		public $helpers = array('form', 'image');
		
        protected $includeThemeAssets = true;
		
		public function on_start(){
			$this->addFooterItem( $this->getHelper('html')->javascript('libs/ajaxify.form.js', self::PACKAGE_HANDLE) );
			parent::on_start();
		}

		public function view(){
			$perColumn = round( ($this->dogListObj()->getTotal() / 2), 0) ;
			$this->set('listColumn1', $this->dogListObj()->get($perColumn));
			$this->set('listColumn2', $this->dogListObj()->get($perColumn, $perColumn));
		}

		public function profile( $id ){
			$dogObj = Dogs::getByID($id);
			$this->set('dogObj', $dogObj);
			$this->set('breedHandle', $dogObj->getBreedHandle());
            $this->set('appendPageTitle', t(' - %s', $dogObj->getName()));

            $fs = FileSet::getByID($dogObj->getMediaSetID());
            $fl = new FileList();
            $fl->filterBySet($fs);
            $files = $fl->get();
            $this->set('galleryFiles', $files);
		}

		public function breed( $breedHandle ){
			$this->dogListObj()->filterByBreedHandle($breedHandle);
			$this->set('breedHandle', $breedHandle);
			$this->view();
		}

        public function protection_level( $protectionHandle ){
            $this->dogListObj()->filterByProtectionHandle($protectionHandle);
            $this->set('protectionHandle', $protectionHandle);
            $this->view();
        }

		private function dogListObj(){
			if( $this->_dogListObj === null ){
				$this->_dogListObj = new DogList();
				$this->_dogListObj->sortByName();
			}
			return $this->_dogListObj;
		}
		
	}
