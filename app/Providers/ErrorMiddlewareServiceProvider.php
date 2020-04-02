<?php

namespace App\Providers;

class ErrorMiddlewareServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->addErrorMiddleware(
            config('middleware.error_details.displayErrorDetails'),
            config('middleware.error_details.logErrors'),
            config('middleware.error_details.logErrorDetails')
        );
    }

    public function boot()
    {
        //
    }
}
