<?php

namespace Boot\Foundation\Console;

use Symfony\Component\Console\Input\InputArgument as Arg;

class Command extends Console
{
    protected $name = 'command:add-signature';
    protected $help = 'Add command help information';
    protected $description = 'Add command description information';

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

    protected function configure()
    {
        $this->setName($this->name)->setHelp($this->help)->setDescription($this->description);

        collect($this->arguments())->each(
            fn ($options, $name) => $this->addArgument($name, ...$options)
        );
    }

    public function handler()
    {
        // Handle Command
    }

}
