<?php

namespace App\Console\Commands;

abstract class HandleCommand
{
    public $namespace;
    public $description;

    public function arguments()
    {
        return [
            // add arguments
        ];
    }
}
