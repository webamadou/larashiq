<?php

namespace App\Http\Livewire\Forms;

use App\Models\Property;
use Livewire\Component;

class AutoFillProperty extends Component
{
    public string $field_name = '';
    public string $field_label = 'Le bien';
    public string $field_value = '';
    public ?int $picked_property = null;
    public bool $hasOptions = false;
    public array $options = [];

    public function render()
    {
        return view('livewire.forms.auto-fill-property');
    }

    public function updatedFieldValue()
    {
        $this->options = Property::where('name', 'LIKE', "%{$this->field_value}%")
            ->get()->pluck('name', 'id')
            ->all();
        if (! empty($this->options)) {
            $this->hasOptions = true;
        } else {
            $this->hasOptions = false;
        }
    }

    public function setFormvalue($id)
    {
        if ($item = $this->options[$id]) {
            $this->picked_property = $id;
            $this->field_value = $item;
            $this->hasOptions = false;
        }
    }
}
