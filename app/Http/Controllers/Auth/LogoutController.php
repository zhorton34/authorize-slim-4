<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Support\Redirect;

class LogoutController
{
    public function index(Redirect $to)
    {
        Auth::logout();

        return $to('/login');
    }
}
