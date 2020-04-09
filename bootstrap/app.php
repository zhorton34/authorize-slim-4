<?php

use DI\Container;
use App\Http\HttpKernel;
use App\Console\ConsoleKernel;
use Boot\Foundation\AppFactoryBridge as App;

$app = App::create(new Container);

$http_kernel = new HttpKernel($app);
$console_kernel = new ConsoleKernel($app);

$app->bind(HttpKernel::class, $http_kernel);
$app->bind(ConsoleKernel::class, $console_kernel);

return $app;
