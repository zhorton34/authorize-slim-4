<?php

namespace Boot\Foundation;

class HttpKernel extends Kernel
{
    public array $bootstrap = [
        Bootstrappers\LoadEnvironmentVariables::class
    ];

    public array $middleware = [];
    public array $middlewareGroups = [
        'web' => [],
        'api' => []
    ];
}
