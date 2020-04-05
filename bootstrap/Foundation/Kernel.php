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
    public array $bootstrap = [
        //
    ];

    public function __construct(App &$app)
    {
        $this->app = $app;
    }

    public function bootstrapApplication()
    {
        Bootstrappers\Bootstrapper::setup($this->app, $this->bootstrap);
    }
}
