<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Localisation;
use Livewire\Component;

class InputSearchLocalisation extends Component
{
    public array $localisations = [];
    public string $inputValue = '';
    public string $query = '';
    public bool $showSuggestion = false;
    public $allCities;
    public $cities;

    public function mount()
    {
        /*$this->allCities = City::select('name', 'id')->get()
            ->map(fn ($city) => ["name" => "<sup>{$city->name}</sup> - {$city->name}"])
            ->merge(
                Localisation::with('city')
                    ->get()
                    ->map(fn ($local) => ["name" => "<sup>{$local->city->name}</sup> - {$local->name}"])
            )*/
        $this->allCities = Localisation::with('city')
            ->get()
            ->map(fn($local) => ["name" => "<sup>{$local->city->name}</sup> - {$local->name}"])
            ->sort()
            ->flatten();
        $this->cities = $this->allCities;
    }

    public function setNewValue($value)
    {
        $value = explode('-', $value);
        array_shift($value);
        $this->inputValue = implode('-', $value);
        $this->showSuggestion = false;
    }

    public function triggerSearch()
    {
        $this->showSuggestion = false;

        if (strlen($this->inputValue) >= 2) {
            $this->showSuggestion = true;
            $this->cities = $this->allCities
                ->filter(fn($item) => false !== stripos($item, $this->inputValue));
        }
    }

    public function closeResults()
    {
        $this->showSuggestion = false;
    }
    public function render()
    {
        return view('livewire.input-search-localisation');
    }
}
