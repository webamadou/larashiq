<?php

namespace App\View\Components;

use App\Models\Configuration;
use Illuminate\View\Component;

#[AllowDynamicProperties]
class TopHeader extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->configs = Configuration::first();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.top-header')->with('configs', $this->configs);
    }
}
