<?php

namespace Boot\Foundation\Bootstrappers;

use Slim\Csrf\Guard;
use Slim\Psr7\Factory\ResponseFactory;

class LoadCsrfVerification extends Bootstrapper
{
    public function boot()
    {
        $this->app->bind('csrf', new Guard(
            $this->app->resolve(ResponseFactory::class)
        ));}
}
