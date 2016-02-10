<?php

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

  

  if (strpos($_SERVER['SERVER_NAME'], 'localhost') !== false) {
    define('DB_SERVER',     'localhost');
    define('DB_USERNAME',   'dev_user');
    define('DB_PASSWORD',   'dev_pass');
    define('DB_DATABASE',   'dev_site');
  } elseif(strpos($_SERVER['SERVER_NAME'], 'stage01') !== false){
    define('DB_SERVER',     '127.0.0.1');
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
  //define('SITEMAPXML_FILE', 'files/sitemap.xml');

    // Outgoing emails
    define('OUTGOING_MAIL_ISSUER_ADDRESS', 'administrator@snakeriverk9.com');
    define('EMAIL_DEFAULT_FROM_ADDRESS', OUTGOING_MAIL_ISSUER_ADDRESS);
    define('EMAIL_ADDRESS_FORGOT_PASSWORD', OUTGOING_MAIL_ISSUER_ADDRESS);
    define('EMAIL_DEFAULT_FROM_NAME', 'Svalinn.com Website');

