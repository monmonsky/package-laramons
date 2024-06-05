<?php

namespace Laramons\Laramons;

use Illuminate\Support\ServiceProvider;

class LaramonsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views', 'laramons');
        $this->publishes([
            __DIR__.'/views' => resource_path('views/vendor/laramons'),
        ]);
    }

    public function register()
    {
        // Register package services and bindings here.
    }
}
