<?php

namespace Boot\Foundation\Console;

use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command as SymfonyCommand;

class Console extends SymfonyCommand
{
    use FormatOutput;

    protected InputInterface $input;
    protected OutputInterface $output;
    protected $handler = false;

    protected static $app;
    protected static $console;
    protected static $commands;

    public static function setup(&$app, &$console)
    {
        static::$app = $app;
        static::$console = $console;
        static::$commands = [];
    }

    public static function app()
    {
        return static::$app;
    }

    public static function console()
    {
        return static::$console;
    }

    public static function commands()
    {
        return collect(static::$commands);
    }

    public static function command($signature, \Closure $handler)
    {
        $command = new static;
        $command->setHandler($handler);

        // 'show:example {name} {config_path}' = ['show:example', '{name}', '{config_path'}]
        $input = explode(" ", $signature);

        $command->setName($input[0]);

        // Now we only have arguments ['{name}', '{config_path}']
        array_shift($input);

        // '{name}' => 'name'
        $set_name = fn ($arg) => Str::of($arg)->between('{', '}');

        $add_argument = fn ($arg) => $command->addArgument(
            $set_name($arg),
            InputArgument::REQUIRED
        );

        collect($input)->each($add_argument);

        static::$commands[] = &$command;

        return $command;
    }

    protected function setHandler(\Closure $handler)
    {
        $this->handler = $handler->bindTo($this, $this);

        return $this;
    }

    public function __call($method, $parameters)
    {
        throw_when($method != 'handler', "Method {$method} does not exist");

        call_user_func($this->handler, $parameters);
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->input = $input;
        $this->output = $output;

        throw_when(
            !is_callable($this->handler) and !method_exists($this, 'handler'),
            "No Command Handler Defined"
        );

        $this->handler();

        return 0;
    }
}
