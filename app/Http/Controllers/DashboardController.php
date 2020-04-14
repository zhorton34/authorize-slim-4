<?php

namespace App\Http\Controllers;

use App\User;
use App\Support\View;
use Boot\Foundation\Authentication\Auth;

class DashboardController
{
    public function home(View $view)
    {
        $user = Auth::user();

        return $view('dashboard.home', compact('user'));
    }
}
