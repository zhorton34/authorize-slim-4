<?php

define('SLIM_START', microtime(true));

/**
 * Autoload Pages & Files
 */
require_once(__DIR__ . '/../vendor/autoload.php');

/**
 * Turn the app on
 */
$app = require_once(__DIR__ . '/../bootstrap/app.php');

/**
 * Run Slim Application
 */
$app->run();

