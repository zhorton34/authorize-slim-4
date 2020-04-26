<?php

return [
    /* Register Events */
    'events' => [
        \App\Events\UserLogin::class => [
            \App\Listeners\FlashWelcomeBackMessage::class,
        ],
        \App\Events\UserLogout::class => [
            \App\Listeners\FlashSuccessfullyLoggedOutMessage::class,
        ]
    ],
];
