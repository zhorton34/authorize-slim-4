<?php

namespace App\Http\Controllers;

use App\User;

class ApiController
{
    public function index($response, User $user)
    {
        $response->getBody()->write(json_encode($user::get(), JSON_PRETTY_PRINT));

        return $response;
    }
}
