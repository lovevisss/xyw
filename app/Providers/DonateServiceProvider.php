<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DonateServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('blocks._donate', 'App\Http\Composer\DonateComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
