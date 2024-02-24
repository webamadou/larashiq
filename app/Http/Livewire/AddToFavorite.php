<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddToFavorite extends Component
{
    public $property = [];
    public $user = null;
    public $isFavorite = false;
    public $carousel = false;

    public function mount()
    {
        $this->user = $user ?? auth()->user();
        $this->getCurrentUserPropertyPivot();
    }

    public function getCurrentUserPropertyPivot()
    {
        $pivotData = $this->user?->properties
            ?->find($this->property->id)
            ?->pivot;

        $this->isFavorite = $pivotData?->is_favorite > 0;
    }

    public function updateFavorites()
    {
        if (! $this->user) {
            return redirect()->route('login');
        }

        $propertyUser = $this->user?->properties
            ?->find($this->property->id);

        if ($propertyUser) {
            $depart = $propertyUser->pivot->is_favorite;
            $newValue = (int) ! boolval($propertyUser->pivot->is_favorite);
            $this->user->properties()
                ->updateExistingPivot(
                    $this->property->id,
                    ['is_favorite' => $newValue]
                );

            $this->isFavorite = $newValue > 0;
        } else {
            $this->user->properties()
                ->attach([
                    $this->property->id => ['is_favorite' => 1]
                ]);
            $this->isFavorite = true;
        }
    }

    public function render()
    {
        return view('livewire.add-to-favorite');
    }
}
