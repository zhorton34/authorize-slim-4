<?php

namespace App\Console\Commands;

class MakeMigrationCommand extends Command
{
    protected $name = 'make:migration';
    protected $help = 'Try to use ./vendor/bin/phinx instead';
    protected $description = 'Make or scaffolded new migration for our database';

    protected function arguments()
    {
        return [
            'name' => $this->require('Add A Migration Name')
        ];
    }

    public function handler()
    {
        $name = $this->input->getArgument('name');
        $command = "./vendor/bin/phinx create {$name}";

        shell_exec($command);

        $this->info("Successful if no error thrown above");
    }
}
