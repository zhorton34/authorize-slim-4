<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use App\Support\View;
use App\Http\Requests\StoreRegisterRequest;

class RegisterController
{
    public function show(View $view)
    {
        return $view('auth.register');
    }

    public function store(StoreRegisterRequest $input)
    {
        if ($input->failed()) return back();

        $user = User::forceCreate($input->all());

        $fails = !Auth::attempt($user->email, $user->password);

        if ($fails) return back();

        return redirect('/home');
    }
}
