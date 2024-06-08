<?php

use Myasus\Assigment\Controllers\Client\AboutController;
use Myasus\Assigment\Controllers\Client\CartController;
use Myasus\Assigment\Controllers\Client\HomeController;
use Myasus\Assigment\Controllers\Client\LoginController;
use Myasus\Assigment\Controllers\Client\ProductController;

$router->get('/', HomeController::class . '@index');



$router->get('/',                  HomeController::class       . '@index');
$router->get('/about',             AboutController::class      . '@index');
$router->get('/login',             LoginController::class    . '@showFormLogin');
$router->post('/handle-login',     LoginController::class    . '@login');
$router->get('/logout',            LoginController::class    . '@logout');


$router->get('/products',          ProductController::class    . '@index');
$router->get('/products/{id}',     ProductController::class    . '@detail');

$router->get('/cart',              CartController::class . '@index');
$router->get('cart/add',           CartController::class . '@add');
$router->get('cart/quantityInc',   CartController::class . '@quantityInc');
$router->get('cart/quantityDec',   CartController::class . '@quantityDec');
$router->get('cart/remove',        CartController::class . '@remove');
$router->get('cart/detail',        CartController::class . '@detail');
