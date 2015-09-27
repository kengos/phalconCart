<?php

return [
  'adapterType'  => 'Mysql',
  'master' => [
    'host'     => 'localhost',
    'username' => 'root',
    'password' => '',
    'dbname'   => 'phalcon_cart',
    'charset'  => 'utf8',
    'port'     => 3306
  ],
  'slaves' => [
    [
      'host'     => 'localhost',
      'username' => 'root',
      'password' => '',
      'dbname'   => 'phalcon_cart',
      'charset'  => 'utf8',
      'port'     => 3306
    ]
    // [
    //   'host'     => 'localhost',
    //   'username' => 'root',
    //   'password' => '',
    //   'dbname'   => 'phalcon_cart',
    //   'charset'  => 'utf8',
    //   'port'     => 3306
    // ]
  ]
];