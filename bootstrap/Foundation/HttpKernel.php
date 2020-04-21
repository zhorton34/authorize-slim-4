<?php


namespace Boot\Foundation;


class HttpKernel extends Kernel
{
    /*
     * Dependency Injectable Form Request
     */
    public array $requests = [];

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
        Bootstrappers\LoadSession::class,
        Bootstrappers\LoadEnvironmentDetector::class,
        Bootstrappers\LoadEnvironmentVariables::class,
        Bootstrappers\LoadDebuggingPage::class,
        Bootstrappers\LoadAliases::class,
        Bootstrappers\LoadCsrf::class,
        Bootstrappers\LoadHttpMiddleware::class,
        Bootstrappers\LoadBladeTemplates::class,
        Bootstrappers\LoadMailable::class,
        Bootstrappers\LoadServiceProviders::class,
    ];
}
