<?php

	class DogList extends DatabaseItemList {
		
		const DB_FRIENDLY_DATE = 'Y-m-d H:i:s';
		
		
		protected $autoSortColumns 	= array('createdUTC', 'modifiedUTC', 'name', 'breed', 'protection_level'),
				  $itemsPerPage		= 10;
		
		
		public function filterByKeywords($keywords) {
            $db = Loader::db();
            $this->searchKeywords = $db->quote($keywords);
            $qkeywords = $db->quote('%' . $keywords . '%');
            $this->filter(false, "(dogs.name LIKE $qkeywords OR dogs.breed LIKE $qkeywords)");
		}
		
		
		/**
		 * Filter by name (checks both first and last name fields)
		 * @param string Name (first or last)
		 */
		public function filterByName( $name ){
            $name = Loader::db()->quote('%'.$name.'%');
            $this->filter(false, "dogs.name LIKE $name");
        }
		
		
		public function filterByBreedHandle( $breed ){
            if ($breed == "belgian_malinois") { $breed = array("malinois", "belgian_malinois"); }
			$this->filter('dogs.breedHandle', $breed, '=');
		}

        public function filterByProtectionHandle( $protectionLevel ){
            $this->filter('dogs.protectionHandle', $protectionLevel, '=');
        }

		public function sortByName(){
			parent::sortBy('dogs.name', 'asc');
		}
		
		
		public function get( $itemsToGet = 100, $offset = 0 ){
            $personnel = array();
            $this->createQuery();
            $r = parent::get($itemsToGet, $offset);
            foreach($r AS $row){
                $personnel[] = Dogs::getByID( $row['id'] );
            }
            return $personnel;
        }
        
        
        public function getTotal(){
            $this->createQuery();
            return parent::getTotal();
        }
        
        
        protected function createQuery(){
            if( !$this->queryCreated ){
                $this->setBaseQuery();
                $this->queryCreated = true;
            }
        }
        
        public function setBaseQuery(){
            $queryStr = "SELECT dogs.id FROM Dogs dogs";
            $this->setQuery( $queryStr );
        }
		
	}


	class DogColumnSet extends DatabaseItemListColumnSet {
		
		public function __construct(){
			$this->addColumn(new DatabaseItemListColumn('name', t('Name'), array('DogColumnSet', 'getNameAsLast')));
			$this->addColumn(new DatabaseItemListColumn('breed', t('Breed'), array('DogColumnSet', 'getBreed')));
			$this->addColumn(new DatabaseItemListColumn('protectionLevel', t('Protection Level'), array('DogColumnSet', 'getProtectionLevel')));
            $this->addColumn(new DatabaseItemListColumn('reservedStatus', t('Status'), array('DogColumnSet', 'getReservedStatus')));
		}
		
		public function getNameAsLast( Dogs $dogObj ){
			$name = "{$dogObj->getName()}";
			return '<a href="'.View::url('dashboard/svalinn/dogs/edit', $dogObj->getDogID()).'">'.$name.'</a>';
		}

		public function getBreed( Dogs $dogObj ){
			return $dogObj->getBreedHandle(true);
		}

        public function getProtectionLevel( Dogs $dogObj ){
            return $dogObj->getProtectionHandle(true);
        }

        public function getReservedStatus( Dogs $dogObj ){
            return $dogObj->getReservedStatus(true);
        }
		
		public function getCurrent(){
			return new self;
		}
		
	}

