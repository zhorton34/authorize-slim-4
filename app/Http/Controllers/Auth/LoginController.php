<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Support\View;
use Illuminate\Support\Arr;
use App\Support\RequestInput;

class LoginController
{
    public function show(View $view)
    {
        return $view('auth.login');
    }

    public function store(RequestInput $input)
    {
        $validator = session()->validator($input->all(), [
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        if ($validator->fails()) return back();

        if (!Auth::attempt($input->email, sha1($input->password))) {
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
