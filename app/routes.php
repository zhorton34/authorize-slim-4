<?php

use App\Support\Route;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

Route::get('/', function (Request $request, Response $response, $parameters = []) {
    $response->getBody()->write('Hello world');

    return $response;
});

Route::get('/home', 'HomeController@index');

