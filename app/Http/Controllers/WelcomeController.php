<?php

namespace App\Http\Controllers;

use App\Support\View;
use Illuminate\Database\Capsule\Manager as DB;

class WelcomeController
{
    public function index(View $view, DB $db)
    {
        $name = 'Clean Code Studio';
        $user = $db->table('users')->find(1);

        return $view('auth.home', compact('name', 'user'));
    }

    public function show(View $view, $name, $id)
    {
        return $view('user.show', compact('name', 'id'));
    }
}
