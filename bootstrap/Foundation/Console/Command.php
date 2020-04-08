<?php

namespace Boot\Foundation\Console;

use Boot\Foundation\App;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Input\InputDefinition;

class Command
{
    public static $app;
    public static $definitions;

    public function __call($method, $arguments)
    {
        return self::$method(...$arguments);
    }

    public static function app() : App
    {
        return Command::$app;
    }

    public static function setup(App &$app)
    {
        Command::$app = $app;
    }

    public static function bindDefinition() : InputDefinition
    {
        $namespace = Command::app()->resolve('namespace');

        return data_get(Command::$definitions, $namespace);
    }

    public static function shell($command)
    {
        return shell_exec($command);
    }

    public static function input() : ArgvInput
    {
        return Command::app()->resolve(ArgvInput::class);
    }

    public static function console() : ConsoleOutput
    {
        return Command::app()->resolve(ConsoleOutput::class);
    }
}
