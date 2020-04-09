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

    protected $handler = false;
    protected static $app;
    protected static $console;
    protected static $commands;
    protected InputInterface $input;
    protected OutputInterface $output;

    public static function setup(&$app, &$console)
    {
        static::$app = $app;
        static::$console = $console;
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

        // 'show:example {name} {config_path}'

        $input = explode(" ", $signature);

        [$name] = $input;
        $command->setName($name);

        // ['show:example, 'name', 'config_path'] = ['name', 'config_path']
        array_shift($input);

        // {name} = name
        $name = fn ($arg) => Str::of($arg)->between('{', '}');

        $add_argument = fn ($arg) => $command->addArgument($name($arg), InputArgument::REQUIRED);

        collect($input)->each($add_argument);

        static::$commands[] = &$command;

        return $command;
    }

    public function __call($method, $parameters)
    {
        throw_when($method != 'handler', "Method {$method} does not exist");

        call_user_func($this->handler, $parameters);
    }

    public function setHandler(\Closure $handler)
    {
        $this->handler = $handler->bindTo($this, $this);

        return $this;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->input = $input;
        $this->output = $output;

        throw_when(!is_callable($this->handler) and !method_exists($this, 'handler'), "No Command Handler Defined");

        $this->handler();

        return 0;
    }
}
