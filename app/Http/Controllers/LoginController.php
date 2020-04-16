<?php

namespace App\Http\Controllers;

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
        $validator = validator($input->all(), [
            'email' => 'email|required',
            'password' => 'required',
            'field' => 'required'
        ], [
            'email.email' => 'Whoops Email must be an email',
            'password.required' => 'Password is required',
            'field.required' => 'Field is required'
        ]);

        if ($validator->fails()) {
            $_SESSION['errors'] = json_encode(json_decode($validator->errors()));

            return redirect($input->getCurrentUri());
        }

        $successful = Auth::attempt($input->email, sha1($input->password));

        if (!$successful) {
            dd("Unsuccessful Login Attempt");
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
