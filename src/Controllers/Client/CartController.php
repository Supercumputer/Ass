<?php

namespace Myasus\Assigment\Controllers\Client;

use Myasus\Assigment\Commons\Controller;

class CartController extends Controller
{
    public function index()
    {
        $this->renderViewClient('cart', []);
    }
}
