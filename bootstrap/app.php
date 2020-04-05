<?php

use DI\Container;
use DI\Bridge\Slim\Bridge as SlimAppFactory;
use App\Providers\ServiceProvider;

try {
    $env = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');

    $env->load();
} catch (Dotenv\Exception\InvalidPathException $e) {}

$app = SlimAppFactory::create(new Container);

ServiceProvider::setup($app, config('app.providers'));

return $app;
