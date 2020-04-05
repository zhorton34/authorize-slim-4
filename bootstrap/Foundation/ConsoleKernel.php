<?php

namespace Boot\Foundation;

class ConsoleKernel extends Kernel
{
    public array $bootstrap = [
        Bootstrappers\LoadEnvironmentVariables::class,
        Bootstrappers\LoadDebuggingPage::class,
        Bootstrappers\LoadAliases::class,
        Bootstrappers\LoadFactories::class,
        Bootstrappers\LoadServiceProviders::class,
    ];
}
