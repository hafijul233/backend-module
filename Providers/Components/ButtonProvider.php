<?php

namespace Modules\Backend\Providers\Components;

use Illuminate\Support\ServiceProvider;
use Collective\Html\HtmlFacade as Html;

class ButtonProvider extends ServiceProvider
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
        Html::component('linkButton', 'htmls.link-button', ['title', 'route', 'param' => [], 'icon', 'color' => 'success']);
        Html::component('actionButton', 'htmls.actions', ['resourceRouteName', 'id', 'options' => []]);
        Html::component('backButton', 'htmls.back-button', ['route', 'param' => []]);

        //Table actions
        Html::component('editButton', 'htmls.edit-button', ['route', 'param' => []]);
        Html::component('showButton', 'htmls.show-button', ['route', 'param' => []]);
        Html::component('deleteButton', 'htmls.delete-button', ['route', 'param' => []]);
        Html::component('restoreButton', 'htmls.restore-button', ['route', 'param' => []]);
        Html::component('toggleButton', 'htmls.toggle-button', ['route', 'param' => []]);
    }
}
