<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Support\View;
use App\Support\RequestInput;

class RegisterController
{
    public function show(View $view)
    {
        return $view('auth.register');
    }

    public function store(RequestInput $input)
    {
        if ($input->password != $input->confirm_password)
        {
            dd("Password and Confirm Password Do Not Match");
        }

        $input->forget('confirm_password');
        $input->password = sha1($input->password);

        if (User::where('email', $input->email)->exists()) {
            dd("User with {$input->email} already exists");
        }

        $user = User::forceCreate($input->all());

        \Auth::attempt($user->email, $user->password);

        return redirect('/home');
    }
}
