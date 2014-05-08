<?php defined('C5_EXECUTE') or die(_("Access Denied."));

    class UpgradeTask_v0_52 {

        /**
         * Backtrack on some previously installed attributes and
         * the blog page type.
         */
        public static function run( Package $controller ){
            // Delete dashboard pages (so we can reinstall under 'svalinn' name)
            Page::getByPath('/dashboard/svalinn/dogs')->delete();
            Page::getByPath('/dashboard/svalinn/dogs/search')->delete();
            Page::getByPath('/dashboard/svalinn')->delete();
        }

    }