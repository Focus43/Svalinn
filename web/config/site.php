<?php
	
	/**
	 * PAGODABOX PRODUCTION SETTINGS
	 */
	if( isset($_SERVER['PAGODA_PRODUCTION']) && ((bool) $_SERVER['PAGODA_PRODUCTION'] === true) ) {
		
		// enable all url rewriting
		define('URL_REWRITING_ALL', true);
		
		// needed for successful installation on Pagodabox. see issue
		// http://www.concrete5.org/developers/bugs/5-6-0-2/install-fails-with-mysql-auto-increment-offset-set/
		//define('REGISTERED_GROUP_ID', '5');
		//define('ADMIN_GROUP_ID', '9');
		
		// connect to Redis cache
        define('REDIS_CONNECTION_HANDLE', sprintf("%s:%s", $_SERVER['CACHE1_HOST'], $_SERVER['CACHE1_PORT']));

		// the following depend on the constant REDIS_CONNECTION_HANDLE being defined
		if( defined('REDIS_CONNECTION_HANDLE') ){
			// use Redis as the page cache library
			define('PAGE_CACHE_LIBRARY', 'Redis');
		
			// if using the FluidDNS package
			define('PAGE_TITLE_FORMAT', '%2$s');
		}
		
		// application profiler. disabled on production by default (just uncomment to use)
		//define('ENABLE_APPLICATION_PROFILER', true);

        // disable marketplace support b/c of Pagodabox read-only file system
        define('ENABLE_MARKETPLACE_SUPPORT', false);
	
	/**
	 * STAGING, LOCAL MACHINE, OR VAGRANT?
	 * 
	 * Is the site running locally? Then create a site.local.php file in the /config folder,
	 * and DO NOT TRACK IT IN THE REPO (default settings in .gitignore). Any team members, 
	 * or other environments (eg. dev or staging) you want to run the site on should have 
	 * their own site.local.php file.
	 */
	}else{

        // enable all url rewriting
        define('URL_REWRITING_ALL', true);
        // connect to Redis cache
        define('REDIS_CONNECTION_HANDLE', '127.0.0.1:6379');
        // the following depend on the constant REDIS_CONNECTION_HANDLE being defined
        if( defined('REDIS_CONNECTION_HANDLE') ){
            // use Redis as the page cache library
            define('PAGE_CACHE_LIBRARY', 'Redis');
            // if using the FluidDNS package
            define('PAGE_TITLE_FORMAT', '%2$s');
        }

	}

    define('DB_SERVER',     'localhost');
    /**
     * our three (local,staging and prod) db creds
     */
    if (strpos($_SERVER['SERVER_NAME'], 'localhost') !== false) {
      define('DB_USERNAME',   'dev_user');
      define('DB_PASSWORD',   'dev_pass');
      define('DB_DATABASE',   'dev_site');
    } elseif($_SERVER['SERVER_NAME'], 'stage01') !== false){
      define('DB_USERNAME',   'svalinn_admin');
      define('DB_PASSWORD',   'Focus43#2016');
      define('DB_DATABASE',   'svalinn_stage');
    } else {
      define('DB_USERNAME',   'svalinn_admin');
      define('DB_PASSWORD',   'Focus43#2016');
      define('DB_DATABASE',   'svalinn_main');
    }
	define('PASSWORD_SALT', '6NVukfgwAgqaOi3SMlsWwEqURSe4Xh8pBApvhOauP7blC2kx1FKsHxcjGSXMqP3N');
	
	// Sitemap.xml file
	define('SITEMAPXML_FILE', 'files/sitemap.xml');

    // Outgoing emails
    define('OUTGOING_MAIL_ISSUER_ADDRESS', 'administrator@snakeriverk9.com');
    define('EMAIL_DEFAULT_FROM_ADDRESS', OUTGOING_MAIL_ISSUER_ADDRESS);
    define('EMAIL_ADDRESS_FORGOT_PASSWORD', OUTGOING_MAIL_ISSUER_ADDRESS);
    define('EMAIL_DEFAULT_FROM_NAME', 'Svalinn.com Website');