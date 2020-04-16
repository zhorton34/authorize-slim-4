<?php

namespace App\Providers;

use App\Support\View;
use Illuminate\Support\Str;
use Jenssegers\Blade\Blade;
use Slim\Psr7\Factory\ResponseFactory;
use Boot\Foundation\Providers\BladeServiceProvider as ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    public function directives(Blade $blade)
    {
        $blade->directive('example', fn () => "<?php echo 'hello world'; ?>");

        $blade->directive('csrf', function () {
           $token = $this->app->resolve('csrf');
           $stub = "<input type='hidden' name='{replace}' value='{replace}' />";

           $csrf_value_input = Str::of($stub)->replaceArray('{replace}', [
               $token->getTokenValueKey(),
               $token->getTokenValue()
           ]);

           $csrf_name_input = Str::of($stub)->replaceArray('{replace}', [
              $token->getTokenNameKey(),
              $token->getTokenName()
           ]);

           $stub = '<?php echo "{replace} \n {replace}"; ?>';

           $expression = Str::of($stub)->replaceArray('{replace}', [
               $csrf_value_input,
               $csrf_name_input
           ]);

           return $expression;
        });
    }

    public function register()
    {
        $this->app->bind(View::class, fn (Blade $blade, ResponseFactory $factory) => new View($blade, $factory));
    }

    public function boot()
    {

    }
}
