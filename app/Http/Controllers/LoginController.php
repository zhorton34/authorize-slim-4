<?php

namespace App\Http\Controllers;

use Auth;
use App\Support\View;
use App\Support\RequestInput;
use Illuminate\Support\Arr;

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
            'email.required' => ':attribute Whoops field should be an email address',
            'password.required' => ':attribute Whoops field is required'
        ]);

        if ($validator->fails()) {
            $messages = Arr::collapse(
                array_values(
                    $validator->errors()->getMessages()
                )
            );
            session()->flash()->set('errors', $messages);
            session()->flash()->set('old', $input->all());

            return back();
        }

        $successful = Auth::attempt($input->email, sha1($input->password));

        if (!$successful) {
            session()->flash('errors', "Unsuccessful Login attempt");
            session()->flash()->set('old', $input->all());

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
