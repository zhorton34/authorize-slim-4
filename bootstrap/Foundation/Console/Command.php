<?php

namespace Boot\Foundation\Console;

use Boot\Foundation\App;
use App\Support\Console\Arg;
use App\Support\Console\Input;
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
        return data_get(
            Command::$definitions,
            Command::app()->resolve('namespace')
        );
    }

    public static function define($namespace, array $arguments = [])
    {
        Command::$definitions[$namespace] = Input::definition([
            Arg::make($namespace)->require(),
            ...$arguments
        ]);

        return new static;
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
