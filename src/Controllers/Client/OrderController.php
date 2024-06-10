<?php

namespace Myasus\Assigment\Controllers\Client;

use Myasus\Assigment\Commons\Controller;
use Myasus\Assigment\Commons\Helper;
use Myasus\Assigment\Models\Cart;
use Myasus\Assigment\Models\CartDetail;
use Myasus\Assigment\Models\Order;
use Myasus\Assigment\Models\OrderDetail;
use Myasus\Assigment\Models\User;
use Rakit\Validation\Validator;

class OrderController extends Controller
{
    public User $user;
    public Order $order;
    public OrderDetail $orderDetail;
    private Cart $cart;
    private CartDetail $cartDetail;

    public function __construct()
    {
        $this->user         = new User();
        $this->order        = new Order();
        $this->orderDetail  = new OrderDetail();
        $this->cart         = new Cart();
        $this->cartDetail   = new CartDetail();
    }

    public function index()
    {
        $this->renderViewClient('payment', []);
    }

    public function checkout()
    {
        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'user_name' => 'required|max:50',
            'user_email' => 'required|email',
            'user_phone' => 'required|min:10|max:15',
            'user_address' => 'required|max:50',

        ]);

        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('location: ' . url('order?total_price=' . $_POST['total_price']));
            exit;
        } else {

            // Chưa đăng nhập thì fai tạo tài khoản
            $userID = $_SESSION['user']['id'] ?? null;

            if (!$userID) {
                $conn = $this->user->getConnection();

                $this->user->insert([
                    'name' => $_POST['user_name'],
                    'email' => $_POST['user_email'],
                    'password' => password_hash($_POST['user_email'], PASSWORD_DEFAULT),
                    'type' => 'member',
                    'is_active' => 0,
                ]);

                $userID = $conn->lastInsertId();
            }

            // Thêm dữ liệu vào Order & OrderDetail
            $conn = $this->order->getConnection();

            $this->order->insert([
                'user_id' => $userID,
                'user_name' => $_POST['user_name'],
                'user_email' => $_POST['user_email'],
                'user_phone' => $_POST['user_phone'],
                'user_address' => $_POST['user_address'],
            ]);

            $orderID = $conn->lastInsertId();

            $key = 'cart';
            if (isset($_SESSION['user'])) {
                $key .= '-' . $_SESSION['user']['id'];
            }

            foreach ($_SESSION[$key] as $productID => $item) {
                $this->orderDetail->insert([
                    'order_id' => $orderID,
                    'product_id' => $productID,
                    'quantity' => $item['quantity'],
                    'price_regular' => $item['price_regular'],
                    'price_sale' => $item['price_sale'],
                ]);
            }


            unset($_SESSION[$key]);

            if (isset($_SESSION['user'])) {
                unset($_SESSION['cart_id']);
            }

            header('Location: ' . url('thanks'));
            exit;
        }
    }

    public function history()
    {
        $id = $_SESSION['user']['id'] ?? $_GET['order_id'] ?? null;

        $data = [];

        if (isset($_SESSION['user']['id'])) {
            $data = $this->order->findByUserID($id);
        } else {
            $order = $this->order->findByID($id);
            if(!empty($order)){
                array_push($data, $order);
            }
        }
        
        // Helper::debug($data);
        $this->renderViewClient('history', [
            'data' => $data
        ]);
    }

    public function orderDetail($id)
    {
        $data = $this->orderDetail->findByOrderId($id);
        // Helper::debug($data);
        $this->renderViewClient('order-detail', [
            'data' => $data
        ]);
    }

    public function thanks()
    {
        $this->renderViewClient('thanks', []);
    }
}
