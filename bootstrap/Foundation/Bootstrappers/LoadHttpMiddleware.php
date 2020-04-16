<?php

namespace Boot\Foundation\Bootstrappers;

use Boot\Foundation\Kernel;

class LoadHttpMiddleware extends Bootstrapper
{
    public function boot()
    {
        $kernel = $this->app->resolve(Kernel::class);

        $middleware = [
            ...$kernel->middleware,
            ...$kernel->middlewareGroups['api'],
            ...$kernel->middlewareGroups['web']
        ];

        collect($middleware)
            ->filter(fn ($guard) => class_exists($guard))
            ->each(fn ($guard) => $this->app->bind($guard, new $guard));

        $this->app->bind('middleware', fn () => [
           'global' => $kernel->middleware,
            'api' => $kernel->middlewareGroups['api'],
            'web' => $kernel->middlewareGroups['web']
        ]);
    }
}
