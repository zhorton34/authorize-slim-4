<?php

namespace Boot\Foundation\Bootstrappers;

use Slim\Csrf\Guard;
use Slim\Psr7\Factory\ResponseFactory;

class LoadCsrf extends Bootstrapper
{
    public function boot()
    {
        $this->app->bind('csrf', fn (ResponseFactory $factory) => new Guard($factory));
    }
}
