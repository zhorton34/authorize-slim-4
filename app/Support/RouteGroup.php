<?php

namespace App\Support;

use Slim\Routing\RouteCollectorProxy;

class RouteGroup
{
    public $app;
    public $prefix;
    public $routes;
    public array $middleware = [];

    public function __construct(&$app)
    {
        $this->app = $app;
    }

    public function prefix(string $prefix)
    {
        $this->prefix = $prefix;

        return $this;
    }

    public function routes($path = '')
    {
        $this->routes = $path;

        return $this;
    }

    public function middleware(array $middleware)
    {
        $this->middleware = $middleware;

        return $this;
    }

    public function register()
    {
        $group = $this->app->group($this->prefix, function (RouteCollectorProxy $group) {
           $app = Route::setup($group);

           require $this->routes;
        });

        collect($this->middleware)->each(fn ($guard) => $group->add(
            $this->app->resolve($guard)
        ));

        Route::setup($this->app);
    }
}
