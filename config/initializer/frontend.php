<?php

# initalize frontend application services

$config = require APP_PATH . '/config/config.php';
$loader = new \Phalcon\Loader();
$loader->registerNamespaces(
  [
    'PhalconCart' => APP_PATH . '/app/',
  ]
)->register();

$service = new \PhalconCart\Core\Initializer\FrontendService();
$service->register($config);
$service->attachRouter(require(APP_PATH . '/config/routes/frontend.php'));

return $service;