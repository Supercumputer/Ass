<?php

namespace Myasus\Assigment\Controllers\Client;

use Myasus\Assigment\Commons\Controller;
use Myasus\Assigment\Models\User;

class AboutController extends Controller
{
    private User $user;
    public function __construct()
    {
        $this->user=new User();
    }
    public function index()
    {

        $this->renderViewClient('about', []);
    }
}