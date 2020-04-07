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
 * Resolve The Application Http Kernel
 */
$kernel = $app->resolve(\App\Http\HttpKernel::class);

/**
 * Bootstrap Http Application
 */
$kernel->bootstrapApplication();

/**
 * Run Application
 */
$app->run();



