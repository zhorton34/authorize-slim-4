<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Support\View;
use App\Http\Requests\LoginUserRequest;

class LoginController
{
    public function show(View $view)
    {
        return $view('auth.login');
    }

    public function store(LoginUserRequest $input)
    {
        if ($input->failed()) return back();

        $fails = !Auth::attempt($input->email, sha1($input->password));

        if ($fails) {
            session()->flash()->set('errors', ['Log in failed']);

            return back();
        }

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
