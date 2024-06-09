<?php

namespace Myasus\Assigment\Controllers\Client;

use Myasus\Assigment\Commons\Controller;
use Myasus\Assigment\Commons\Helper;
use Myasus\Assigment\Models\Product;

class ProductController extends Controller
{
    private Product $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function index()
    {

        $page = $_GET['page'] ?? 1;
        [$products, $totalPage] = $this->product->paginate($page);

        $this->renderViewClient('product', [
            'products' => $products,
            'totalPage' => $totalPage,
            'page' => $page
        ]);
    }


    public function detail($id)
    {

        $productCategory = $this->product->getProductInfor($id);
        = $productCategory;
        $this->renderViewClient('product-detail', [
            'productInfor' => $productInfor,
             'productCategory'=>$productCategory,
        ]);
    }
}
