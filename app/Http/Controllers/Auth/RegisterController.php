<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Support\View;
use App\Support\Redirect;
use App\Support\RequestInput;
use Boot\Foundation\Http\Controller;
use Boot\Foundation\Authentication\Auth;

class RegisterController extends Controller
{
    public function show(View $view)
    {
        return $view('auth.register');
    }

    public function store(RequestInput $input)
    {
        $passwords_match = $input('password') == $input('confirm_password');

        if ($passwords_match) {
            $input->forget('confirm_password');

            $input->password = sha1($input->password);
        }

        if (User::where('email', $input->email)->exists()) {
            dd("User with {$input->email} already exists");
        }

        $user = User::forceCreate($input->all());
        Auth::attempt($user->email, $user->password);

        return redirect('/home');
    }
}
