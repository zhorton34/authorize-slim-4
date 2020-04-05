<?php

return [
    'name' => env('APP_NAME', 'Slim Authorization Example'),
    'providers' => [
        \App\Providers\DebugServiceProvider::class,
        \App\Providers\BladeServiceProvider::class,
        \App\Providers\RouteServiceProvider::class,
        \App\Providers\DatabaseServiceProvider::class,
    ]
];
