<?php

/* We use Phinx (from Cake Php) for connection db migrations */
return [
    'paths' => [
        'migrations' => database_path('migrations')
    ],
    'migration_base_class' => \App\Database\Migration::class,
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_database' => env('DB_DATABASE', 'homestead'),
        'homestead' => [
            'adapter' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'name' => env('DB_DATABASE', 'slim'),
            'user' => env('DB_USERNAME', 'homestead'),
            'pass' => env('DB_PASSWORD', 'secret'),
            'port' => env('DB_PORT', '3306'),
        ]
    ]
];
