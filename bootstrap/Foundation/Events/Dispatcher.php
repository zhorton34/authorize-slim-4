<?php

namespace Boot\Foundation\Events;

class Dispatcher
{
    protected $app;
    protected $register;

    public function __construct($app)
    {
        $this->app = $app;
        $this->register = config('events.events');

        $this->register();
    }


    protected function register()
    {
        array_walk($this->register, fn ($listeners, $event) => $this->listen($event, $listeners));
    }

    public function listen(string $event, $listeners = null)
    {
        if (class_exists($event) and !$this->app->has($event)) {
            $this->app->bind($event, \Closure::fromCallable(new $event));

            return $this;
        }

        if (is_array($listeners)) {
            $this->register[$event] = $listeners;

            return $this;
        }

        if (is_string($event) and is_callable($listeners)) {
            $this->register[$event][] = \Closure::fromCallable($listeners);

            return $this;
        }
    }

    public function forget($event)
    {
        unset($this->register[$event]);

        return isset($this->register[$event]);
    }

    public function fire($event, $payload = null)
    {
        throw_when(
            !array_key_exists($event, $this->register),
            "Event {$event} Not Registered"
        );

        $listeners = $this->register[$event];

        if (class_exists($event) and app()->has($event)) {
            $event = is_array($payload)
                ? $this->app->make($event, $payload)
                : $this->app->resolve($event);


            collect($listeners)->each(fn ($listener) => (new $listener)($event));

            return $this;
        }



        collect($listeners)->each(fn ($listener) =>
            is_array($payload)
                ? $listener(...$payload)
                : app()->call($listener)
        );

        return $this;
    }
}
