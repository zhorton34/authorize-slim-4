<?php

/* Global Helper Functions */
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
/*
 * event
 * old
 * back
 * session
 * validator
 * asset
 * redirect
 * collect
 * factory
 * env
 * base_path
 * config_path
 * resources_path
 * public_path
 * routes_path
 * storage_path
 * app_path
 * dd (die and dump)
 * throw_when
 * class_basename
 * config
 * data_get
 * data_set
 */

if (!function_exists('event'))
{
    function event() : \Boot\Foundation\Events\Dispatcher
    {
        return app()->resolve('events');
    }
}
if (!function_exists('old'))
{
    function old($key)
    {
        $input = app()->resolve('old_input');

        $field = collect($input)->filter(fn ($value, $field) => $key == $field);

        if (isset($field[$key])) {
            return $field[$key];
        }
    }
}

if (!function_exists('back'))
{
    function back()
    {
        $route = app()->resolve(\App\Support\RequestInput::class);

        $back = $route->getCurrentUri();

        return redirect($back);
    }
}

if (!function_exists('session'))
{
    function session($key = false, $value = false)
    {
        $session = app()->resolve(\Boot\Foundation\Http\Session::class);

        if (!$key) {
            return $session;
        }

        if (!$value) {
            return $session->get($key);
        }

        $session->set($key, $value);

        return $session;
    }
}

if (!function_exists('validator'))
{
    function validator(array $input, array $rules, array $messages = [])
    {
        $factory = app()->resolve(\Boot\Foundation\Http\ValidatorFactory::class);

        return $factory->make($input, $rules, $messages);
    }
}

if (!function_exists('asset'))
{
    function asset($path)
    {
        return env('APP_URL') . "/{$path}";
    }
}
if (!function_exists('redirect'))
{
    function redirect(string $to)
    {
        $redirect = app()->resolve(\App\Support\Redirect::class);

        return $redirect($to);
    }
}
if (!function_exists('collect'))
{
    function collect($items)
    {
        return new Collection($items);
    }
}

if (!function_exists('factory'))
{
    function factory(string $model, int $count = 1)
    {
        $factory = new Factory;

        return $factory($model, $count);
    }
}

if (!function_exists('env'))
{
    function env($key, $default = false)
    {
        $value = getenv($key);

        throw_when(!$value and !$default, "{$key} is not a defined .env variable and has not default value");

        return $value or $default;
    }
}


if (!function_exists('base_path'))
{
    function base_path($path = '')
    {
        return  __DIR__ . "/../{$path}";
    }
}


if (!function_exists('database_path'))
{
    function database_path($path = '')
    {
        return base_path("database/{$path}");
    }
}

if (!function_exists('config_path'))
{
    function config_path($path = '')
    {
        return base_path("config/{$path}");
    }
}

if (!function_exists('storage_path'))
{
    function storage_path($path = '')
    {
        return base_path("storage/{$path}");
    }
}

if (!function_exists('public_path'))
{
    function public_path($path = '')
    {
        return base_path("public_path/{$path}");
    }
}

if (!function_exists('resources_path'))
{
    function resources_path($path = '')
    {
        return base_path("resources/{$path}");
    }
}

if (!function_exists('routes_path'))
{
    function routes_path($path = '')
    {
        return base_path("routes/{$path}");
    }
}

if (!function_exists('app_path'))
{
    function app_path($path = '')
    {
        return base_path("app/{$path}");
    }
}

if (!function_exists('dd'))
{
    function dd()
    {
        array_map(function ($content) {
            echo "<pre>";
            var_dump($content);
            echo "</pre>";
            echo "<hr>";
        }, func_get_args());

        die;
    }
}

if (!function_exists('throw_when'))
{
    function throw_when(bool $fails, string $message, string $exception = Exception::class)
    {
        if (!$fails) return;

        throw new $exception($message);
    }
}

if (! function_exists('class_basename')) {
    function class_basename($class)
    {
        $class = is_object($class) ? get_class($class) : $class;

        return basename(str_replace('\\', '/', $class));
    }
}

if (!function_exists('config'))
{
    function config($path = null, $value = null)
    {
        $config = app()->resolve('config');

        if (is_null($value)) {
            return data_get($config, $path);
        }

        data_set($config, $path, $value);

        app()->bind('config', $config);
    }
}

if (! function_exists('data_get')) {
    /**
     * Get an item from an array or object using "dot" notation.
     *
     * @param  mixed  $target
     * @param  string|array|int|null  $key
     * @param  mixed  $default
     * @return mixed
     */
    function data_get($target, $key, $default = null)
    {
        if (is_null($key)) {
            return $target;
        }

        $key = is_array($key) ? $key : explode('.', $key);

        while (! is_null($segment = array_shift($key))) {
            if ($segment === '*') {
                if ($target instanceof Collection) {
                    $target = $target->all();
                } elseif (! is_array($target)) {
                    return value($default);
                }

                $result = [];

                foreach ($target as $item) {
                    $result[] = data_get($item, $key);
                }

                return in_array('*', $key) ? Arr::collapse($result) : $result;
            }

            if (Arr::accessible($target) && Arr::exists($target, $segment)) {
                $target = $target[$segment];
            } elseif (is_object($target) && isset($target->{$segment})) {
                $target = $target->{$segment};
            } else {
                return value($default);
            }
        }

        return $target;
    }
}

if (! function_exists('data_set')) {
    /**
     * Set an item on an array or object using dot notation.
     *
     * @param  mixed  $target
     * @param  string|array  $key
     * @param  mixed  $value
     * @param  bool  $overwrite
     * @return mixed
     */
    function data_set(&$target, $key, $value, $overwrite = true)
    {
        $segments = is_array($key) ? $key : explode('.', $key);

        if (($segment = array_shift($segments)) === '*') {
            if (! Arr::accessible($target)) {
                $target = [];
            }

            if ($segments) {
                foreach ($target as &$inner) {
                    data_set($inner, $segments, $value, $overwrite);
                }
            } elseif ($overwrite) {
                foreach ($target as &$inner) {
                    $inner = $value;
                }
            }
        } elseif (Arr::accessible($target)) {
            if ($segments) {
                if (! Arr::exists($target, $segment)) {
                    $target[$segment] = [];
                }

                data_set($target[$segment], $segments, $value, $overwrite);
            } elseif ($overwrite || ! Arr::exists($target, $segment)) {
                $target[$segment] = $value;
            }
        } elseif (is_object($target)) {
            if ($segments) {
                if (! isset($target->{$segment})) {
                    $target->{$segment} = [];
                }

                data_set($target->{$segment}, $segments, $value, $overwrite);
            } elseif ($overwrite || ! isset($target->{$segment})) {
                $target->{$segment} = $value;
            }
        } else {
            $target = [];

            if ($segments) {
                data_set($target[$segment], $segments, $value, $overwrite);
            } elseif ($overwrite) {
                $target[$segment] = $value;
            }
        }

        return $target;
    }
}
