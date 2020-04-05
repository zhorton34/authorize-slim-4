<?php

namespace App\Providers;

use App\Support\View;
use Slim\Psr7\Factory\ResponseFactory;

class BladeServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->getContainer()->set(View::class, function () {
            return new View(new ResponseFactory);
        });
    }

    public function boot()
    {

    }
}
