<?php

namespace Boot\Foundation\Bootstrappers;

use Boot\Foundation\Kernel;

class LoadHttpMiddleware extends Bootstrapper
{
    public function boot()
    {
        $kernel = $this->app->resolve(Kernel::class);

        $bind_key_or_instance = fn ($middleware) => class_exists($middleware)
            ? $this->app->bind($middleware, new $middleware)
            : null;

        $all_middleware = [
            ...$kernel->middleware,
            ...$kernel->middlewareGroups['api'],
            ...$kernel->middlewareGroups['web']
        ];

        array_walk($all_middleware, $bind_key_or_instance);

        $this->app->bind('middleware', fn () => [
           'global' => $kernel->middleware,
            'api' => $kernel->middlewareGroups['api'],
            'web' => $kernel->middlewareGroups['web']
        ]);
    }
}
