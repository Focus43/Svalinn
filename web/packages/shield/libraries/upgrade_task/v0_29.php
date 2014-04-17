<?php defined('C5_EXECUTE') or die(_("Access Denied."));

    /**
     * Run only when package version is incremented to 0.29.
     */
    class UpgradeTask_v0_29 {

        /**
         * Backtrack on some previously installed attributes.
         */
        public static function run(){
            CollectionAttributeKey::getByHandle('body_class')->delete();
        }

    }