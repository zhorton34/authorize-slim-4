<?php

namespace App\Http\Controllers;

use App\User;
use App\Support\View;

class WelcomeController
{
    public function index(View $view, User $user)
    {
        $user = $user->find(1);
        $name = 'Clean Code Studio';

        return $view('auth.home', compact('name', 'user'));
    }

    public function show(View $view, $name, $id)
    {
        return $view('user.show', compact('name', 'id'));
    }
}
