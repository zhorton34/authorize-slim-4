<?php

return [
    /**
     * Mail Driver
     */
    'driver' => env('MAIL_DRIVER', 'smtp'),

    /**
     * SMTP Host Address
     */
    'host' => env('MAIL_HOST', 'smtp.mailgun.org'),


    /**
     * SMTP Host Port
     */
    'port' => env('MAIL_PORT', 587),

    /**
     * Global "From" Address
     */
    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'from@example.com'),
        'name' => env('MAIL_FROM_NAME', 'From Example')
    ],

    /**
     * Global "To" Address
     */
    'to' => [
        'address' => env('MAIL_TO_ADDRESS', 'to@example.com'),
        'name' => env('MAIL_TO_NAME', 'To Example')
    ],

    /**
     * E-Mail Encryption Protocol
     */
    'encryption' => env('MAIL_ENCRYPTION', 'tols'),

    /**
     * SMTP Server Username & Password
     */
    'username' => env('MAIL_USERNAME'),
    'password' => env('MAIL_PASSWORD'),

    'markdown' => [
        'theme' => 'default',
        'paths' => [
            resources_path('views/vendor/mail')
        ]
    ],

    /**
     * E-Mail Log Channel
     */
    'log_channel' => env('MAIL_LOG_CHANNEL'),
];
