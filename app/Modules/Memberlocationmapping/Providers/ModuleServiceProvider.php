<?php

namespace App\Modules\Memberlocationmapping\Providers;

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
        $this->loadTranslationsFrom(module_path('memberlocationmapping', 'Resources/Lang', 'app'), 'memberlocationmapping');
        $this->loadViewsFrom(module_path('memberlocationmapping', 'Resources/Views', 'app'), 'memberlocationmapping');
        $this->loadMigrationsFrom(module_path('memberlocationmapping', 'Database/Migrations', 'app'), 'memberlocationmapping');
        $this->loadConfigsFrom(module_path('memberlocationmapping', 'Config', 'app'));
        $this->loadFactoriesFrom(module_path('memberlocationmapping', 'Database/Factories', 'app'));
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
