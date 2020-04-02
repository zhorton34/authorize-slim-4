<?php

namespace App\Http\Controllers;

use App\Support\View;

class WelcomeController
{
    public function index(View $view)
    {
        return $view('auth.home', ['name' => 'zak']);
    }
}
