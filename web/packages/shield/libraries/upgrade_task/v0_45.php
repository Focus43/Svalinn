<?php defined('C5_EXECUTE') or die(_("Access Denied."));

    class UpgradeTask_v0_45 {

        /**
         * Backtrack on some previously installed attributes and
         * the blog page type.
         */
        public static function run( Package $controller ){
            Page::getByPath('/dogs')->delete();
        }

    }