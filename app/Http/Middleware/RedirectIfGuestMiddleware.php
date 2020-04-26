<?php

namespace App\Http\Middleware;

use App\Support\Auth;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as Handle;

class RedirectIfGuestMiddleware
{
    public function __invoke(Request $request, Handle $handler)
    {
        return Auth::guest()
            ? redirect('/login')
            : $handler->handle($request);
    }
}
