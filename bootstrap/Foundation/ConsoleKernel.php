<?php

namespace Boot\Foundation;

class ConsoleKernel extends Kernel
{
    public array $bootstrappers = [
        Bootstrappers\LoadEnvironmentDetector::class,
        Bootstrappers\LoadEnvironmentVariables::class,
        Bootstrappers\LoadConfiguration::class,
        Bootstrappers\LoadAliases::class,
        Bootstrappers\LoadConsoleEnvironment::class,
        Bootstrappers\LoadBladeTemplates::class,
        Bootstrappers\LoadMailable::class,
        Bootstrappers\LoadServiceProviders::class,
    ];
}
