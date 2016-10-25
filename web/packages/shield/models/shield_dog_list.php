<?php

	class ShieldDogList extends DatabaseItemList {
		
		const DB_FRIENDLY_DATE = 'Y-m-d H:i:s';
		
		
		protected $autoSortColumns 	= array('createdUTC', 'modifiedUTC', 'name', 'breed', 'protection_level'),
				  $itemsPerPage		= 30;
		
		
		public function filterByKeywords($keywords) {
            $db = Loader::db();
            $this->searchKeywords = $db->quote($keywords);
            $qkeywords = $db->quote('%' . $keywords . '%');
            $this->filter(false, "(dogs.name LIKE $qkeywords OR dogs.breedHandle LIKE $qkeywords)");
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

        public function filterByActiveStatus( $status ){
            $this->filter('dogs.activeStatus', $status, '=');
        }

		public function sortByName(){
            $this->sortBy('dogs.name', 'asc');
		}
		
		
		public function get( $itemsToGet = 100, $offset = 0 ){
            $dogs = array();
            $this->createQuery();
            $r = parent::get($itemsToGet, $offset);
            foreach($r AS $row){
                $dogs[] = ShieldDog::getByID( $row['id'] );
            }
            return $dogs;
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
            $queryStr = "SELECT dogs.id FROM ShieldDog dogs";
            $this->setQuery( $queryStr );
        }
		
	}


	class ShieldDogColumnSet extends DatabaseItemListColumnSet {
		
		public function __construct(){
			$this->addColumn(new DatabaseItemListColumn('name', t('Name'), array('ShieldDogColumnSet', 'getNameAsLast')));
			$this->addColumn(new DatabaseItemListColumn('breed', t('Breed'), array('ShieldDogColumnSet', 'getBreed')));
			$this->addColumn(new DatabaseItemListColumn('protectionLevel', t('Protection Level'), array('ShieldDogColumnSet', 'getProtectionLevel')));
            $this->addColumn(new DatabaseItemListColumn('reservedStatus', t('Status'), array('ShieldDogColumnSet', 'getReservedStatus')));
            $this->addColumn(new DatabaseItemListColumn('activeStatus', t('Visibility'), array('ShieldDogColumnSet', 'getActiveStatus')));
		}
		
		public function getNameAsLast( ShieldDog $dogObj ){
			$name = "{$dogObj->getName()}";
			return '<a href="'.View::url('dashboard/shield/dogs/edit', $dogObj->getDogID()).'">'.$name.'</a>';
		}

		public function getBreed( ShieldDog $dogObj ){
			return $dogObj->getBreedHandle(true);
		}

        public function getProtectionLevel( ShieldDog $dogObj ){
            return $dogObj->getProtectionHandle(true);
        }

        public function getReservedStatus( ShieldDog $dogObj ){
            return $dogObj->getReservedStatus(true);
        }

        public function getActiveStatus( ShieldDog $dogObj ){
            return ShieldDog::$activeStatusList[$dogObj->getActiveStatus()];
        }
		
		public function getCurrent(){
			return new self;
		}
		
	}

