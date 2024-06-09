<?php

namespace Myasus\Assigment\Controllers\Client;

use Myasus\Assigment\Commons\Controller;
use Myasus\Assigment\Commons\Helper;
use Myasus\Assigment\Models\Cart;
use Myasus\Assigment\Models\CartDetail;
use Myasus\Assigment\Models\Product;

class CartController extends Controller
{
    private Product $product;
    private Cart $cart;
    private CartDetail $cartDetail;

    public function __construct()
    {
        $this->product = new Product();
        $this->cart = new Cart();
        $this->cartDetail = new CartDetail();
    }
    public function index()
    {
        $this->renderViewClient('cart', []);
    }

    public function add()
    { 

        $product = $this->product->findByID($_GET['productID']);

       
        $key = 'cart';

        if (isset($_SESSION['user'])) {
            $key .= '-' . $_SESSION['user']['id'];
        }

        if (!isset($_SESSION[$key][$product['id']])) {

            $_SESSION[$key][$product['id']] = $product + ['quantity' => $_GET['quantity'] ?? 1];
        } else {

            $_SESSION[$key][$product['id']]['quantity'] += $_GET['quantity'];
        }

        
        if (isset($_SESSION['user'])) {
            $conn = $this->cart->getConnection();


            


            try {

                $cart = $this->cart->findByUserID($_SESSION['user']['id']);

                if (empty($cart)) {
                    $this->cart->insert([
                        'user_id' => $_SESSION['user']['id']
                    ]);
                }

                $cartID = $cart['id'] ?? $conn->lastInsertId();

                $_SESSION['cart_id'] = $cartID;

                $this->cartDetail->deleteByCartID($cartID);

                foreach ($_SESSION[$key] as $productID => $item) {
                    $this->cartDetail->insert([
                        'cart_id' => $cartID,
                        'product_id' => $productID,
                        'quantity' => $item['quantity']
                    ]);
                }


               
            } catch (\Throwable $th) {
                // echo $th->getMessage();die;
                //throw $th;
               

            }
        }

        header('Location: ' . url('cart'));
        exit;
    }

    public function quantityInc()
    {

        $key = 'cart';
        if (isset($_SESSION['user'])) {
            $key .= '-' . $_SESSION['user']['id'];
        }

        $_SESSION[$key][$_GET['productID']]['quantity'] += 1;


        if (isset($_SESSION['user'])) {
            $this->cartDetail->updateByCartIDAndProductID(
                $_GET['cartID'],
                $_GET['productID'],
                $_SESSION[$key][$_GET['productID']]['quantity']
            );
        }

        header('Location: ' . url('cart'));
        exit;
    }

    public function quantityDec()
    { // giảm số lượng
        // Lấy ra dữ liệu từ cart_details để đảm bảo n có tồn tại bản ghi

        // Thay đổi trong SESSION
        $key = 'cart';
        if (isset($_SESSION['user'])) {
            $key .= '-' . $_SESSION['user']['id'];
        }

        if ($_SESSION[$key][$_GET['productID']]['quantity'] > 1) {
            $_SESSION[$key][$_GET['productID']]['quantity'] -= 1;
        }

        // Thay đổi trong DB
        if (isset($_SESSION['user'])) {
            $this->cartDetail->updateByCartIDAndProductID(
                $_GET['cartID'],
                $_GET['productID'],
                $_SESSION[$key][$_GET['productID']]['quantity']
            );
        }

        header('Location: ' . url('cart'));
        exit;
    }

    public function remove()
    {
        $key = 'cart';
        if (isset($_SESSION['user'])) {
            $key .= '-' . $_SESSION['user']['id'];
        }

        if (isset($_GET['productID'])) {
            // Xóa một sản phẩm cụ thể
            unset($_SESSION[$key][$_GET['productID']]);

            if (isset($_SESSION['user'])) {
                $this->cartDetail->deleteByCartIDAndProductID($_GET['cartID'], $_GET['productID']);
            }
        } else {
            // Xóa toàn bộ giỏ hàng
            unset($_SESSION[$key]);

            if (isset($_SESSION['user'])) {
                $this->cartDetail->deleteByCartID($_GET['cartID']);
            }
        }

        header('Location: ' . url('cart'));
        exit;
    }

    // public function remove()
    // { // xóa item or xóa trắng
    //     $key = 'cart';
    //     if (isset($_SESSION['user'])) {
    //         $key .= '-' . $_SESSION['user']['id'];
    //     }

    //     unset($_SESSION[$key][$_GET['productID']]);

    //     if (isset($_SESSION['user'])) {
    //         $this->cartDetail->deleteByCartIDAndProductID($_GET['cartID'], $_GET['productID']);
    //     }

    //     header('Location: ' . url('cart/detail'));
    //     exit;
    // }


}
