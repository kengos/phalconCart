<?php

# initalize backend application services
$config = require APP_PATH . '/config/config.php';
$loader = new \Phalcon\Loader();
$loader->registerNamespaces(
  [
    'PhalconCart' => APP_PATH . '/app/',
  ]
)->register();

$service = new \PhalconCart\Core\Initializer\BackendService();
$service->register($config);
$service->attachRouter(require(APP_PATH . '/config/routes/backend.php'));

return $service;