<?php

namespace Boot\Foundation\Bootstrappers;

use Jenssegers\Blade\Blade;
use Slim\Csrf\Guard;
use Slim\Psr7\Factory\ResponseFactory;

class LoadBladeTemplates extends Bootstrapper
{
    public function boot()
    {
        $this->app->bind('csrf', fn (ResponseFactory $factory) => new Guard($factory));

        $blade = new Blade(config('blade.views'), config('blade.cache'));

        $this->app->bind(Blade::class, $blade);
    }
}
