<?php

namespace Modules\Backend\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Modules\Backend\View\Composers\MainSidebarComposer;
use Spatie\Menu\Laravel\Facades\Menu;
use Spatie\Menu\Laravel\Link;

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
        $this->registerComponentMenu();
    }

    protected function registerComponentMenu() {
        Menu::macro('backend', function () {
            return Menu::new()
                ->addClass('nav nav-treeview')
                ->add(Link::to('/', '<i class="far fa-circle nav-icon"></i><p>Inactive Page</p>')
                    ->addClass('nav-link')
                    ->addParentClass('nav-item'))

                ->add(Link::to('/', '<i class="far fa-circle nav-icon"></i><p>Inactive Page</p>')
                    ->addClass('nav-link')
                    ->addParentClass('nav-item'))

                ->add(Link::to('/', '<i class="far fa-circle nav-icon"></i><p>Inactive Page</p>')
                    ->addClass('nav-link')
                    ->addParentClass('nav-item'))

                ->add(Link::to('/', '<i class="far fa-circle nav-icon"></i><p>Inactive Page</p>')
                    ->addClass('nav-link')
                    ->addParentClass('nav-item'))

                ->add(Link::to('/', '<i class="far fa-circle nav-icon"></i><p>Inactive Page</p>')
                    ->addClass('nav-link')
                    ->addParentClass('nav-item'))

                ->add(Link::to('/', '<i class="far fa-circle nav-icon"></i><p>Inactive Page</p>')
                    ->addClass('nav-link')
                    ->addParentClass('nav-item'))
                ->add(Link::to('/', '<i class="far fa-circle nav-icon"></i><p>Inactive Page</p>')
                    ->addClass('nav-link')
                    ->addParentClass('nav-item'))
                ->wrap('li', ['class' => 'nav-item'])
                ->setActiveFromRequest();
        });
    }
}
