<?php

namespace Boot\Foundation;

use Slim\App as SlimApp;

class App extends SlimApp
{
    public function bootedViaConsole()
    {
        return $this->has('bootedViaConsole')
            ? $this->resolve('bootedViaConsole')
            : false;
    }

    public function bootedViaHttpRequest()
    {
        return $this->has('bootedViaHttp')
            ? $this->resolve('bootedViaHttp')
            : false;
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
