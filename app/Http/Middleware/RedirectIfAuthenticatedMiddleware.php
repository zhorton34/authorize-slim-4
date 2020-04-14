<?php

namespace App\Http\Middleware;

use Auth;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as Handle;

class RedirectIfAuthenticatedMiddleware
{
    public function __invoke(Request $request, Handle $handler)
    {
        if (Auth::check()) {
            return redirect('/home');
        }

        return $handler->handle($request);
    }
}
