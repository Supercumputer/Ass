<?php

namespace Myasus\Assigment\Controllers\Client;
use Myasus\Assigment\Commons\Controller;
use Myasus\Assigment\Commons\Helper;
use Myasus\Assigment\Models\Product;

class HomeController extends Controller{
 private Product $product;
    public function __construct()
    {
        $this->product = new Product();
    }
    public function index(){ 
        $top8Product = $this->product->top8ProductHighlight();
        $this->renderViewClient('home', [
           'top8Product' =>$top8Product
        ]);

    }

    
}
