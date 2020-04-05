<?php

namespace App\Http;

use Boot\Foundation\HttpKernel as Kernel;

class HttpKernel extends Kernel
{
    /**
     * Global Middleware Executed on each &
     * and every request into the application.
     *
     * @var array
     */
    public array $middleware = [];

    /**
     * Middleware Used On a Specific Route Group
     * (See App\Providers\RouteServiceProvider.php)
     *
     * @var array
     */
    public array $middlewareGroups = [
       // middleware applied only on web routes
       'web' => [],
       // middleware applied only on api routes
       'api' => []
    ];

    public function bootstrapApplication()
    {
        parent::bootstrapApplication();
        $this->app->getContainer()->set('middleware', [
            'web' => $this->middlewareGroups['web'],
            'api' => $this->middlewareGroups['api'],
            'global' => $this->middleware,
        ]);
    }
}
