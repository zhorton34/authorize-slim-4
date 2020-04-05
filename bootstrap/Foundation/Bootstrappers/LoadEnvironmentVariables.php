<?php

namespace Boot\Foundation\Bootstrappers;

use Dotenv\Dotenv;
use Dotenv\Exception\InvalidPathException;

class LoadEnvironmentVariables extends Bootstrapper
{
    public function boot()
    {
        try {
            $env = Dotenv::createImmutable(base_path());

            $env->load();
        } catch (InvalidPathException $e) {}
    }
}
