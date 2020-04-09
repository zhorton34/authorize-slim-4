<?php


namespace App\Console\Commands;


use Illuminate\Support\Str;
use Symfony\Component\Console\Helper\Table;

class DatabaseTableDisplay extends Command
{
    protected $name = 'db:show';
    protected $help = 'Show pretty display of db table';
    protected $description = 'Show Beautified Display Of Database Table';

    protected function arguments()
    {
        return [
            'model' => $this->require('Model or table that all records will be displayed for')
        ];
    }

    public function handler()
    {
        $table = new Table($this->output);
        $model = $this->input->getArgument('model');
        $model = "\\App\\" . Str::of($model)->studly()->singular();

        if ($model::count() < 1) {
            return "{$model} Table is empty";
        }

        $rows = $model::get()->toArray();

        [$first] = $rows;
        $headers = array_keys($first);
        $table->setHeaders($headers)->setRows($rows);

        $table->render();
    }
}
