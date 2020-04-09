<?php

namespace App\Console\Commands;

class MakeSeederCommand extends Command
{
    protected $name = 'make:seeder';
    protected $help = 'Make a Seeder scaffold';
    protected $description = 'Generate a database seeder scaffold';

    protected function arguments()
    {
        return [
            'name' => $this->require('Generated Seeder File Name')
        ];
    }

    public function handler()
    {
        $name = $this->input->getArgument('name');

        shell_exec( "./vendor/bin/phinx seed:create {$name}");

        $this->info("Successful (If this message is the only message, Error Would Show Above)");
    }
}
