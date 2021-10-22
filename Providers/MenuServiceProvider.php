<?php

namespace Modules\Backend\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Modules\Backend\View\Composers\MainSidebarComposer;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
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

    /**
     *
     */
    public function boot()
    {
        // Using class based composers...
        View::composer('backend::partials.menu-sidebar', MainSidebarComposer::class);

    }
}
