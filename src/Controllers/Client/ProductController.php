<?php

namespace Myasus\Assigment\Controllers\Client;

use Myasus\Assigment\Commons\Controller;
use Myasus\Assigment\Commons\Helper;
use Myasus\Assigment\Models\Category;
use Myasus\Assigment\Models\Product;

class ProductController extends Controller
{
    private Product $product;
    private Category $category;

    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
    }

    public function index()
    {
        $categorys = $this->category->all();
        
        $page = $_GET['page'] ?? 1;

        $sort_by = $_GET['sort_by'] ?? 'default_sort';

        [$products, $totalPage] = $this->product->paginateProduct($page, $sort_by);

        $this->renderViewClient('product', [
            'categorys' => $categorys,
            'products' => $products,
            'totalPage' => $totalPage,
            'page' => $page
        ]);
    }

    public function detail($id)
    {

        [$productInfor, $productCategory] = $this->product->getProductInfor($id);
        // Helper::debug($productCategory);
        $this->renderViewClient('product-detail', [
            'productInfor' => $productInfor,
            'productCategory' => $productCategory,
        ]);
    }
}
