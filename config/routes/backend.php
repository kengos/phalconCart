<?php

$router = new Phalcon\Mvc\Router();
$router->add('/users', ['controller' => 'Users', 'action' => 'index']);
return $router;