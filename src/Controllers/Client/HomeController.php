<?php

namespace Myasus\Assigment\Controllers\Client;

use Myasus\Assigment\Commons\Controller;
use Myasus\Assigment\Commons\Helper;
use Myasus\Assigment\Models\Category;

class HomeController extends Controller{
    private Category $category;
    public function __construct()
    {
        $this->category = new Category();
    }

    public function index(){

        $categorys = $this->category->all();

    
        $this->renderViewClient('home', [
            'categorys'=> $categorys
        ]);
    }
    
   


    









    
}
