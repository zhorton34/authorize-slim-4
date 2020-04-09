<?php

namespace App\Console\Commands;

class MakeMigration extends Command
{
    protected $name = 'make:migration';
    protected $help = 'Make a migration scaffold';
    protected $description = 'Generate a database migration scaffold';

    protected function arguments()
    {
        return [
            'name' => $this->require('Generated Migration File Name'),
            'config' => $this->optional('Path used for migration file generation', '-c ' . config_path('migrations.php'))
        ];
    }

    public function handler()
    {
        $this->output->write('Hello World');
    }
}
