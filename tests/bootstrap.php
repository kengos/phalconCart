<?php

use Phalcon\DI;
use Phalcon\DI\FactoryDefault;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('ROOT_PATH', __DIR__);

echo ROOT_PATH . "\n";
set_include_path(
  ROOT_PATH . "/" . get_include_path()
);

require ROOT_PATH . "/../vendor/autoload.php";

$loader = new \Phalcon\Loader();
$loader->registerDirs(
  [
    ROOT_PATH
  ]
);
$loader->register();

$di = new FactoryDefault();
DI::reset();

DI::setDefault($di);