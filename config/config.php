<?php

defined('APP_PATH') || define('APP_PATH', __DIR__ . '/..');
defined('APP_ENV') || define('APP_ENV', require(APP_PATH . '/config/environment.php'));

return new \Phalcon\Config(
  [
    'env' => APP_ENV,
    'db' => require(APP_PATH . '/config/' . APP_ENV . '/database.php'),
    'application' => [
      'controllersDir' => APP_PATH . '/app/controllers/',
      'modelsDir'      => APP_PATH . '/app/models/',
      'migrationsDir'  => APP_PATH . '/db/migrations/',
      'viewsDir'       => APP_PATH . '/app/views/',
      'pluginsDir'     => APP_PATH . '/app/plugins/',
      'libraryDir'     => APP_PATH . '/app/library/',
      'componentDir'   => APP_PATH . '/app/components/',
      'cacheDir'       => APP_PATH . '/runtime/cache/',
      'logDir'         => APP_PATH . '/runtime/logs/',
      'baseUri'        => '/phalconCart/',
    ]
  ]
);
