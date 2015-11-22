<?php

// Define the core paths
// Define them as absolute paths to make sure that require_once works as expected

// DIRECTORY_SEPARATOR is a PHP pre-defined constant
// (\ for Windows, / for Unix)
define('DS', DIRECTORY_SEPARATOR);
define('SITE_HOME_URL', 'http://localhost/dictionary');
define('API_PATH', SITE_HOME_URL.DS.'api'.DS.'v1');
define('LIB_PATH', API_PATH.DS.'config');

// db connection (local)
define("DB_HOST" , "localhost");
define("DB_USER" , "root");
define("DB_PASSWORD" , "");
define("DB_DATABASE" , "dictionary");

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or DIE('Database connection failed.');

?>