<?php

namespace App\Console\Commands;

class MakeMigrationCommand extends Command
{
    protected $name = 'make:migration';
    protected $help = 'Make a migration scaffold';
    protected $description = 'Generate a database migration scaffold';

    protected function arguments()
    {
        return [
            'name' => $this->require('Generated Migration File Name')
        ];
    }

    public function handler()
    {
        $name = $this->input->getArgument('name');

        shell_exec("./vendor/bin/phinx create {$name}");

        $this->info("Successful (If this message is the only message, Error Would Show Above)");
    }
}
