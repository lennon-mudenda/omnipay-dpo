<?php

namespace LennonMudenda\OmnipayDpo;

use Illuminate\Support\ServiceProvider;

class OmnipayDpoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'omnipay-dpo');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'omnipay-dpo');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');/home/buckylee/Projects/EmoyenMed/v1/backend

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('omnipay-dpo.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/omnipay-dpo'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/omnipay-dpo'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/omnipay-dpo'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'omnipay-dpo');

        // Register the main class to use with the facade
        $this->app->singleton('omnipay-dpo', function () {
            return new OmnipayDpo;
        });
    }
}
