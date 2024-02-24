<?php

namespace App\View\Components;

use App\Models\Configuration;
use Illuminate\View\Component;

class ContactWidget extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $configuration = [])
    {
        $this->configuration = Configuration::first();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.contact-widget');
    }
}
