<?php

use Slim\App;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

return function (App $app) {
    $app->get('/home', function (Request $request, Response $response, $parameters) {
        $name = 'Clean Code Studio';

        return view($response, 'auth.home', compact('name'));
    });

    $app->get('/', function (Request $request, Response $response, $parameters) {
        $response->getBody()->write('Hello World!');

        return $response;
    });
};
