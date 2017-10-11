<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Moloquent\Query\Builder;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Builder::macro('getName', function() {
            return 'mongodb';
        });
    }
}
