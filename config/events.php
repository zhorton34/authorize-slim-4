<?php

/**
 * Generate/Scaffold classes for Events or listeners using
 * `php slim make:event {name}` and `php slim make:listener {name}`
 */
return [

    'events' => [
        // Event::class => [
        //      ListenerOne::class,
        //      ListenerTwo::class,
        //      ListenerThree::class
        //],

        \App\Events\UserLogin::class => [
            \App\Listeners\FlashWelcomeBackMessage::class,
        ],
        \App\Events\UserLogout::class => [
            \App\Listeners\FlashSuccessfullyLoggedOutMessage::class,
        ]
    ],
];
