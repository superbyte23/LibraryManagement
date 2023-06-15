<?php
  // App Root
  define('APPROOT', dirname(dirname(__FILE__)));
  // URL Root
  
  define('URLROOT', 'http://'.$_SERVER['SERVER_ADDR'].'/book');

  define('SERVERADDRESS', 'http://'.$_SERVER['REMOTE_ADDR'].'/book');

  // define('URLROOT', 'http://localhost/book-a-book'); 
  // pulblic folder
  define('ASSETS', URLROOT.'/public');
  // Site Name.
  define('SITENAME', 'BookaBook');

  // Site Name.
  define('APPNAME', 'BookaBook');

  // version
  define('VERSION', 'Version 1.0.0'); 

  // Mysql DB
  define("DB_HOST", "localhost");
  define("DB_USER", "root");
  define("DB_PASS", "");
  define("DB_NAME", "librarydb");
  