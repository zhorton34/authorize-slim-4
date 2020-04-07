<?php

namespace App\Http\Controllers;

use App\User;
use App\Support\View;

class WelcomeController
{
    public function index(View $view, User $user, $request)
    {
        $user = $user->find(1);
        $users = $user->get();
        $name = 'Clean Code Studio';

        dd($request);
        return $view('auth.home', compact('name', 'users'));
    }

    public function show(View $view, $name, $id)
    {
        return $view('user.show', compact('name', 'id'));
    }
}
