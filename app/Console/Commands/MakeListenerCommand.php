<?php

namespace App\Console\Commands;

class MakeListenerCommand extends MakeScaffoldCommand
{
    protected $name = 'make:listener';
    protected $help = 'Make listener class to handle event payload';
    protected $description = 'Make listener class handle event payload';

    protected function arguments()
    {
        return [
            'name' => $this->require('Listener Class Name'),
        ];
    }
}
