<?php

use App\Support\Console\Console;

Console::command('make:test {name} {config}',
    fn () => $this->output->write($this->input->getArgument('name'))
)
->setDescription('Make Test Scaffold File');

