<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class InputNumber extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public $min = null,
        public $max = null,
        public $pace = 1,
        public string $inputWire = '',
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.input-number');
    }
}
