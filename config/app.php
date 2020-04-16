<?php

return [
    'name' => env('APP_NAME', 'Slim 4 Auth App'),
    'providers' => [
        /* Booted Foundation Service Providers...  */
        \Boot\Foundation\Providers\FileSystemServiceProvider::class,

        /* App Service Providers... */
        \App\Providers\DatabaseServiceProvider::class,
        \App\Providers\BladeServiceProvider::class
    ],
    'aliases' => [
        'Auth' => \App\Support\Auth::class,
        'DB' => \Illuminate\Database\Capsule\Manager::class,
    ]
];
