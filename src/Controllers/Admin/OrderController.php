<?php

namespace Myasus\Assigment\Controllers\Admin;

use Myasus\Assigment\Commons\Controller;
use Myasus\Assigment\Commons\Helper;
use Myasus\Assigment\Models\Order;
use Myasus\Assigment\Models\OrderDetail;

class OrderController extends Controller
{
    private Order $order;
    private OrderDetail $orderDetail;

    public function __construct()
    {
        $this->order = new Order();
        $this->orderDetail = new OrderDetail();
    }

    public function index()
    {
        $orders = $this->order->all();

        // Helper::debug($orders);

        $this->renderViewAdmin('orders.index', ['orders' => $orders]);
    }

    public function detail($id)
    { // Chi tiết giỏ hàng

        $orderInfor = $this->order->findByID($id);
        $orderDetail = $this->orderDetail->findByID($id);
        // Helper::debug($orderInfor);


        $this->renderViewAdmin('orders.order-detail', [
            'orderInfor' => $orderInfor,
            'orderDetail' => $orderDetail
        ]);
    }

    public function updateStatus($id)
    {
        $this->order->updateStatus($id);
        header('Location: ' . url('admin/orders'));
        exit();
    }
}
