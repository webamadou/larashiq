<?php

namespace App\Http\Livewire\Traits;

trait HasFomrActions
{
    /**
     * increment an attribute from the LW class
     *
     * @param String $attributeName
     * @param int $pace
     * @return int
     */
    public function incrementInputNumber(string $attributeName, int $pace = 1, int $max = null): int
    {
        if ($max) {
            return $this->$attributeName = $this->$attributeName >= $max
                ? $this->$attributeName
                : $this->$attributeName + $pace;
        }

        return $this->$attributeName = $this->$attributeName + $pace;
    }

    /**
     * decrement an attribute from the LW class
     *
     * @param String $attributeName
     * @param int $pace
     * @return int
     */
    public function decrementInputNumber(string $attributeName, int $pace = 1, int $min = null): int
    {
        return $this->$attributeName = $this->$attributeName <= $min
            ? $this->$attributeName
            : $this->$attributeName - $pace;
    }
}
