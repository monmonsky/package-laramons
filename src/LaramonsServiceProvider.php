<?php

namespace Laramons\Laramons;

use Illuminate\Support\ServiceProvider;
use Laramons\Laramons\Commands\CreateUserCommand;

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
        // Register command
        if ($this->app->runningInConsole()) {
            $this->commands([
                CreateUserCommand::class,
            ]);
        }
    }
}
