<?php

namespace App\Http\Controllers\Auth;

use App\Support\Redirect;
use Auth;
use App\Support\View;
use App\Support\RequestInput;

class LoginController
{
    public function show(View $view)
    {
        return $view('auth.login');
    }

    public function store(RequestInput $input)
    {
        $successful = Auth::attempt($input->email, sha1($input->password));

        if (!$successful) {
            dd("Login attempt Not Successful");
        }

        return redirect('/home');
    }
}
