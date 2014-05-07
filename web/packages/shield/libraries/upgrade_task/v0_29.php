<?php defined('C5_EXECUTE') or die(_("Access Denied."));

    class UpgradeTask_v0_29 {

        /**
         * Backtrack on some previously installed attributes.
         */
        public static function run( Package $controller ){
            $bodyClassAK = CollectionAttributeKey::getByHandle('body_class');
            if( $bodyClassAK instanceof AttributeKey ){
                $bodyClassAK->delete();
            }
        }

    }