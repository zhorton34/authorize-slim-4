<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Support\View;
use App\Support\RequestInput;
use Illuminate\Support\Arr;

class RegisterController
{
    public function show(View $view)
    {
        return $view('auth.register');
    }

    public function store(RequestInput $input)
    {
        $validator = session()->validator($input->all(), [
            'email' => 'unique:users,email|email|required',
            'password' => 'required_with:confirm_password|same:confirm_password|min:5',
            'confirm_password' => 'string|required'
        ], [
            'password.same' => ':attribute does not match :same',
            'password.required_with' => ':attribute needs :required_with to properly validate',
            'email.unique' => ':attribute already exists',
            'email.email' => ':attribute must be an email',
            'email.required' => ':attribute is required',
            'confirm_password.required' => ':attribute is required',
            'confirm_password.string' => ':attribute must be a string'
        ]);

        if ($validator->fails()) return back();

        $input->forget('csrf_value');
        $input->forget('csrf_name');
        $input->forget('confirm_password');

        $input->password = sha1($input->password);
        $user = User::forceCreate($input->all());

        return \Auth::attempt($user->email, $user->password)
            ? redirect('/home')
            : back();
    }
}
