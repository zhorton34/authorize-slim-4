<?php

namespace Boot\Foundation;

use Symfony\Component\Console\Input\ArgvInput;

class App extends \Slim\App
{
    public function command()
    {
        if (!$this->runningViaConsole()) return;

        $input = $this->resolve(ArgvInput::class);

        echo json_encode($input->getArguments());
    }
    public function runningViaConsole()
    {
        return $this->has('bootedViaConsole') ? $this->make('bootedViaConsole') : false;
    }

    public function runningViaHttpRequest()
    {
        return $this->has('bootedViaHttp') ? $this->make('bootedViaHttp') : false;
    }

    public function call(...$parameters)
    {
        return $this->getContainer()->call(...$parameters);
    }

    public function has(...$parameters)
    {
        return $this->getContainer()->has(...$parameters);
    }

    public function bind(...$parameters)
    {
        return $this->getContainer()->set(...$parameters);
    }

    public function make(...$parameters)
    {
        return $this->getContainer()->make(...$parameters);
    }

    public function resolve(...$parameters)
    {
        return $this->getContainer()->get(...$parameters);
    }
}
