<?php

$router = new Phalcon\Mvc\Router();
$router->add('/', ['controller' => 'Top', 'action' => 'index']);
return $router;