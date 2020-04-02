<?php

namespace App\Providers;

class ErrorMiddlewareServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $this->app->addErrorMiddleware(
            config('logging.middleware.displayErrorDetails'),
            config('logging.middleware.logErrors'),
            config('logging.middleware.logErrorDetails')
        );
    }
}
