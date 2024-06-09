<?php

namespace Myasus\Assigment\Controllers\Client;

use Myasus\Assigment\Commons\Controller;
class NewsController extends Controller
{
    public function index()
    {

        $this->renderViewClient('news', []);
    }
}