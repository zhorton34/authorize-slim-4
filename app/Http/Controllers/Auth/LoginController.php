<?php

namespace App\Http\Controllers\Auth;

use App\Support\Auth;
use App\Support\View;
use App\Events\UserLogin;
use App\Events\UserLogout;
use App\Http\Requests\StoreLoginRequest;

class LoginController
{
    public function form(View $view)
    {
        return $view('auth.login');
    }

    public function login(StoreLoginRequest $input)
    {
        if ($input->failed()) return back();

        $successful = Auth::attempt($input->email, $input->password);

        if ($successful) {
            event()->fire(UserLogin::class);

            return redirect('/home');
        }

        return back();
    }

    public function logout()
    {
        Auth::logout();

        if (Auth::guest()) {
            event()->fire(UserLogout::class);

            return redirect('/login');
        }
    }
}
