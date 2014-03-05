<?php

    class BlogPageTypeController extends Srk9PageController {
        
        public function on_start(){
            parent::on_start();
            $this->passCategoriesToView()
                 ->passPageMonthsToView();
        }
        
        
        /**
         * Public action: blog/category/{id}, makes filtering by a select attribute
         * friendlier.
         * @param int $categoryID
         */
        public function category( $categoryID ){
            $categoryAk = CollectionAttributeKey::getByHandle('blog_categories');
            if( is_object($categoryAk) ){
                $categoryAkID = $categoryAk->getAttributeKeyID();
                $_REQUEST['akID']["$categoryAkID"]['atSelectOptionID'][] = $categoryID;
            }
        }
        
        
        /**
         * Public action: blog/archive/{year}/{month_name}, allows you to filter blog
         * posts by year/month. Acts as "archive".
         * @param int $year
         * @param string $month
         */
        public function archive($year, $month){
            $_REQUEST['blog_list_archive'] = array(
                'year'  => $year,
                'month' => $month
            );
        }
        
        
        /**
         * Get all the blog category options for the select attribute, and pass to the view.
         * @return BlogPageTypeController
         */
        protected function passCategoriesToView(){
            $akCategories = CollectionAttributeKey::getByHandle('blog_categories');
            if( is_object($akCategories) ){
                $this->set('categoriesList', $akCategories->getController()->getOptions());
            }
            return $this;
        }
        
        
        protected function passPageMonthsToView(){
            $pageList = new PageList;
            $pageList->filterByParentID( Page::getByPath('/blog')->getCollectionID() );
            $this->set('pageCountByMonth', $pageList->countPagesByMonth());
            return $this;
        }
        
    }