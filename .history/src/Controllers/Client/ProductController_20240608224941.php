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
        $this->renderViewClient('product', []);
    }
    public function detail($id)
    {
        $productInfor = $this->product->findByID($id);
Helper::d
        $productCategory  = $this->product->getRelatedProducts($productInfor['category_id']);
        Helper::debug($productCategory);

       $this->renderViewClient('product-detail', [
            'productInfor' => $productInfor,
            'productCategory'=>$productCategory,
        ]);
        
    }
}


