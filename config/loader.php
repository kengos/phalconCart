<?php

$loader = new \Phalcon\Loader();

$loader->registerNamespaces(
  [
    'PhalconCart' => APP_PATH . '/app/',
  ]
)->register();
