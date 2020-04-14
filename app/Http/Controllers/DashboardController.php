<?php

namespace App\Http\Controllers;

use Auth;
use App\Support\View;

class DashboardController
{
    public function home(View $view)
    {
        $user = Auth::user();

        return $view('dashboard.home', compact('user'));
    }
}
