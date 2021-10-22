<?php

namespace Modules\Backend\View\Composers;

use Illuminate\View\View;

class MainSidebarComposer
{
    /**
     * MainSidebarComposer Constructor
     */
    public function __construct()
    {

    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
       /* $view->with('count', $this->users->count());*/
    }
}
