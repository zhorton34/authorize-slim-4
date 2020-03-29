<?php

use DI\Container;

require __DIR__ . '/../vendor/autoload.php';

$_SERVER['container'] = new Container;
if (!function_exists('container'))
{
    function container()
    {
        return $_SERVER['container'];
    }
}
$container = container();

$_SERVER['app'] = DI\Bridge\Slim\Bridge::create($container);
if (!function_exists('app'))
{
    function app()
    {
        return $_SERVER['app'];
    }
}
$app = app();

$middleware = require app_path('middleware.php');
$middleware($app);

require app_path('routes.php');

$app->run();
