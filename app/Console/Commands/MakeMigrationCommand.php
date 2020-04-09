<?php

namespace App\Console\Commands;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class MakeMigrationCommand extends Command
{
    protected $name = 'make:migration';
    protected $help = 'Make a migration scaffold';
    protected $description = 'Generate a database migration scaffold';

    protected function arguments()
    {
        return [
            'name' => $this->require('Generated Migration File Name'),
            'config' => $this->optional('Path used for migration file generation', '--configuration=' . config_path('migrations.php'))
        ];
    }

    public function handler()
    {
        $name = $this->input->getArgument('name');
        $config = $this->input->getArgument('config');

        $command = "./phinx create {$name} {$config}";

        shell_exec($command);
        $this->info("If this is the only message then {$name} Migrations was successfully created");
    }
}
