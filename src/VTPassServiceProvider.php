<?php

namespace Emmadedayo\VtPass;

use Illuminate\Support\ServiceProvider;

class VTPassServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../configuration/vtpass.php', 'vtpass');

        // Register the service the package provides.
        $this->app->singleton('vtpass', function ($app) {
            return new VTPass;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['vtpass'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__ . '/../configuration/vtpass.php' => config_path('vtpass.php'),
        ], 'vtpass.config');

    }
}
