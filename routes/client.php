<?php

use Myasus\Assigment\Controllers\Client\CartController;
use Myasus\Assigment\Controllers\Client\HomeController;
use Myasus\Assigment\Controllers\Client\ProductController;

$router->get('/', HomeController::class . '@index');



$router->get('/products',          ProductController::class    . '@index');
$router->get('/products/{id}',     ProductController::class    . '@detail');
$router->get('/cart',     CartController::class    . '@index');
