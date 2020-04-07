<?php

namespace App\Http\Middleware;

use Slim\Psr7\Response;
use Psr\Http\Server\RequestHandlerInterface as Handle;
use Psr\Http\Message\ServerRequestInterface as Request;

class ApiResponseMiddleware
{
    public function __invoke(Request $request, Handle $handler) : Response
    {
        $response = $handler->handle($request);
        $payload = json_encode($response->getBody());

        $response = new Response;
        $response->getBody()->write($payload,);
        $response->withHeader('Content-Type', 'application/json');

        return $response;
    }
}
