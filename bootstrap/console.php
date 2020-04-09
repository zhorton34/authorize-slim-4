<?php

/**
 * Autoload global dependencies and allow for auto-loading local dependencies via use
 */
require_once __DIR__ . '/../vendor/autoload.php';

/**
 * Boot up application, AKA Turn the lights on.
 */
$app = require base_path('bootstrap/app.php');

/**
 * Make Console Kernel
 */
$kernel = $app->resolve(\App\Console\ConsoleKernel::class);

/**
 * Bootstrap Console Application
 */
$kernel->bootstrapApplication();

/**
 * Return Console App
 */
return $app;
