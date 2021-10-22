<?php

namespace Modules\Backend\Providers;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'Backend';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'backend';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerPublicAssets();
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->app->register(MenuServiceProvider::class);
        $this->app->register(ObserverServiceProvider::class);
        $this->app->register(EventServiceProvider::class);
        $this->app->register(FormServiceProvider::class);
        $this->app->register(HtmlServiceProvider::class);

    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path($this->moduleName, 'Config/config.php') => config_path($this->moduleNameLower . '.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path($this->moduleName, 'Config/config.php'), $this->moduleNameLower
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/' . $this->moduleNameLower);

        $sourcePath = module_path($this->moduleName, 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ], ['views', $this->moduleNameLower . '-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->moduleNameLower);
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/' . $this->moduleNameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->moduleNameLower);
        } else {
            $this->loadTranslationsFrom(module_path($this->moduleName, 'Resources/lang'), $this->moduleNameLower);
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (\Config::get('view.paths') as $path) {
            if (is_dir($path . '/modules/' . $this->moduleNameLower)) {
                $paths[] = $path . '/modules/' . $this->moduleNameLower;
            }
        }
        return $paths;
    }

    private function registerPublicAssets()
    {
        $this->publishes([module_path($this->moduleName, 'Resources/assets') => public_path('modules/' . $this->moduleNameLower . '/assets'),
        ], $this->moduleNameLower . '-assets');

        $this->publishes([module_path($this->moduleName, 'Resources/plugins') => public_path('modules/' . $this->moduleNameLower . '/plugins'),
        ], $this->moduleNameLower . '-plugins');

    }
}
