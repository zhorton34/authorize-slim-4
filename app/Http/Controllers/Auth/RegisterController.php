<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use App\Support\View;
use App\Http\Requests\RegisterUserRequest;

class RegisterController
{
    public function show(View $view)
    {
        return $view('auth.register');
    }

    public function store(RegisterUserRequest $input)
    {
        if ($input->failed()) return back();

        $user = User::forceCreate($input->all());

        $successful = Auth::attempt($user->email, $user->password);

        if ($successful) return redirect('/home');

        session()->flash()->set('errors', ['Unsuccessful Registration Attempt']);

        return back();
    }
}
