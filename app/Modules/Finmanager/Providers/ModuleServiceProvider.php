<?php

namespace App\Modules\Finmanager\Providers;

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
        $this->loadTranslationsFrom(module_path('finmanager', 'Resources/Lang', 'app'), 'finmanager');
        $this->loadViewsFrom(module_path('finmanager', 'Resources/Views', 'app'), 'finmanager');
        $this->loadMigrationsFrom(module_path('finmanager', 'Database/Migrations', 'app'), 'finmanager');
        $this->loadConfigsFrom(module_path('finmanager', 'Config', 'app'));
        $this->loadFactoriesFrom(module_path('finmanager', 'Database/Factories', 'app'));
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
