<?php

use App\Support\Console\Console;

Console::command('show:example {name}', function () {
    $this->info('Success!')
        ->error('WHatoh')
        ->comment('Intriguing')
        ->question('How do you mean?');

    $this->output->write($this->input->getArgument('name'));
})->setDescription('Showing Example of Slim Console Commands');
