<?php

namespace App\View\Components;

use App\Models\Meta;
use Illuminate\View\Component;

class MetaComponent extends Component
{

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public ?Meta $meta = null)
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.meta-component');
    }
}
