<?php

namespace Myasus\Assigment\Controllers\Admin;

use Myasus\Assigment\Commons\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $this->renderViewAdmin('dashboard', []);
    }
}
