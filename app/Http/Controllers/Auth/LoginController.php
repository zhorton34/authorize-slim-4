<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Support\View;
use App\Http\Requests\StoreLoginRequest;

class LoginController
{
    public function show(View $view)
    {
        return $view('auth.login');
    }

    public function store(StoreLoginRequest $input)
    {
        if ($input->failed()) return back();

        $fails = !Auth::attempt($input->email, $input->password);

        if ($fails) return back();

        return redirect('/home');
    }

    public function logout()
    {
        Auth::logout();

        if (Auth::guest()) {
            return redirect('/login');
        }
    }
}
