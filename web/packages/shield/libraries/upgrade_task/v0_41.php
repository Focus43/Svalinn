<?php defined('C5_EXECUTE') or die(_("Access Denied."));

    class UpgradeTask_v0_41 {

        /**
         * Backtrack on some previously installed attributes and
         * the blog page type.
         */
        public static function run(){
            // Delete "Dogs Sale" page
            Page::getByPath('/dogs-sale')->delete();
        }

    }