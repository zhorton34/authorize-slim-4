<?php

namespace App\Domain\Repository;

use Illuminate\Database\Connection;

class BaseRepository
{
    protected $connection;
    protected string $table;

    public function __construct(Connection $connection)
    {
        $no_table_is_defined = is_null($this->table);

        throw_when($no_table_is_defined, 'Repositories Classes must define a table');

        $this->connection = $connection->table($this->table);
    }

    public function getTable()
    {
        return $this->table;
    }
}
