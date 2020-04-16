<?php

namespace App\Providers;

use App\Support\View;
use Jenssegers\Blade\Blade;
use Slim\Psr7\Factory\ResponseFactory;
use Boot\Foundation\Providers\BladeServiceProvider as ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    public function directives($blade)
    {
        // Add custom blade directives
    }

    public function register()
    {
        $this->app->bind(
            View::class,
            fn (Blade $blade, ResponseFactory $factory) => new View($blade, $factory)
        );
    }

    public function boot()
    {

    }
}
