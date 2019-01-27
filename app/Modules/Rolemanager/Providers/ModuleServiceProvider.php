<?php

namespace App\Modules\Rolemanager\Providers;

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
        $this->loadTranslationsFrom(module_path('rolemanager', 'Resources/Lang', 'app'), 'rolemanager');
        $this->loadViewsFrom(module_path('rolemanager', 'Resources/Views', 'app'), 'rolemanager');
        $this->loadMigrationsFrom(module_path('rolemanager', 'Database/Migrations', 'app'), 'rolemanager');
        $this->loadConfigsFrom(module_path('rolemanager', 'Config', 'app'));
        $this->loadFactoriesFrom(module_path('rolemanager', 'Database/Factories', 'app'));
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
