<?php defined('C5_EXECUTE') or die(_("Access Denied."));

    /**
     * Run only when package version is incremented to 0.31.
     */
    class UpgradeTask_v0_37 {

        /**
         * Backtrack on some previously installed attributes and
         * the blog page type.
         */
        public static function run(){
            // Delete "Blog" page type
            $blogPageType = CollectionType::getByHandle('blog');
            $blogPageType->delete();

            // Delete Collection Attributes
            CollectionAttributeKey::getByHandle('main_header')->delete();
            CollectionAttributeKey::getByHandle('sub_header')->delete();

            // Delete Attribute set
            $themeSet = AttributeSet::getByHandle('page_extras');
            if( $themeSet instanceof AttributeSet ){
                $themeSet->delete();
            }
        }

    }