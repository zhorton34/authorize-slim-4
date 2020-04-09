<?php

use DI\Container;
use App\Http\HttpKernel;
use Boot\Foundation\AppFactoryBridge as App;

$app = App::create(new Container);

$http_kernel = new HttpKernel;
$console_kernel = new ConsoleKernel;

$app->bind(HttpKernel::class, $http_kernel);
$app->bind(ConsoleKernel::class, $console_kernel);

return $app;
