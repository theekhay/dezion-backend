<?php

namespace App\Modules\Notify\Providers;

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
        $this->loadTranslationsFrom(module_path('notify', 'Resources/Lang', 'app'), 'notify');
        $this->loadViewsFrom(module_path('notify', 'Resources/Views', 'app'), 'notify');
        $this->loadMigrationsFrom(module_path('notify', 'Database/Migrations', 'app'), 'notify');
        $this->loadConfigsFrom(module_path('notify', 'Config', 'app'));
        $this->loadFactoriesFrom(module_path('notify', 'Database/Factories', 'app'));
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
