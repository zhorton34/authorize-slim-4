<?php

namespace App\Support\Console;

use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command as SymfonyCommand;

class Console extends SymfonyCommand
{
    public static $app;
    public static $console;
    public static $commands;
    protected $handler = false;
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

    public static function command($signature, callable $handler)
    {
        $command = new static;

        $command->setHandler($handler);
        $input = explode(" ", $signature);

        [$name] = $input;
        $command->setName($name);
        array_shift($input);

        $name = fn ($arg) => Str::of($arg)->between('{', '}');
        $add_argument = fn ($arg) => $command->addArgument($name($arg), InputArgument::REQUIRED);

        collect($input)->each($add_argument);

        static::$commands[] = &$command;

        self::console()->add($command);
        return $command;
    }

    public function setHandler(callable $handler)
    {
        $this->handler = $handler->bindTo($this, $this);
    }

    public function __call($method, $parameters)
    {
        throw_when($method != 'handler', "Method {$method} Does Not Exist");

        call_user_func($this->handler, $parameters);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->input = $input;
        $this->output = $output;

        throw_when(
            !method_exists($this, 'handler') and !is_callable($this->handler),
            "Handler not defined on Command"
        );

        $this->handler();

        return 0;
    }
}
