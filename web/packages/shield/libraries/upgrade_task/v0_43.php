<?php defined('C5_EXECUTE') or die(_("Access Denied."));

    class UpgradeTask_v0_43 {

        /**
         * Backtrack on some previously installed attributes and
         * the blog page type.
         */
        public static function run( Package $controller ){
            $self = new self;
            // delete the right sidebar template
            $self->deleteRightSidebarCollectionType();
        }


        private function deleteRightSidebarCollectionType(){
            // get collection type object
            $collectionType = CollectionType::getByHandle('right_sidebar');

            // if it exists in the system...
            if( $collectionType instanceof CollectionType ){
                $collectionTypeID = $collectionType->getCollectionTypeID();

                // get versions (directly querying database)
                $versions = Loader::db()->Execute("SELECT cID, cvID FROM CollectionVersions WHERE ctID = ?", array(
                    $collectionTypeID
                ));

                // load any versions of the page type, and delete them
                if( !empty($versions) ){
                    foreach($versions AS $row){
                        CollectionVersion::get(Collection::getByID($row['cID']), $row['cvID'])->delete();
                    }
                }

                // *now* delete the collection type
                $collectionType->delete();
            }
        }

    }