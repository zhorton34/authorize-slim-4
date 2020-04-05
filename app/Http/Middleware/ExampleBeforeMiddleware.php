<?php


namespace App\Http\Middleware;

use Slim\Psr7\Response;
use Psr\Http\Server\RequestHandlerInterface as Handle;
use Psr\Http\Message\ServerRequestInterface as Request;

class ExampleBeforeMiddleware
{
    public function __invoke(Request $request, Handle $handler) : Response
    {
        $response = $handler->handle($request);
        $content = (string) $response->getBody();

        $response = new Response;
        $response->getBody()->write("Before: {$content} ");

        return $response;
    }
}
