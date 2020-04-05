<?php

namespace App\Http\Controllers;

use App\User;

class ApiController
{
    public function index($response)
    {
        $response->getBody()->write(json_encode([
            'hello' => 'world'
        ], JSON_PRETTY_PRINT));

        return $response;
    }
}
