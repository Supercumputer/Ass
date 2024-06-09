<?php

namespace Myasus\Assigment\Controllers\Client;

use Myasus\Assigment\Commons\Controller;
class ContactController extends Controller
{
    public function index()
    {

        $this->renderViewClient('contact', []);
    }
}