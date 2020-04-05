<?php

use DI\Container;
use App\Http\HttpKernel;
use App\Providers\ServiceProvider;
use DI\Bridge\Slim\Bridge as SlimAppFactory;

$app = SlimAppFactory::create(new Container);

$kernel = new HttpKernel($app);
$kernel->bootstrapApplication();

ServiceProvider::setup($app, config('app.providers'));

return $app;
