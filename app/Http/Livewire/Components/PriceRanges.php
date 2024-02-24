<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class PriceRanges extends Component
{
    public const MIN = 200000;
    public const MAX = 10000000000;

    public int $min = self::MIN;
    public int $max = self::MAX;

    public $budgetMin = null;
    public $budgetMax = null;

    public function updatedBudgetMin()
    {
        $this->budgetMin = preg_replace('/[^0-9]/', '', $this->budgetMin);
        if (!! $this->budgetMin) {
            $this->budgetMin = number_format($this->budgetMin, 0, ',', '.');
        }
    }

    public function updatedBudgetMax()
    {
        $this->budgetMax = preg_replace('/[^0-9]/', '', $this->budgetMax);
        if (!! $this->budgetMax) {
            $this->budgetMax = number_format($this->budgetMax, 0, ',', '.');
        }
    }

    public function render()
    {
        return view('livewire.components.price-ranges');
    }
}
