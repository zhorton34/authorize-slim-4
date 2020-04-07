<?php

namespace Boot\Foundation\Bootstrappers;

class LoadHttpMiddleware extends Bootstrapper
{
    public function boot()
    {
        $kernel = $this->kernel;

        $this->app->bind('middleware', fn () => [
            'api' => data_get($kernel, 'middlewareGroups.api'),
            'web' => data_get($kernel, 'middlewareGroups.web'),
            'global' => data_get($kernel, 'middleware'),
        ]);
    }
}
