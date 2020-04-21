<?php

namespace App\Http;

use Boot\Foundation\HttpKernel as Kernel;

class HttpKernel extends Kernel
{
    /*
        * Dependency Injectable Form Request
     */
    public array $requests = [
        Requests\LoginUserRequest::class,
        Requests\RegisterUserRequest::class,
        Requests\ShowResetPasswordRequest::class,
        Requests\UpdateResetPasswordRequest::class,
        Requests\UpdateResetPasswordRequest::class,
    ];

    /**
     * Global Middleware
     *
     * @var array
     */
    public array $middleware = [
//        Middleware\ExampleAfterMiddleware::class,
//        Middleware\ExampleBeforeMiddleware::class
    ];

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
