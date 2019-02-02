<?php

namespace App\Modules\Menumanager\Providers;

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
        $this->loadTranslationsFrom(module_path('menumanager', 'Resources/Lang', 'app'), 'menumanager');
        $this->loadViewsFrom(module_path('menumanager', 'Resources/Views', 'app'), 'menumanager');
        $this->loadMigrationsFrom(module_path('menumanager', 'Database/Migrations', 'app'), 'menumanager');
        $this->loadConfigsFrom(module_path('menumanager', 'Config', 'app'));
        $this->loadFactoriesFrom(module_path('menumanager', 'Database/Factories', 'app'));
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
