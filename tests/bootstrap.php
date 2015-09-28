<?php

use Phalcon\DI;
use Phalcon\DI\FactoryDefault;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('APP_PATH', dirname(__DIR__));
define('APP_ENV', 'test');
set_include_path(APP_PATH . '/tests/' . get_include_path());
require APP_PATH . '/vendor/autoload.php';

# for test loader
$loader = new \Phalcon\Loader();
$loader->registerDirs([
  APP_PATH . '/tests/'
]);
$loader->register();
