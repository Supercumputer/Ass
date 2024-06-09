<?php

namespace Myasus\Assigment\Controllers\Client;

use Myasus\Assigment\Commons\Controller;

class HomeController extends Controller{
    public function index(){
        $this->renderViewClient('home', []);
    }

}
