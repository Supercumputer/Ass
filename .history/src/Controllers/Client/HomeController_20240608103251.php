<?php

namespace Myasus\Assigment\Controllers\Client;

use Myasus\Assigment\Commons\Controller;
use Myasus\Assigment\Commons\Helper;
use Myasus\Assigment\Models\Category;
use Myasus\Assigment\Models\Product;

class HomeController extends Controller
{
    private Product $product;
    private Product $categoryName;
    private Category $category;
    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
        $this->category
    }

    public function index()
    {
        $categorys = $this->category->all();
        $top8Product = $this->product->top8ProductHighlight();
        $this->renderViewClient('home', [
            'top8Product' => $top8Product,
            'categorys'=> $categorys
        ]);
    }
}
