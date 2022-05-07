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
        $this->menus = $this->buildMenu(Menu::whereNull('parent_id')->get());
    }

    function buildMenu($menus, $html = '')
    {
        foreach($menus as $menu) {
            if ($menu->children->isNotEmpty()) {
                $html .= '<li class="mb-1"><button class="align-items-center btn btn-toggle collapsed px-0 rounded text-lg-start w-100" data-bs-toggle="collapse" data-bs-target="#'.$menu->slug.'-collapse" aria-expanded="true"> '.$menu->name.' </button> <div class="collapse show" id="'.$menu->slug.'-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">';
                foreach ($menu->children as $child) {
                    $html .= '<li class="mb-1"> <a href="'.$child->url.'"> '.$child->name.' </a> </li>';
                }
                $html .= '</ul></div></li>';
            } else {
                $html .= '<li class="mb-1"> <a href="'.$menu->url.'"> '.$menu->name.' </a> </li>';
            }
        }

        return $html;
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
