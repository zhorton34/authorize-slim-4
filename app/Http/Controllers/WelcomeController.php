<?php

namespace App\Http\Controllers;

use App\Support\View;

class WelcomeController
{
    public function index(View $view)
    {
        $name = 'Clean Code Studio';

        return $view('auth.home', compact('name'));
    }

    public function show(View $view, $name, $id)
    {
        return $view('user.show', compact('name', 'id'));
    }
}
