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
        $rules = [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'unique:users,email',
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'string|required'
        ];

        $validator = validator($input->all(), $rules, [
            'password.min' => ':attribute must be at least :min characters',
            'password.same' => ':attribute does not match :same field',
        ]);

        if ($validator->fails()) {
            session()->flash()->set('errors', Arr::collapse(array_values(
                $validator->errors()->getMessages()
            )));

            return back();
        }

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
