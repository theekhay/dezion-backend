<?php

namespace App\Modules\Membership\Providers;

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
        $this->loadTranslationsFrom(module_path('membership', 'Resources/Lang', 'app'), 'membership');
        $this->loadViewsFrom(module_path('membership', 'Resources/Views', 'app'), 'membership');
        $this->loadMigrationsFrom(module_path('membership', 'Database/Migrations', 'app'), 'membership');
        $this->loadConfigsFrom(module_path('membership', 'Config', 'app'));
        $this->loadFactoriesFrom(module_path('membership', 'Database/Factories', 'app'));
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
