<?php

use Phalcon\Mvc\Router;
use Phalcon\Mvc\Router\Group as RouterGroup;

$router = new Router(false);
$router->removeExtraSlashes(true);

$router->setDefaultModule("frontend");
$router->setDefaultController('error');
$router->setDefaultAction('show404');



// $router->add('/:controller/:action', [
//     'module'     => 'frontend',
//     'controller' => 1,
//     'action'     => 2,
// ])->setName('frontend');

// $router->add("/login", [
//     'module'     => 'backend',
//     'controller' => 'login',
//     'action'     => 'index',
// ])->setName('backend-login');

$router->add("/", [
    'module'     => 'frontend',
    'controller' => 'index',
    'action'     => 'index',
]);

$frontend = new RouterGroup([
    'module'     => 'frontend',
    'controller' => 'index',
    'action'     => 'index',
    'namespace'  => 'Weboloper\Frontend\Controllers',
]);

$frontend->add('/:controller/:action/:params', [
    'controller' => 1,
    'action'     => 2,
    'params'     => 3,
]);

$frontend->add('/:controller/:int', [
    'controller' => 1,
    'id'         => 2,
]);

$router->mount($frontend);


$backend = new RouterGroup([
    'module'     => 'backend',
    'controller' => 'dashboard',
    'action'     => 'index',
    'namespace'  => 'Weboloper\Backend\Controllers',
]);

$backend->add('/backend/:controller/:action/:params', [
    'controller' => 1,
    'action'     => 2,
    'params'     => 3,
]);

$backend->add('/backend/:controller/:action', [
    'controller' => 1,
    'action'     => 2,
]);

$backend->add('/backend/:controller/:int', [
    'controller' => 1,
    'id'         => 2,
]);

$backend->add('/backend/:controller', [
    'controller' => 1,
]);

$backend->add('/backend[/]?', [
    'controller' => 'dashboard',
]);

$router->mount($backend);


// $router->add("/products/:action", [
//     'module'     => 'frontend',
//     'controller' => 'products',
//     'action'     => 1,
// ])->setName('frontend-product');

return $router;
 