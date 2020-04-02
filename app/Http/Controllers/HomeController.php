<?php

namespace App\Http\Controllers;

use App\Support\View;

class HomeController
{
    public function index(View $view, $name)
    {
        return $view('auth.home', compact('name'));
    }
}
