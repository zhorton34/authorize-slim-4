<?php

namespace App\Http\Controllers;

use App\Support\View;
use App\User;
use Illuminate\Support\Str;

class WelcomeController
{
    public function index(View $view, User $user)
    {
        $user = $user::find(1);

        $name = Str::of("{$user->first_name} {$user->last_name}")
            ->plural()
            ->replaceLast("s", "'s")
            ->title();

        return $view('auth.home', compact('name', 'user'));
    }

    public function show(View $view, $name, $id, User $user)
    {
        $user = $user->find(1);

        return $view('user.show', compact('name', 'id', 'user'));
    }
}
