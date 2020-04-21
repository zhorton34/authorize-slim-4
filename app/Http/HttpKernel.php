<?php

namespace App\Http;

use Boot\Foundation\HttpKernel as Kernel;

class HttpKernel extends Kernel
{
    /**
     * Injectable Request Input Form Request Validators
     * @var array
     */
    public array $requests = [
        Requests\StoreLoginRequest::class,
        Requests\StoreRegisterRequest::class,
        Requests\StoreResetPasswordRequest::class,
        Requests\UpdateResetPasswordRequest::class,
    ];

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
        'web' => [
            Middleware\RouteContextMiddleware::class,
            'csrf'
        ]
    ];
}
