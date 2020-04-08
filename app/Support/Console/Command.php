<?php

namespace App\Support\Console;


use Boot\Foundation\Console\Command as SlimCommand;
use Symfony\Component\Console\Input\ArgvInput;

class Command extends SlimCommand
{
    public $namespace;

    public function __construct($namespace = false)
    {
        $this->namespace = $namespace;
    }

    public static function define($namespace, array $arguments = [])
    {
        Command::$definitions[$namespace] = Input::definition([
            Arg::make('namespace', $namespace),
            ...$arguments
        ]);

        return new static($namespace);
    }

    public static function arg($index)
    {
        return data_get(Command::app()->resolve('arguments'), $index);
    }

    public function run($action)
    {
        $namespace = Command::app()->resolve('namespace');

        if ($namespace == $this->namespace) {
            Command::app()->getContainer()->set($namespace, $action);
        }
    }

    public static function execute()
    {
        $namespace = Command::app()->resolve('namespace');
        $action = Command::app()->resolve($namespace);

        $arguments = Command::input()->getArguments();

        Command::app()->call($action, $arguments);
    }
}
