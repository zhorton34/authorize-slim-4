<?php

use DI\Container;
use App\Http\HttpKernel;
use DI\Bridge\Slim\Bridge as App;
use Boot\Foundation\ConsoleKernel;

$app = App::create(new Container);
$container = $app->getContainer();

$container->set(
    HttpKernel::class,
    fn () => HttpKernel::bootstrap($app)->getApplication()
);
$container->set(
    ConsoleKernel::class,
    fn () => ConsoleKernel::bootstrap($app)->getApplication()
);

return $container->get(ConsoleKernel::class);
