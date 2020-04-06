<?php

/**
 * Autoload global dependencies and allow for auto-loading local dependencies via use
 */
require_once __DIR__ . '/../vendor/autoload.php';

/**
 * Boot up application, AKA Turn the lights on.
 */
$app = require_once __DIR__ . '/../bootstrap/app.php';

/**
 * Passing our Request through the app
 */
$app->run();
