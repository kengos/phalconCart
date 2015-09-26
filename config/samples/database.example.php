<?php

$adapter = 'Mysql';
$dbname = 'phalcon_cart_dev';

return [
  'dbMaster' => [
    'adapter'  => $adapter,
    'host'     => 'localhost:3306',
    'username' => 'root',
    'password' => '',
    'dbname'   => $dbname,
    'charset'  => 'utf8'
  ],
  'dbSlaves' => [
    [
      'adapter'  => $adapter,
      'host'     => 'localhost:3306',
      'username' => 'root',
      'password' => '',
      'dbname'   => $dbname,
      'charset'  => 'utf8'
    ],
    // [
    //   'adapter'  => $adapter,
    //   'host'     => 'localhost:3306',
    //   'username' => 'root',
    //   'password' => '',
    //   'dbname'   => $dbname,
    //   'charset'  => 'utf8'
    // ]
  ]
];