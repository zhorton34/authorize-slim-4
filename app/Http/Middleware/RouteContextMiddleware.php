<?php

namespace App\Http\Middleware;

use App\Support\Redirect;
use App\Support\RequestInput;
use Slim\Psr7\Factory\ResponseFactory;
use Slim\Routing\RouteContext;
use Psr\Http\Server\RequestHandlerInterface as Handle;
use Psr\Http\Message\ServerRequestInterface as Request;

class RouteContextMiddleware
{
    public function __invoke(Request $request, Handle $handler)
    {
        $route = RouteContext::fromRequest($request)->getRoute();

        throw_when(empty($route), "Not Found Request");

        app()->bind(Redirect::class, fn (ResponseFactory $factory) => new Redirect($factory));
        app()->bind(RequestInput::class, new RequestInput($request, $route));

        return $handler->handle($request);
    }
}
