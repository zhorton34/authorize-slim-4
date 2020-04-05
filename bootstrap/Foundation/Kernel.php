<?php

namespace Boot\Foundation;

use Slim\App;
/**
 * Request Kernel (Create Kernel For Different Types Of Entry Points Into Our Application
 */
abstract class Kernel
{
    public App $app;

    /**
     * Register Application Boot Strap Loaders
     * @var array
     */
    public array $bootstrap = [];

    public function __construct(App &$app)
    {
        $this->app = $app;
        $this->app->getContainer()->set(self::class, $this);
        Bootstrappers\Bootstrapper::setup($this->app, $this->bootstrap);
    }

    public static function bootstrap(App $app)
    {
        return new static($app);
    }

    public function getApplication() : App
    {
        return $this->app;
    }
}
