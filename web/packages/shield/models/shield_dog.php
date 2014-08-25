<?php

	class ShieldDog {
		
		
		const BREED_GERMAN_SHEPHERD = 'german_shepherd',
			  BREED_MALINOIS		= 'belgian_malinois',
              BREED_DUTCH_SHEPHERD  = 'dutch_shepherd',
              PROTECTION_LEVEL_I    = 1,
              PROTECTION_LEVEL_II   = 2,
              PROTECTION_LEVEL_III  = 3,
              RESERVED_NO           = 0,
              RESERVED_YES          = 1,
              RESERVED_SOLD         = 2;

		
		protected $tableName,
				  $id,
				  $createdUTC,
				  $modifiedUTC;

		// helper for generating lists
		public static $dogBreeds = array(
			self::BREED_GERMAN_SHEPHERD => 'German Shepherd',
            self::BREED_DUTCH_SHEPHERD 	=> 'Dutch Shepherd',
			self::BREED_MALINOIS		=> 'Belgian Malinois'
		);

        public static $protectionLevels = array(
            self::PROTECTION_LEVEL_I 	=> 'Level I',
            self::PROTECTION_LEVEL_II 	=> 'Level II',
            self::PROTECTION_LEVEL_III 	=> 'Level III'
        );

        public static $reservedOptions = array(
            self::RESERVED_SOLD => 'Sold',
            self::RESERVED_YES  => 'Reserved',
            self::RESERVED_NO   => 'Available'
        );

        public static $sexes = array(
            'Male'   => 'Male',
            'Female' => 'Female'
        );
		
		
		/**
		 * @param array $properties Set object property values with key => value array
		 */	
		public function __construct( array $properties = array() ){
			$this->setPropertiesFromArray($properties);
			$this->tableName = __CLASS__;
		}
		
		
		public function __toString(){
			return "{$this->name}, {$this->breed}";
		}
		
		/** @return int Get the dogID */
		public function getDogID(){ return $this->id; }
		/** @return string Date the object was first created */
		public function getDateCreated(){ return $this->createdUTC; }
		/** @return string Date the object was last modified */
		public function getDateModified(){ return $this->modifiedUTC; }
        /** @return string Get name */
        public function getName(){ return ucfirst($this->name); }
		/** @return string Get breed */
		//public function getBreed(){ return ucfirst($this->breed); }
		/** @return string Get protection level */
		//public function getProtectionLevel(){ return ucfirst($this->protectionLevel); }
        /** @return string Get picture ID (File object ID) */
        public function getPicID(){ return $this->picID; }
        /** @return string Get media set ID (File object ID) */
        public function getMediaSetID(){ return $this->mediaSetID; }
        /** @return string Get short description */
        public function getShortDescription(){ return $this->shortDescription; }
		/** @return string Get long description */
		public function getLongDescription(){ return $this->longDescription; }
        /** @return string Get youtube video 1 */
        public function getYoutubeVideo1(){ return $this->youtubeVideo1; }
        /** @return string Get youtube video 2 */
        public function getYoutubeVideo2(){ return $this->youtubeVideo2; }
        /** @return string Get youtube video 3 */
        public function getYoutubeVideo3(){ return $this->youtubeVideo3; }
        /** @return string Get height */
        public function getHeight(){ return $this->height; }
        /** @return string Get weight */
        public function getWeight(){ return $this->weight; }
        /** @return string Get sex */
        public function getSex(){ return $this->sex; }
        /** @return string Get birthdate */
        public function getBirthdate( $format = false ){
            if( is_string($format) ){
                $dateObj = new DateTime($this->birthdate, new DateTimeZone('UTC'));
                return $dateObj->format($format);
            }
            return $this->birthdate;
        }
        
        
        /**
         * Return an array with a list of the YouTube video URLS.
         * @return array
         */
        public function getYoutubeVideosList(){
            // parse the full URLs for just the video ID (which is a string)
            $videos = array_map(function( $videoUrl ){
                $url = parse_url($videoUrl);
                if( $url['path'] == '/watch' ){
                    parse_str($url['query'], $query);
                    return $query['v'];
                }
                return ltrim($url['path'], '/');
            }, array($this->youtubeVideo1, $this->youtubeVideo2, $this->youtubeVideo3));
            
            // filter out empty ones; return only valid strings
            return array_filter($videos, function( $string ){
                return !empty($string);
            });
        }
        

        /** @return string Get reserved status */
        public function getReservedStatus($formatted = false){
            if( $formatted === true ){
                return self::$reservedOptions[ $this->reservedStatus ];
            }
            return $this->reservedStatus;
        }

		/** @return string Get dog breed handle */
		public function getBreedHandle($formatted = false){
			if( $formatted === true ){
                if ( $this->breedHandle == "malinois") $this->breedHandle = "belgian_malinois";
				return ucwords(str_replace(array('_', '-', '/'), ' ', $this->breedHandle));
			}
			return $this->breedHandle;
		 }

        /** @return string Get protection level handle */
        public function getProtectionHandle($formatted = false){
            if( $formatted === true ){
                $protectionStr = "Level ";

                for ($i=0; $i<(int)$this->protectionHandle; $i++) {
                    $protectionStr .= "I";
                }

                return $protectionStr;
            }

            return $this->protectionHandle;
        }

        /** @return string Get price */
        public function getPrice($formatted = false){
            if( $formatted === true ){
                setlocale(LC_MONETARY, 'en_US.UTF-8');
                return money_format('%i', $this->price);
            }

            return $this->price;
        }
		
		public function getPictureFileObj(){
			if( $this->_fileObj === null ){
				$this->_fileObj = File::getByID( $this->picID );
			}
			return $this->_fileObj;
		}


		
		/**
		 * Set properties of the current instance
		 * @param array $arr Pass in an array of key => values to set object properties
		 * @return void
		 */
		public function setPropertiesFromArray( array $properties = array() ) {
			foreach($properties as $key => $prop) {
				$this->{$key} = $prop;
			}
		}
		
		
		protected function persistable(){
			return array('name', 'shortDescription', 'picID', 'longDescription', 'breedHandle', 'protectionHandle', 'mediaSetID', 'price', 'reservedStatus', 'youtubeVideo1', 'youtubeVideo2', 'youtubeVideo3', 'height', 'weight', 'sex', 'birthdate');
		}
		
		
		public function save(){
			if( $this->id >= 1 ){
				$fields		= $this->persistable();
				$updateStr  = 'modifiedUTC = UTC_TIMESTAMP()';
				$values		= array();
				foreach($fields AS $property){
					$updateStr .= ", {$property} = ?";
					$values[] = $this->{$property};
				}
				$values[] = $this->id;
				Loader::db()->Execute("UPDATE {$this->tableName} SET {$updateStr} WHERE id = ?", (array) $values);
			}else{
				$db 		= Loader::db();
				$fields		= $this->persistable();
				$fieldNames = "createdUTC, modifiedUTC, " . implode(',', $fields);
				$fieldCount	= implode(',', array_fill(0, count($fields), '?'));
				$values		= array();
				foreach($fields AS $property){
					$values[] = $this->{$property};
				}
				$db->Execute("INSERT INTO {$this->tableName} ($fieldNames) VALUES (UTC_TIMESTAMP(), UTC_TIMESTAMP(), $fieldCount)", $values);
				$this->id	 = $db->Insert_ID();
			}
			
			return self::getByID( $this->id );
		}
		
		
		public static function getByID( $id ){
			$self = new self();
			$row = Loader::db()->GetRow("SELECT * FROM {$self->tableName} WHERE id = ?", array( (int)$id ));
			$self->setPropertiesFromArray($row);
			return $self;
		}
		
		
		/**
		 * Delete the record, and any attribute values associated w/ it
		 * @return void
		 */
		public function delete(){
			Loader::db()->Execute("DELETE FROM {$this->tableName} WHERE id = ?", array($this->id));
		}
		
	}