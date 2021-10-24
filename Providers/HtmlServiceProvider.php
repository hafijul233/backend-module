<?php

namespace Modules\Backend\Providers;


use Illuminate\Support\ServiceProvider;
use Collective\Html\HtmlFacade as Html;

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
        //Buttons
        Html::component('linkButton', 'backend::htmls.link-button', ['title', 'route', 'param' => [], 'icon', 'color' => 'success']);
        Html::component('actionButton', 'backend::htmls.action-buttons', ['resourceRouteName', 'id', 'options' => []]);
        Html::component('backButton', 'backend::htmls.back-button', ['route', 'param' => []]);
        Html::component('editButton', 'backend::htmls.edit-button', ['route', 'param' => []]);
        Html::component('showButton', 'backend::htmls.show-button', ['route', 'param' => []]);
        Html::component('deleteButton', 'backend::htmls.delete-button', ['route', 'param' => []]);
        Html::component('restoreButton', 'backend::htmls.restore-button', ['route', 'param' => []]);
        Html::component('toggleButton', 'backend::htmls.toggle-button', ['route', 'param' => []]);

        //Card
        Html::component('cardHeader', 'backend::htmls.card-header', ['title', 'icon', 'short' => null]);
        Html::component('cardSearch', 'backend::htmls.search-form', ['field', 'route', 'placeholder' => null]);
    }
}
