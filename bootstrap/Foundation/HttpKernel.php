<?php

namespace Boot\Foundation;

class HttpKernel extends Kernel
{
    public array $middleware = [];
    public array $middlewareGroups = [
        'web' => [],
        'api' => []
    ];

    public array $bootstrap = [
        Bootstrappers\LoadEnvironmentVariables::class,
        Bootstrappers\LoadHttpMiddleware::class,
        Bootstrappers\LoadServiceProviders::class,
    ];
}
