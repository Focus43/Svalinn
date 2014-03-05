<?php

	class ShieldPageController extends Controller {
		
		const PACKAGE_HANDLE	= 'shield',
			  FLASH_TYPE_OK		= 'success',
			  FLASH_TYPE_ERROR	= 'error';
			  
		protected $requireHttps = false;
		
		
		/**
		 * Ruby on Rails "flash" functionality ripoff.
		 * @param string $msg Optional, set the flash message
		 * @param string $type Optional, set the class for the alert
		 * @return void
		 */
		public function flash( $msg = 'Success', $type = self::FLASH_TYPE_OK ){
			$_SESSION['flash_msg'] = array(
				'msg'  => $msg,
				'type' => $type
			);
		}
		
		
		/**
		 * Before a page gets rendered, always make sure that the $_POST card_number
		 * field is empty. For any page. No matter what.
		 */
		public function on_before_render(){
			// never send back the credit card
			$_POST['card_number'] = false;
		}
		
		
		/**
		 * Add js/css + tools URL meta tag; clear the flash.
		 * @return void
		 */
		public function on_start(){			
			$this->includeAssets($this);
		}


        /**
         * This stuff is broken out into a seperate method (instead of on_start), because the view.php
         * file in the theme might have single pages that don't necessarily inherit from controller,
         * but still need the theme assets attached. In the theme's view.php file, we can now
         * just pass the Controller object into an instance of the Srk9PageController class, and it'll
         * automatically pass in all required assets.
         * @param Controller $pageController The page controller object
         * @return void
         */
        public function includeAssets( Controller $pageController ){
            // force https (if $requireHTTPS == true)
            if( $pageController->requireHttps == true && !( isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on') ) ){
                header("Location: " . str_replace('http', 'https', BASE_URL . Page::getCurrentPage()->getCollectionPath()));
            }
            
            // header and CSS items
            $pageController->addHeaderItem( '<meta id="shieldToolsDir" value="'.SHIELD_TOOLS_URL.'" />' );
            $pageController->addHeaderItem( $this->getHelper('html')->css('app.css', self::PACKAGE_HANDLE) );
            $pageController->addHeaderItem( $this->getHelper('html')->javascript('modernizr.js', self::PACKAGE_HANDLE) );
            
            // ie8 stylesheet
            //$ie8 = "<!--[if lt IE 9]>\n" . $this->getHelper('html')->css('ie8.css', self::PACKAGE_HANDLE) . "\n<![endif]-->";
            //$this->addHeaderItem( $ie8 );
            
            // footer stuff (usually javascript)
//            $pageController->addFooterItem( $this->getHelper('html')->javascript('jquery.js', self::PACKAGE_HANDLE) );
            $pageController->addFooterItem( $this->getHelper('html')->javascript('foundation.min.js', self::PACKAGE_HANDLE) );
            $pageController->addFooterItem( $this->getHelper('html')->javascript('debug.js', self::PACKAGE_HANDLE) );
            $pageController->addFooterItem( $this->getHelper('html')->javascript('plugins.js', self::PACKAGE_HANDLE) );
            $pageController->addFooterItem( $this->getHelper('html')->javascript('app.js', self::PACKAGE_HANDLE) );

            // message flash
            if( isset($_SESSION['flash_msg']) ){
                $pageController->set('flash', $_SESSION['flash_msg']);
                unset($_SESSION['flash_msg']);
            }
        }
		
		
		/**
		 * Same as $view->action(), but forces to return a fully qualified URL prepended
		 * with https://
		 * @param string $action
		 * @param string $task(s)
		 * @return string
		 */
		public function secureAction($action, $task = null){
			$args = func_get_args();
			array_unshift($args, Page::getCurrentPage()->getCollectionPath());
			$path = call_user_func_array(array('View', 'url'), $args);
			return 'https://' . $_SERVER['HTTP_HOST'] . $path;
		}
		
		
		/**
		 * Send back an ajax response if request headers accept json, or handle 
		 * redirect if just doing regular http
		 * @param bool $okOrFail
		 * @param mixed String || Array $message
		 * @return void
		 */
		protected function formResponder( $okOrFail, $message ){
			$accept = explode( ',', $_SERVER['HTTP_ACCEPT'] );
			$accept = array_map('trim', $accept);
			
			
			// send back a JSON response
			if( in_array($accept[0], array('application/json', 'text/javascript')) || $_SERVER['X_REQUESTED_WITH'] == 'XMLHttpRequest'){
				header('Content-Type: application/json');
				echo json_encode( (object) array(
					'code'		=> (int) $okOrFail,
					'messages'	=> is_array($message) ? $message : array($message)
				));
				exit;
			}

			// somehow a plain old html browser request got through, redirect it
			$this->flash( $message, ((bool)$okOrFail === true ? self::FLASH_TYPE_OK : self::FLASH_TYPE_ERROR) );
			$this->redirect( Page::getCurrentPage()->getCollectionPath() );
		}
		
		
		/**
		 * "Memoize" helpers so they're only loaded once.
		 * @param string $handle Handle of the helper to load
		 * @param string $pkg Package to get the helper from
		 * @return ...Helper class of some sort
		 */
		public function getHelper( $handle, $pkg = false ){
			$helper = '_helper_' . preg_replace("/[^a-zA-Z0-9]+/", "", $handle);
			if( $this->{$helper} === null ){
				$this->{$helper} = Loader::helper($handle, $pkg);
			}
			return $this->{$helper};
		}
		
	}
