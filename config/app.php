<?php

return [
    'name' => env('APP_NAME', 'Slim 4 Auth App'),
    'providers' => [
        \App\Providers\DatabaseServiceProvider::class,
        \App\Providers\ConsoleServiceProvider::class,
        \App\Providers\BladeServiceProvider::class,
    ],
    'aliases' => [
        'Route' => \App\Support\Route::class,
        'DB' => \Illuminate\Database\Capsule\Manager::class,
    ]
];
