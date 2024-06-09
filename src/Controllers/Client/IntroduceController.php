<?php

namespace Myasus\Assigment\Controllers\Client;

use Myasus\Assigment\Commons\Controller;
class IntroduceController extends Controller
{
    public function index()
    {

        $this->renderViewClient('introduce', []);
    }
}