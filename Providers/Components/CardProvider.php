<?php

namespace Modules\Backend\Providers\Components;

use Illuminate\Support\ServiceProvider;
use Collective\Html\HtmlFacade as Html;

class CardProvider extends ServiceProvider
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
        Html::component('cardHeader', 'htmls.card-header', ['title', 'icon', 'short' => null]);
    }
}
