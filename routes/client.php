<?php

use Myasus\Assigment\Controllers\Client\OrderController;
use Myasus\Assigment\Controllers\Client\CartController;
use Myasus\Assigment\Controllers\Client\ContactController;
use Myasus\Assigment\Controllers\Client\HomeController;
use Myasus\Assigment\Controllers\Client\IntroduceController;
use Myasus\Assigment\Controllers\Client\LoginController;
use Myasus\Assigment\Controllers\Client\NewsController;
use Myasus\Assigment\Controllers\Client\ProductController;


$router->get('/',                  HomeController::class       . '@index');
$router->get('/introduce',         IntroduceController::class      . '@index');
$router->get('/contact',           ContactController::class      . '@index');
$router->get('/news',              NewsController::class      . '@index');

$router->get('/login',             LoginController::class    . '@showFormLogin');
$router->post('/handle-login',     LoginController::class    . '@login');
$router->get('/logout',            LoginController::class    . '@logout');


$router->get('/products',          ProductController::class    . '@index');
$router->get('/products/{id}',     ProductController::class    . '@detail');

$router->get('/cart',              CartController::class    . '@index');





$router->mount('/cart', function () use ($router) {
    $router->get('/',                   CartController::class .  '@index');
    $router->get('/add',            CartController::class .  '@add');
    $router->get('/quantityInc',    CartController::class .  '@quantityInc');
    $router->get('/quantityDec',    CartController::class .  '@quantityDec');
    $router->get('/remove',         CartController::class .  '@remove');
    $router->get('/detail',         CartController::class .  '@detail');
});



$router->get('order',              OrderController::class . '@index');
$router->post('order/checkout',    OrderController::class . '@checkout');
$router->get('thanks',             OrderController::class . '@thanks');
