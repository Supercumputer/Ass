<?php


// $router->before('GET|POST', '/admin/*.*', function() {

//     if (!is_logged()) {
//         header('location: ' . url('auth/login') );
//         exit();
//     } 

//     if (!is_admin()) {
//         header('location: ' . url() );
//         exit();
//     }
    
// });

use Myasus\Assigment\Controllers\Admin\CategoryController;
use Myasus\Assigment\Controllers\Admin\DashboardController;

$router->mount('/admin', function () use ($router) {

    $router->get('/', DashboardController::class . '@dashboard');

//     // CRUD Catergory
$router->mount('/categorys', function () use ($router) {
            $router->get('/',               CategoryController::class . '@index');  // Danh sách
            $router->get('/create',         CategoryController::class . '@create'); // Show form thêm mới
            $router->post('/store',         CategoryController::class . '@store');  // Lưu mới vào DB
            $router->get('/{id}/edit',      CategoryController::class . '@edit');   // Show form sửa
            $router->get('/{id}/show',      CategoryController::class . '@show');   // Xem chi tiết
            $router->post('/{id}/update',   CategoryController::class . '@update'); // Lưu sửa vào DB
            $router->get('/{id}/delete',    CategoryController::class . '@delete'); // Xóa
        });






//     $router->mount('/products', function () use ($router) {
//         $router->get('/',               ::class . '@index');  // Danh sách
//         $router->get('/create',         ::class . '@create'); // Show form thêm mới
//         $router->post('/store',         ::class . '@store');  // Lưu mới vào DB
//         $router->get('/{id}/show',      ::class . '@show');   // Xem chi tiết
//         $router->get('/{id}/edit',      ::class . '@edit');   // Show form sửa
//         $router->post('/{id}/update',   ::class . '@update'); // Lưu sửa vào DB
//         $router->get('/{id}/delete',    ::class . '@delete'); // Xóa
//     });

//     $router->mount('/users', function () use ($router) {
//         $router->get('/',               UserController::class . '@index');  // Danh sách
//         $router->get('/create',         UserController::class . '@create'); // Show form thêm mới
//         $router->post('/store',         UserController::class . '@store');  // Lưu mới vào DB
//         $router->get('/{id}/show',      UserController::class . '@show');   // Xem chi tiết
//         $router->get('/{id}/edit',      UserController::class . '@edit');   // Show form sửa
//         $router->post('/{id}/update',   UserController::class . '@update'); // Lưu sửa vào DB
//         $router->get('/{id}/delete',    UserController::class . '@delete'); // Xóa
//     });
    
});