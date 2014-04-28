<?php defined('C5_EXECUTE') or die(_("Access Denied."));

    /**
     * Run only when package version is incremented to 0.31.
     */
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