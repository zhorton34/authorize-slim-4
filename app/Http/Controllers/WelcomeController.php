<?php

namespace App\Http\Controllers;

class WelcomeController
{
    public function index($response)
    {
        $response->getBody()->write('Welcome Controller Worked!');

        return $response;
    }

    public function show($response, $name, $id)
    {
        $response->getBody()->write("Welcome {$name} you have an id of {$id}");

        return $response;
    }
}
