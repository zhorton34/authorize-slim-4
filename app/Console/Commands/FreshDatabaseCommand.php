<?php

namespace App\Console\Commands;

use DB;

class FreshDatabaseCommand extends Command
{
    protected $name = 'db:fresh';
    protected $description = 'Drop all tables, Then Trigger All Migrations And Seeders';
    protected $help = 'Drop all tables, then trigger all migrations & seeders';

    public function handler()
    {
        $column = 'Tables_in_' . env('DB_DATABASE');

        $tables = DB::select('SHOW TABLES');

        foreach($tables as $table) {
            $droplist[] = $table->$column;
        }

        if (empty($droplist)) {
            $this->info("No Tables In Database To Drop");
        } else {
            $droplist = implode(',', $droplist);

            DB::beginTransaction();
            //turn off referential integrity
            //DB::statement('SET FOREIGN_KEY_CHECKS = 0');
            DB::statement("DROP TABLE $droplist");
            //turn referential integrity back on
            //DB::statement('SET FOREIGN_KEY_CHECKS = 1');
            DB::commit();

            $this->info("Dropped all tables");
        }

        $this->info("====================");
        $this->info("Migrating Tables");
        $this->info("====================");
        shell_exec("./vendor/bin/phinx migrate");
        $this->info("Migrations Complete");

        $this->info('===================');
        $this->info("Seeding Database");
        $this->info("====================");
        shell_exec("./vendor/bin/phinx seed:run");
        $this->info("Seeders Complete");
    }
}
