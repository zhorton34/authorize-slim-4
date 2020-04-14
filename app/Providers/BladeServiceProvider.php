<?php

namespace App\Providers;

use App\Support\View;
use Illuminate\Support\Str;
use Jenssegers\Blade\Blade;
use Slim\Psr7\Factory\ResponseFactory;

class BladeServiceProvider extends ServiceProvider
{
    protected static function directives(&$blade)
    {
        /**
         * Blade Directive: @example
         * Description: echos "Hello World"
         */
        $blade->directive('example', fn () => "<?php echo 'hello world'; ?>");

        /**
         * Blade Directive: @csrf
         * Description: Output Hidden Csrf Token Input Fields
         */
        $blade->directive('csrf', function () {
            $token = app()->resolve('csrf');

            $get = fn ($field, $key) => "getToken" . Str::studly($field) . Str::studly($key);
            $csrf = fn ($field, $key = '') => $token->{$get($field, $key)}();

            $csrf_field = fn ($field) => Str::replaceArray('{*}', [
                $csrf($field),
                $csrf($field, 'Key')
            ], "<input type='hidden' value={*} name={*} />");

            return Str::of("<input> <input>")->replaceArray('<input>', [
                $csrf_field('name'),
                $csrf_field('value')
            ])
                ->start('<?php echo "')
                ->finish('"; ?>');
        });
    }

    /**
     * Register Blade Directives and shared data within register
     */
    public function register()
    {
        $blade = $this->app->resolve(Blade::class);
        self::directives($blade);

        $this->app->bind(View::class, fn (ResponseFactory $factory, Blade $blade) => new View($factory, $blade));
    }

    public function boot()
    {

    }
}
