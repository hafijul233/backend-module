<?php

namespace Modules\Backend\Providers;

use Modules\Backend\Providers\Components\GroupFieldProvider;
use Modules\Backend\Providers\Components\HorizontalFieldProvider;
use Modules\Backend\Providers\Components\LabelProvider;
use Modules\Backend\Providers\Components\NormalFieldProvider;
use Illuminate\Support\ServiceProvider;

/**
 * Class FormServiceProvider
 * @package Modules\Backend\Providers
 */
class FormServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(LabelProvider::class);
        $this->app->register(HorizontalFieldProvider::class);
        $this->app->register(GroupFieldProvider::class);
        $this->app->register(NormalFieldProvider::class);

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return [];
    }
}
