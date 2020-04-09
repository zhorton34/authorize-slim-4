<?php

namespace App\Support\Console;

use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputArgument as Arg;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command as SymfonyCommand;

class Console extends SymfonyCommand
{
    public static $commands;
    protected $name = 'make:command';
    protected $help = 'The make:command allows use to scaffold new command';
    protected $description = 'Command to make or scaffold a Slim Command Class';
    protected $callableHandler = false;
    protected InputInterface $input;
    protected OutputInterface $output;

    public static function command($signature, callable $handler)
    {
        $command = new static;
        $command->setHandler($handler);

        $input = explode(" ", $signature);

        [$name] = $input;
        $command->setName($name);
        array_shift($input);

        $name = fn ($arg) => Str::of($arg)->between('{', '}');
        $add_required_argument = fn ($arg) => $command->addArgument($name($arg), InputArgument::REQUIRED);

        collect($input)->each($add_required_argument);

        static::$commands[] = &$command;

        return $command;
    }

    public function setHandler(callable $handler)
    {
        $this->callableHandler = is_callable($handler) ?
            $handler->bindTo($this, $this)
            : false;
    }

    protected function require($description = '')
    {
        return [Arg::REQUIRED, $description];
    }

    protected function array($description, $default = [])
    {
        return [Arg::IS_ARRAY, $description, $default];
    }

    protected function optional($description, $default = false)
    {
        return $default ? [ARG::OPTIONAL, $description, $default] : [Arg::OPTIONAL, $description, $default];
    }

    protected function arguments()
    {
        return [
            //
        ];
    }

    protected function setup()
    {
        // add custom child configuration
    }

    protected function configure()
    {
        $this->setName($this->name)->setHelp($this->help)->setDescription($this->description);

        collect($this->arguments())->each(
            fn ($options, $name) => $this->addArgument($name, ...$options)
        );

        $this->setup();
    }

    public function handle()
    {
        // Handle Command
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->input = $input;
        $this->output = $output;

        $callable_handler = is_callable($this->callableHandler);

        $callable_handler
            ? call_user_func($this->callableHandler, [])
            : $this->handle();

        return 0;
    }
}
