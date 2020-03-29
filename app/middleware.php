<?php

use Slim\App;

return function (App $app) {
    $app->addErrorMiddleware(
        config('logging.middleware.displayErrorDetails'),
        config('logging.middleware.logErrors'),
        config('logging.middleware.logErrorDetails')
    );
};
