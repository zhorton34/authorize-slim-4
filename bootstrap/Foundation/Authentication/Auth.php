<?php

namespace Boot\Foundation\Authentication;

use App\User;

class Auth
{
    public static function attempt($email, $password)
    {
        $user = User::where('email', $email);

        if (!$user->exists()) {
            return false;
        }

        $user = $user->first();

        if ($password === $user->password) {
            $_SESSION['user'] = [
                'id' => $user->id,
                'email' => $user->email,
                'password' => $user->password
            ];

            return true;
        }
    }

    public static function logout()
    {
        $_SESSION['user'] = [
            'id' => null,
            'email' => null,
            'password' => null,
        ];

        return Auth::guest();
    }

    public static function user()
    {
        $query = User::where($_SESSION['user']);

        return $query->exists() ? $query->first() : false;
    }

    public static function check()
    {
        return (bool) self::user();
    }

    public static function guest()
    {
        return !self::check();
    }
}
