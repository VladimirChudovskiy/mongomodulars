<?php

namespace App\Modules\Core\Providers;

use Caffeinated\Modules\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        foreach (glob(config('modules.path').'/Core/Helpers/*.php') as $filename){
            require_once($filename);
        }
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
