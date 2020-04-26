<?php

namespace App\Providers;

use App\Listeners\FlashSuccessMessage;
use Boot\Foundation\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        event()->listen('flash.error', fn ($message) => session()->flash()->add('error', $message));
        event()->listen('flash.success', fn ($message) => session()->flash()->add('success', $message));
    }
}
