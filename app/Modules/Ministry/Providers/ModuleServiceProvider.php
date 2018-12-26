<?php

namespace App\Modules\Ministry\Providers;

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
        $this->loadTranslationsFrom(module_path('ministry', 'Resources/Lang', 'app'), 'ministry');
        $this->loadViewsFrom(module_path('ministry', 'Resources/Views', 'app'), 'ministry');
        $this->loadMigrationsFrom(module_path('ministry', 'Database/Migrations', 'app'), 'ministry');
        $this->loadConfigsFrom(module_path('ministry', 'Config', 'app'));
        $this->loadFactoriesFrom(module_path('ministry', 'Database/Factories', 'app'));
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
