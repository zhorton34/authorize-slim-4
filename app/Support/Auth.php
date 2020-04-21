<?php

namespace App\Support;

use App\User;

class Auth
{
    public static function attempt($email, $password)
    {
        $validator = session()->validator(compact('email', 'password'), [
            'email' => 'required|exists:users,email',
            'password' => 'required|exists:users,password'
        ], [
            'email.exists' => 'Email not found',
            'password.exists' => 'Password not found'
        ]);

        if ($validator->fails()) return false;

        $user = User::where('email', $email)->first();

        $id = $user->id;
        $email = $user->email;
        $password = $user->password;
        session()->set('user', compact('id', 'email', 'password'));

        return true;
    }

    public static function logout()
    {
        $id = null;
        $email = null;
        $password = null;

        session()->set('user', compact('id', 'email', 'password'));
    }

    public static function user()
    {
        if (!session()->has('user')) {
            return false;
        }

        $query = User::where(session()->get('user'));

        return $query->exists() ? $query->first() : false;
    }

    public static function check() : bool
    {
        return (bool) self::user();
    }

    public static function guest() : bool
    {
        return (bool) self::user() === false;
    }
}
