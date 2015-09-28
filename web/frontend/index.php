<?php

error_reporting(E_ALL);

define('APP_PATH', dirname(dirname(__DIR__)));
// TODO $_SERVER['APPLICATION_ENV']
defined('APP_ENV') || define('APP_ENV', require(APP_PATH . '/config/environments/env.php'));

require APP_PATH . '/vendor/autoload.php';

try {
  $service = require APP_PATH . "/config/initializer/frontend.php";
  $application = new \Phalcon\Mvc\Application($service->getDI());

  if (!empty($_SERVER['REQUEST_URI'])) {
    $uriParts = explode('?', $_SERVER['REQUEST_URI']);
    $uri = $uriParts[0];
  } else {
    $uri = '/';
  }
  echo $application->handle($uri)->getContent();
} catch (\Exception $e) {
  echo $e->getMessage();
}
