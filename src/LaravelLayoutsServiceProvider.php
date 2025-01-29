<?php

namespace Piyush\LaravelLayouts;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class LaravelLayoutsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load Views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-layouts');

        // Load Routes
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        // Publish Views
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-layouts'),
        ], 'views');
    }

    public function register()
    {
        // Register Config
        $this->mergeConfigFrom(
            __DIR__.'/../config/laravel-layouts.php', 'laravel-layouts'
        );
    }
}
