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
        $form = $input->all();

        $rules = [
            'email' => 'required|email',
            'will_fail' => 'required|email',
            'password' => 'required|string'
        ];

        /** Override Validation Rule Messages Defined in languages/en/validation.php
         * $messages = [
         *    'will_fail.required' => ':attribute Whoops ~ its required',
         *    'will_fail.email' => ':attribute whoops ~ must be an email'
         * ];
        **/

        $validator = validator(
            $form,
            $rules,
            // $messages
        );

        if ($validator->fails()) {
            dd($validator->errors());
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
