<?php

namespace App\Providers;

use App\Support\View;
use Slim\Psr7\Factory\ResponseFactory;

class BladeServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ResponseFactory::class, fn () => new ResponseFactory);

        $this->app->bind(View::class, fn (ResponseFactory $response) => new View($response));
    }

    public function boot()
    {

    }
}
