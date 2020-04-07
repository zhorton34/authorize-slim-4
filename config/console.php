<?php

/*
 * Symfony Output Interface With Constants We Can use to set Console Formatting Configuration
 */

use Symfony\Component\Console\Output\Output;

return [
    'output' => [
        /**
         * Verbosity (Int)
         * ~~~~~~~~~~~~~~~~~~
         * Output::VERBOSITY_QUIET
         * Output::VERBOSITY_NORMAL
         * Output::VERBOSITY_VERBOSE
         * Output::VERBOSITY_VERY_VERBOSE
         * Output::VERBOSITY_DEBUG
         */
        'verbosity' => Output::VERBOSITY_VERY_VERBOSE,

        /**
         * Output Decorated (Bool)
         * ~~~~~~~~~~~~~~~~~~~~~~~
         */
        'decorated' => false,

        /**
         * Formatter (OutputFormatterInterface Implementation)
         * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
         * \Symfony\Component\Console\Formatter\OutputFormatterInterface $formatter = null
         */
        'formatter' => null,
    ],
    'commands' => [
        'namespace' => '\\App\\Console\\Commands\\'
    ]
];
