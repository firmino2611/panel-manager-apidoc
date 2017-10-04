<?php

namespace Package\Firmino\Apidoc\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Package\Firmino\Apidoc\Doc;

class ApiDocServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Route::namespace('Package\Firmino\Apidoc\Http\Controllers')
                ->group(__DIR__ . '/../Routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/../Resources/Views', 'Apidoc');
        $this->loadMigrationsFrom(__DIR__ . '/../Migrations');

        $this->publishes([
            __DIR__ . '/../Migrations' => database_path('migrations')
        ], 'migrations');

        $this->publishes([
            __DIR__ . '/../Assets' => public_path('vendor/apidoc')
        ], 'assets');

        $this->publishes([
            __DIR__ . '/../Config/apidoc.php' => config_path('apidoc.php')
        ], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../Config/apidoc.php',
            'apidoc'
        );

        $this->app->singleton('Apidoc.doc', function(){
            return new Doc();
        });
    }
}
