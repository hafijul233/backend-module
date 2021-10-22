<?php

namespace Modules\Backend\Providers;

use Modules\Backend\Providers\Components\ButtonProvider;
use Modules\Backend\Providers\Components\CardProvider;
use Illuminate\Support\ServiceProvider;

class HtmlServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->register(ButtonProvider::class);
        $this->app->register(CardProvider::class);


    }
}
