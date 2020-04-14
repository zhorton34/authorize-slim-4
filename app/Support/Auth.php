<?php

namespace App\Support;

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

        if ($password !== $user->password) {
            dd("Not the proper password, cant log you in");

            return false;
        }

        $_SESSION['user'] = [
            'id' => $user->id,
            'email' => $user->email,
            'password' => $user->password,
        ];

        return true;
    }

    public static function logout()
    {
        $_SESSION['user'] = [
            'id' => null,
            'email' => null,
            'password' => null
        ];
    }

    public static function user()
    {
        $query = User::where($_SESSION['user']);

        return $query->exists() ? $query->first() : false;
    }

    public static function check() : bool
    {
        return (bool) self::user();
    }

    public static function guest() : bool
    {
        return (bool) !self::check();
    }
}
