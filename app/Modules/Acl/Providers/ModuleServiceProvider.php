<?php

namespace App\Modules\Acl\Providers;

use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'acl');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'acl');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'acl');
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}
