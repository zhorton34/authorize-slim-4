<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Symfony\Component\Console\Helper\Table;

class DatabaseTableDisplayCommand extends Command
{
    protected $name = 'db:show';
    protected $help = 'Check your db connection to see if the table exists';
    protected $description = 'Show all of your models/table records in a table for display';

    protected function arguments()
    {
        return [
            'table' => $this->require('Model or table that we want to display a table for')
        ];
    }

    public function handler()
    {
        $table = new Table($this->output);
        $table_name = $this->input->getArgument('table');
        $model = "\\App\\" . Str::of($table_name)->studly()->singular();

        if ($model::count() < 1) {
            $this->comment("{$model} Table is empty");

            return;
        }

        $rows = $model::get()->toArray();
        [$first_row] = $rows;

        $headers = array_keys($first_row);
        $table->setHeaders($headers)->setRows($rows);

        $table->render();
    }
}
