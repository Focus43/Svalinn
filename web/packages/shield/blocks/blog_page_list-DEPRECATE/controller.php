<?php defined('C5_EXECUTE') or die("Access Denied.");
	
	/**
     * Since C5's default shit sucks for creating blog-like functionality,
     * this is just a hackish thing to accomplish it.
     */
	class BlogPageListBlockController extends BlockController {

        const DISPLAY_PAGES_BENEATH_CURRENT = 1,
              DISPLAY_PAGES_BENEATH_CUSTOM  = 2;

		protected $btTable 									= 'btBlogPageList';
		protected $btInterfaceWidth 						= '585';
		protected $btInterfaceHeight						= '440';
		protected $btCacheBlockRecord 						= true;
		protected $btCacheBlockOutput 						= false;
		protected $btCacheBlockOutputOnPost 				= false;
		protected $btCacheBlockOutputForRegisteredUsers 	= false;
		protected $btCacheBlockOutputLifetime 				= CACHE_LIFETIME;
		
		public $numToShow         = 10,
		       $displayBeneath    = self::DISPLAY_PAGES_BENEATH_CURRENT,
		       $parentPageID      = null;
		
		public function getBlockTypeDescription(){
			return t("Display chronological-sorted list of blog posts.");
		}
		
		
		public function getBlockTypeName(){
			return t("Blog Page List");
		}
		
		
		public function view(){
		    $this->set('pageResults', $this->pageListObject()->getPage());
			$this->set('pageListObj', $this->pageListObject());
		}
        
        
        /**
         * Get the page list object. This will automatically apply all necessary
         * filters and such.
         * @return PageList
         */
        public function pageListObject(){
            if( $this->_pageListObj === null ){
                $this->_pageListObj = new PageList;
                $this->_pageListObj->setItemsPerPage( $this->numToShow );
                $this->_pageListObj->filterByParentID( $this->getParentPageID() );
                // if we're applying attribute filters
                if( isset($_REQUEST['akID']) ){
                    $this->applyAttributeFilters( $this->_pageListObj );
                }
                // if we're filtering by a month (eg. "archives")
                if( isset($_REQUEST['blog_list_archive']) ){
                    $year  = (int) $_REQUEST['blog_list_archive']['year'];
                    $month = date_parse($_REQUEST['blog_list_archive']['month']);
                    $month = $month['month'];
                    $this->_pageListObj->filter(false, "(YEAR(cv.cvDatePublic) = {$year} and MONTH(cv.cvDatePublic) = {$month})");
                }
            }
            return $this->_pageListObj;
        }
        
        
        /**
         * Logic in here determines which parent URL should be used.
         * @return int
         */
        protected function getParentPageID(){
            if( $this->displayBeneath == self::DISPLAY_PAGES_BENEATH_CURRENT ){
                return Page::getCurrentPage()->getCollectionID();
            }
            return $this->parentPageID;
        }
        
        
        /**
         * We can filter the page list results by attributes. Instead of passing
         * attributes in the query string url (thus making it effing hideous), we
         * do some stuff in the actions of the BlogPageType controller to mock
         * attributes coming in the $_REQUEST global. This will apply filters
         * by attributes to the page list object, if set.
         * @param PageList $listObj
         * @return void
         */
        protected function applyAttributeFilters(PageList $listObj){
            foreach($_REQUEST['akID'] AS $keyID => $akArray){
                $akObj = CollectionAttributeKey::getByID( $keyID );
                if( is_object($akObj) ){
                    $akObj->getController()->searchForm($listObj);
                }
            }
        }
		
		
        /**
         * Save the block configuration.
         * @param array $data
         */
		public function save( $data ){
			$args['numToShow'] 	     = (int) $data['numToShow'];
            $args['displayBeneath']  = (int) $data['displayBeneath'];
            $args['parentPageID']    = (int) $data['parentPageID'];
			parent::save( $args );
		}
		
	}