<?php

namespace Remopi\Providers;

use Remopi\Drivers\DefaultDriver;
use Remopi\Managers\DriverManager;
use Illuminate\Support\ServiceProvider;

class RemopiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('remopi', function($app) {
            return new DriverManager($app);
        });

        $this->app->bind('default', function () {
            return new DefaultDriver();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
