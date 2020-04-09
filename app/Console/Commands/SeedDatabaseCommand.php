<?php

namespace App\Console\Commands;

class SeedDatabaseCommand extends Command
{
    protected $name = 'db:seed';
    protected $help = 'Seed Database Tables';
    protected $description = 'Seed Database Tables';

    protected function arguments()
    {
        return [
        ];
    }

    public function handler()
    {
        shell_exec("./vendor/bin/phinx seed:run");

        $this->info("Successful (If this message is the only message, Error Would Show Above)");
    }
}
