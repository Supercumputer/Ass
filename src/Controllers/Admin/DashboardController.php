<?php

namespace Myasus\Assigment\Controllers\Admin;

use Myasus\Assigment\Commons\Controller;
use Myasus\Assigment\Commons\Helper;
use Myasus\Assigment\Models\Category;
use Myasus\Assigment\Models\Order;
use Myasus\Assigment\Models\Product;
use Myasus\Assigment\Models\User;

class DashboardController extends Controller
{
    private User $user;
    private Order $order;
    private Category $category;
    private Product $product;

    public function __construct()
    {
        $this->user = new User();
        $this->order = new Order();
        $this->category = new Category();
        $this->product = new Product();
    }

    public function dashboard()
    {
        
        $totalUsers = $this->user->count();
        $totalOrders = $this->order->count();
        $totalProducts = $this->product->count();
        $totalCategorys = $this->category->count();
        
        [$orders, $totalPage] = $this->order->paginate($_GET['page'] ?? 1);
        
        $users= $this->user->getTop5MemberNew();

        $this->renderViewAdmin('dashboard', [
            'totalUsers' => $totalUsers,
            'totalOrders' => $totalOrders,
            'totalProducts' => $totalProducts,
            'totalCategorys' => $totalCategorys,
            'users' => $users,
            'orders' => $orders
        ]);
    }
}
