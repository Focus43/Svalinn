<?php defined('C5_EXECUTE') or die(_("Access Denied."));

    class UpgradeTask_v0_37 {

        /**
         * Backtrack on some previously installed attributes and
         * the blog page type.
         */
        public static function run( Package $controller ){
            // Delete "Blog" page type
            $blogPageTypeCT = CollectionType::getByHandle('blog');
            if( $blogPageTypeCT instanceof CollectionType ){
                $blogPageTypeCT->delete();
            }

            // Collection Attributes
            $mainHeaderAK = CollectionAttributeKey::getByHandle('main_header');
            if($mainHeaderAK instanceof AttributeKey){
                $mainHeaderAK->delete();
            }

            $subHeaderAK = CollectionAttributeKey::getByHandle('sub_header');
            if($subHeaderAK instanceof AttributeKey){
                $subHeaderAK->delete();
            }

            // Delete Attribute set
            $themeSet = AttributeSet::getByHandle('page_extras');
            if( $themeSet instanceof AttributeSet ){
                $themeSet->delete();
            }
        }

    }