<?php

namespace Boot\Foundation\Bootstrappers;

use Boot\Foundation\Kernel;

class LoadHttpMiddleware extends Bootstrapper
{
    public function boot()
    {
        $kernel = $this->app->getContainer()->get(Kernel::class);

        $this->app->getContainer()->set('middleware', fn () => [
            'global' => $kernel->middleware,
            'api' => $kernel->middlewareGroups['api'],
            'web' => $kernel->middlewareGroups['web']
        ]);
    }
}
