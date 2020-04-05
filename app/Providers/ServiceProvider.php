<?php


namespace App\Providers;

use Psr\Container\ContainerInterface;
use Slim\App;

abstract class ServiceProvider
{
    public App $app;
    public $bindings = [];
    public ContainerInterface $container;

    final public function __construct(App &$app)
    {
        $this->app = $app;
        $this->container = $app->getContainer();

        array_walk($this->bindings, fn ($binding) => $this->bind($binding, fn () => new $binding));
    }

    abstract public function register();
    abstract public function boot();

    public function resolve($key)
    {
        return $this->container->get($key);
    }

    public function bind($key, callable $resolve)
    {
        $this->container->set($key, $resolve);
    }

    final public static function setup(App &$app, array $providers)
    {
        $providers = array_map(fn ($provider) => new $provider($app), $providers);

        array_walk($providers, fn (ServiceProvider $provider) => $provider->register());
        array_walk($providers, fn (ServiceProvider $provider) => $provider->boot());
    }
}
