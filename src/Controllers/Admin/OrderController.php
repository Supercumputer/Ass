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
        $perPage = $_GET['perPage'] ?? 5;
        $page = $_GET['page'] ?? 1;
        $sort_by = $_GET['sort_by'] ?? 'default_sort';

        [$orders, $totalPage] = $this->order->paginate($page, $sort_by, $perPage);

        $this->renderViewAdmin('orders.index', [
            'sort_by' => $sort_by,
            'perPage' => $perPage,
            'page' => $page,
            'orders' => $orders,
            'totalPage' => $totalPage
        ]);
    }

    public function detail($id)
    { // Chi tiết giỏ hàng

        $orderInfor = $this->order->findByID($id);
        $orderDetails = $this->orderDetail->findByOrderId($id);

        $this->renderViewAdmin('orders.order-detail', [
            'orderInfor' => $orderInfor,
            'orderDetail' => $orderDetails
        ]);
    }

    public function updateStatus($id)
    {

        $status_delivery = $_GET['status_delivery'];

        $this->order->updateStatus($id,  $status_delivery);
        header('Location: ' . url('admin/orders'));
        exit();
    }

    public function delete($id)
    {
        $this->order->delete($id);
        header('Location: ' . url('admin/orders'));
        exit();
    }
}
