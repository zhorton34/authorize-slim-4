<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Support\View;
use App\Support\Auth;
use App\Http\Requests\StoreRegisterRequest;

class RegisterController
{
    public function form(View $view)
    {
        return $view('auth.register');
    }

    public function register(StoreRegisterRequest $input)
    {
        if ($input->failed()) return back();

        $user = User::forceCreate($input->all());

        $fails = !Auth::attempt($user->email, $user->password);

        if ($fails) return back();

        return redirect('/home');
    }
}
