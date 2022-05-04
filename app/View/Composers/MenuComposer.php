<?php

namespace App\View\Composers;

use App\Models\Menu;
use Illuminate\View\View;

class MenuComposer
{
    protected $menus;
    protected $hasSidebar;

    /**
     * Create a new profile composer.
     *
     * @param  \App\Repositories\UserRepository  $users
     * @return void
     */
    public function __construct()
    {
        $this->hasSidebar = true;
        $this->menus = Menu::where('visible', 1)->orderBy('position')->get();
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('menus', $this->menus);
        $view->with('hasSidebar', $this->hasSidebar);
    }
}
