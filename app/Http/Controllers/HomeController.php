<?php

namespace App\Controllers\Http;

class HomeController
{
    public function index($response)
    {
        $response->getBody()->write('Home Controller');

        return $response;
    }
}
