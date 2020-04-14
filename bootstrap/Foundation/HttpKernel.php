<?php


namespace Boot\Foundation;


use Slim\Csrf\Guard;

class HttpKernel extends Kernel
{
    /**
     * Global Middleware
     *
     * @var array
     */
    public array $middleware = [];

    /**
     * Route Group Middleware
     */
    public array $middlewareGroups = [
        'api' => [],
        'web' => []
    ];

    public array $bootstrappers = [
        Bootstrappers\LoadEnvironmentDetector::class,
        Bootstrappers\LoadEnvironmentVariables::class,
        Bootstrappers\LoadDebuggingPage::class,
        Bootstrappers\LoadAliases::class,
        Bootstrappers\LoadCsrfVerification::class,
        Bootstrappers\LoadHttpMiddleware::class,
        Bootstrappers\LoadBladeTemplates::class,
        Bootstrappers\LoadServiceProviders::class,
    ];
}
