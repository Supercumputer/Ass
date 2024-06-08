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
        $product = $this->product->findByID($id);
        
        $productCategory  = $this->product->getRelatedProducts($product['id'],$product['category_id']);
        Helper::debug($productCategory);

        $this->renderViewClient('product-detail', [
            'product' => $product
        ]);
    }
}
