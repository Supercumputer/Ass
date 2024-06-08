<?php

namespace Myasus\Assigment\Controllers\Client;

use Myasus\Assigment\Commons\Controller;

class ProductController extends Controller {
    private Product $product;

    public function __construct()
    {
        $this->product = new Product();
    }
    public function index() {
        $this->renderViewClient('product', []);
    }

    
        public function detail($id) {
            $product = $this->product->findByID($id);
    
            $this->renderViewClient('product-detail', [
                'product' => $product
            ]);
        }
    }
