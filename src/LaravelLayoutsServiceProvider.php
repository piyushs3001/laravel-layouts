<?php

namespace Piyush\LaravelLayouts;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Configuration\Middleware;
use Piyush\LaravelLayouts\Console\InstallModel;
use Piyush\LaravelLayouts\Console\InstallRequest;
use Piyush\LaravelLayouts\Console\InstallSeeder;
use Piyush\LaravelLayouts\Http\Middleware\AdminAuthenticate;
use DirectoryIterator;
use Illuminate\Routing\Router;
use Piyush\LaravelLayouts\LaravelLayouts;

class LaravelLayoutsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {

            $this->publishes([
                __DIR__. '/../config/laravel-layouts.php' => config_path('laravel-layouts.php'),
            ], 'laravel-layouts-config');

            $this->publishes([
                __DIR__.'/../resources/views/admin/index.blade.php' => resource_path('views/admin/index.blade.php'),
                __DIR__.'/../resources/views/admin/auth' => resource_path('views/admin/auth'),
                __DIR__.'/../resources/views/admin/layouts' => resource_path('views/admin/layouts'),
                __DIR__.'/../resources/views/admin/components' => resource_path('views/admin/components'),
            ], 'views');

            $this->publishes([
                __DIR__. '/Notifications/ResetPasswordNotification.php' => app_path('Notifications/ResetPasswordNotification.php'),
            ], 'laravel-layouts-notifications');

            $this->publishes([
                __DIR__ . '/../database/migrations/2025_01_30_115003_create_admins_table.php' => database_path('migrations/2025_01_30_115003_create_admins_table.php'),
            ], 'laravel-layouts-migrations');

            $this->publishes([
                __DIR__ . '/../database/seeders/AdminsTableSeeder.php' => database_path('seeders/AdminsTableSeeder.php'),
            ], 'laravel-layouts-seeders');

            $this->publishes([
                __DIR__ . '/Models/Admin.php' => app_path('Models/Admin.php'),
            ], 'laravel-layouts-models');

            $requests = [];
            $files = new DirectoryIterator(__DIR__.'/Http/Requests/Admin');
            foreach ($files as $file) {
                if ($file->isFile()) {
                    $requests[__DIR__ . '/Http/Requests/Admin/' . $file->getFilename()] = app_path("Http/Requests/Admin/{$file->getFilename()}");
                }
            }

            $this->publishes($requests, 'laravel-layouts-requests');

            $controller = [];
            $controllerFiles = new DirectoryIterator(__DIR__.'/Http/Controllers/Admin');
            foreach ($controllerFiles as $controllerFile) {
                if ($controllerFile->isFile()) {
                    $controller[__DIR__ . '/Http/Controllers/Admin/' . $controllerFile->getFilename()] = app_path("Http/Controllers/Admin/{$controllerFile->getFilename()}");
                }
            }

            $this->publishes($controller, 'laravel-layouts-controllers');

            $this->commands([
                InstallRequest::class,
                InstallSeeder::class,
                InstallModel::class,
            ]);
        }

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-layouts');

        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        if (LaravelLayouts::shouldRunMigrations()) {
            $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        }

        LaravelLayouts::useAdminModel(
            config('laravel-layouts.models.admin')
        );

        $this->registerRoutes();
        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('adminauth', AdminAuthenticate::class);

        // $this->app->afterResolving(Middleware::class, function (Middleware $middleware) {
        //     $middleware->alias('adminauth', AdminAuthenticate::class);
        // });
    }

    public function register()
    {
        // Register Config
        $this->mergeConfigFrom(
            __DIR__.'/../config/laravel-layouts.php', 'laravel-layouts'
        );
    }

    protected function registerRoutes()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    }
}
