<?php

use DI\Container;
use App\Http\HttpKernel;
use DI\Bridge\Slim\Bridge as App;

return HttpKernel::bootstrap(App::create(new Container))->getApplication();
