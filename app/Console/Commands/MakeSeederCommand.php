<?php


namespace App\Console\Commands;


class MakeSeederCommand extends Command
{
    protected $name = 'make:seeder';
    protected $help = 'Make a Seeder Scaffold';
    protected $description = 'Generate a database seeder scaffold';

    protected function arguments()
    {
        return [
            'name' => $this->require('Name of Scaffolded Seeder Class')
        ];
    }

    public function handler()
    {
        $name = $this->input->getArgument('name');
        $command = "./vendor/bin/phinx seed:create {$name}";

        shell_exec($command);
        $this->info("Successful (If no message is displayed above)");
    }
}
