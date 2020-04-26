<?php

namespace App\Console\Commands;

class MakeEventCommand extends MakeScaffoldCommand
{
    protected $name = 'make:event';
    protected $help = 'Make event and optionally create associated listener';
    protected $description = 'Make event and optionally create associated listener';

    protected function arguments()
    {
        return [
            'name' => $this->require('Event Class Name'),
        ];
    }
}
