<?php

return [
    'name' => env('APP_NAME', 'Slim 4 Auth App'),
    'providers' => [
        \App\Providers\DatabaseServiceProvider::class,
        \App\Providers\BladeServiceProvider::class
    ],
    'aliases' => [
        'DB' => \Illuminate\Database\Capsule\Manager::class,
        'Auth' => \Boot\Foundation\Authentication\Auth::class,
    ]
];
