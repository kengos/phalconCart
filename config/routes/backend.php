<?php

$router = new Phalcon\Mvc\Router();
$router->add('/users', ['controller' => 'Users', 'action' => 'index']);
$router->add('/users/new', ['controller' => 'Users', 'action' => 'new']);
return $router;