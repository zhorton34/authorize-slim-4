<?php


namespace App\Console\Commands;


abstract class HandleCommand
{
    public $namespace;
    public $arguments;
    public $description;

    public function __construct()
    {
        $this->arguments = $this->arguments();
    }

    abstract public function arguments();
}
