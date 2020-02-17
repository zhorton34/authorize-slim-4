<?php

use Slim\App;

return function (App $app) {
    $setting = $app->getContainer()->get('settings');

    $app->addErrorMiddleware(
        $setting['displayErrorDetails'],
        $setting['logErrors'],
        $setting['logErrorDetails']
    );
};
