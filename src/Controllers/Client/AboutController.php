<?php

namespace Myasus\Assigment\Controllers\Client;

use Myasus\Assigment\Commons\Controller;
class AboutController extends Controller
{
    public function index()
    {

        $this->renderViewClient('about', []);
    }
}