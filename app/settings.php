<?php

use Jenssegers\Blade\Blade;
use Psr\Container\ContainerInterface;

return function (ContainerInterface $container) {
    $container->set('view', function($template, $with) {
        $cache_path = __DIR__ . '/../cache';
        $view_path = __DIR__ . '/../resources/views';

        return (new Blade($view_path, $cache_path))->make($template, $with)->render();
    });

    $container->set('settings', function () {
        return [
            'displayErrorDetails' => true,
            'logErrorDetails' => true,
            'logErrors' => true,
        ];
    });
};
