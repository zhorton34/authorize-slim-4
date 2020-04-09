<?php

require_once __DIR__ . '/../vendor/autoload.php';

$app = require __DIR__ . '/app.php';

/**
 * Resolve Console Kernel
 */
$kernel = $app->resolve(\App\Console\ConsoleKernel::class);

/**
 * Bootstrap Console Application
 */
$kernel->bootstrapApplication();

/**
 * Return Console Booted App
 */
return $app;
