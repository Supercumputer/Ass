<?php

namespace Myasus\Assigment\Controllers\Client;

use Myasus\Assigment\Commons\Controller;

class ProductController extends Controller {
    public function index() {
        $this->renderViewClient('product', []);
    }

    public function detail($id) {
        
    }
}