<?php

namespace App\View\Components;

use App\Models\Menu;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SideBar extends Component
{
    public array $user;
    public $menus;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->user = ['name','fname', 'email', 'phone'];
        $this->menus = Menu::isVisible()->orderBy('position')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|\Closure|string
     */
    public function render(): View|string|\Closure
    {
        return view('components.side-bar');
    }
}
