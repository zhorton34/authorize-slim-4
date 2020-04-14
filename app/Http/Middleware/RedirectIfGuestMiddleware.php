<?php


namespace App\Http\Middleware;

use Auth;
use Psr\Http\Server\RequestHandlerInterface as Handle;
use Psr\Http\Message\ServerRequestInterface as Request;

class RedirectIfGuestMiddleware
{
    public function __invoke(Request $request, Handle $handler)
    {
        if (Auth::guest()) {
            return redirect('/login');
        }

        return $handler->handle($request);
    }
}
