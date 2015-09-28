<?php

$db = function() {
  $db = require(APP_PATH . '/config/environments/database.php');
  return $db[APP_ENV];
};
return new \Phalcon\Config(
  [
    'env' => APP_ENV,
    'db'  => $db(),
    'application' => [
      'controllersDir' => APP_PATH . '/app/controllers/',
      'modelsDir'      => APP_PATH . '/app/models/',
      'componentDir'   => APP_PATH . '/app/components/',
      'cacheDir'       => APP_PATH . '/runtime/cache/',
      'voltCacheDir'   => APP_PATH . '/runtime/cache/volt/',
      'frontendViewDir' => APP_PATH . '/app/views/frontend/',
      'backendViewDir' => APP_PATH . '/app/views/backend/',
      'logDir'         => APP_PATH . '/runtime/logs/',
      'baseUri'        => '/phalconCart/',
    ]
  ]
);
