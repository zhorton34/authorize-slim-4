<?php

namespace App\Http\Controllers;

use App\Team;
use App\User;
use App\Support\View;

class WelcomeController
{
    public function index(View $view, User $user)
    {
        $users = $user->get();
        $name = 'Clean Code Studio';
        $team = $user->latest()->first()->team;

        return $view('auth.home', compact('name', 'users', 'team'));
    }

    public function show(View $view, $name, $id)
    {
        return $view('user.show', compact('name', 'id'));
    }
}
