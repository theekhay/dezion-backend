<?php

namespace App\Modules\Servicemanager\Providers;

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
        $this->loadTranslationsFrom(module_path('servicemanager', 'Resources/Lang', 'app'), 'servicemanager');
        $this->loadViewsFrom(module_path('servicemanager', 'Resources/Views', 'app'), 'servicemanager');
        $this->loadMigrationsFrom(module_path('servicemanager', 'Database/Migrations', 'app'), 'servicemanager');
        $this->loadConfigsFrom(module_path('servicemanager', 'Config', 'app'));
        $this->loadFactoriesFrom(module_path('servicemanager', 'Database/Factories', 'app'));
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
