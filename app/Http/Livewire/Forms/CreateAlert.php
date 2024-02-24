<?php

namespace App\Http\Livewire\Forms;

use App\Mail\AlertCreated;
use App\Models\Alert;
use App\Models\City;
use App\Models\Localisation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class CreateAlert extends Component
{
    public array $formData;
    public array $acquisitionOptions;
    public int $acquisition = 0;
    public array $propertyTypes = [];
    public array $noRoomPropertyType = [12, 10, 13];
    public $localisations = '';
    public $localisation = '';
    public string $inputValue = '';
    public $allCities;
    public $cities;
    public bool $showSuggestion = false;
    public $budget_min = '100000';
    public $budget_max = '100000';
    public $rooms_min = '0';
    public $rooms_max = '0';
    public $bed_rooms_min = '0';
    public $bed_rooms_max = '0';
    public $surface_min = '0';
    public $surface_max = '0';
    public $floor_min = '0';
    public $floor_max = '0';
    public array $commodities = [];
    public $frequency = Alert::FREQ_MONTHLY;
    public string $user_email = '';
    public string $user_telephone = '';
    public int $currentStep = 1;
    public int $maxSteps = 6;
    public array $buttons = [];

    public function mount()
    {
        $this->user_email = Auth::user()->email ?? '';
        $this->allCities = City::select('name', 'id')->get()
            ->map(fn ($city) => ["name" => "{$city->name} - {$city->name}"])
            ->merge(
                Localisation::with('city')
                    ->get()
                    ->map(fn ($local) => ["name" => "{$local->city->name} - {$local->name}"])
            )
            ->sort()
            ->flatten();

        $this->setButtons();
        $this->cities = $this->allCities;
    }

    public function render()
    {
        return view('livewire.forms.create-alert');
    }

    public function firstStepSubmit()
    {
        $validatedData = $this->validate(
            [
                'acquisition' => 'required|integer|min:1',
                'propertyTypes' => 'required|array',
                'propertyTypes.*' => 'exists:property_types,id'
            ],
            [
                'acquisition.required' => __('alerts.acquisition_required'),
                'acquisition.min' => __('alerts.acquisition_required'),
                'propertyTypes.required' => __('alerts.propertyTypes_required')
            ]
        );
        // Few more checkings
        if ($this->acquisition < 1) {
            $this->currentStep = 1;
            throw ValidationException::withMessages(['acquisition' => __('alerts.incorrect_values')]);
        } elseif (empty($this->propertyTypes)) {
            $this->currentStep = 1;
            throw ValidationException::withMessages([
                'propertyTypes' => __('alerts.incorrect_values')
            ]);
        } else {
            $this->currentStep = 2;
            $this->setButtons();
        }
    }

    /**
     * set the clicked city as the selected on
     * @param $value
     * @return void
     */
    public function setNewValue($value)
    {
        /**
         * The value is a text like this: Dakar - Point-e
         * We then need to transform $value to an array, remove the first element
         * Then set the rest as the value.
         */

        $value = explode('-', $value);
        array_shift($value);
        $this->inputValue = implode('-', $value);
        $this->localisations = trim($this->inputValue);
        $this->showSuggestion = false;
    }

    /**
     * This method is called to make a search base on the entered caracters
     * And activate the autocompletion element
     *
     * @return void
     */
    public function triggerSearch()
    {
        $this->showSuggestion = false;

        if (strlen($this->localisations) >= 2) {
            $this->showSuggestion = true;
            $this->cities = $this->allCities
                ->filter(fn($item) => false !== stripos($item, $this->localisations));
        }
    }

    public function secondStepSubmit()
    {
        $validatedData = $this->validate(
            [
                'localisations' => 'required|exists:localisations,name',
            ],
            [
                'localisations.required' => __('alerts.localisations_required'),
            ]
        );
        // The following is certain not necessary but...
        if (empty($this->localisations)) {
            $this->currentStep = 2;
            throw ValidationException::withMessages(['localisations' => __('alerts.incorrect_values')]);
        } else {
            $this->localisation = Localisation::getLocalisationByName($this->localisations)?->id;
            $this->currentStep = 3;
            $this->setButtons();
        }
    }

    public function thirdStepSubmit()
    {
        $validatedData = $this->validate([
            'budget_min' => 'required|numeric|max:'.Alert::BUDGET_RANGE_MAX,
            'budget_max' => 'required|numeric',
            'rooms_min' => 'nullable|integer|max:'.Alert::ROOM_RANGE_MAX,
            'rooms_max' => 'nullable|numeric',
            'surface_min' => 'nullable|integer',
            'surface_max' => 'nullable|integer',
        ]);
        // Few more checking
        if ($this->budget_min < 1 || $this->budget_max < 1 || $this->budget_max < $this->budget_min) {
            $this->currentStep = 3;
            throw ValidationException::withMessages([
                'budget_min' => __('alerts.max_lt_min'),
            ]);
        } elseif ($this->rooms_min < 0 || $this->rooms_max < 0 || $this->rooms_max < $this->rooms_min) {
            $this->currentStep = 3;
            throw ValidationException::withMessages([
                'rooms_min' => __('alerts.max_lt_min'),
            ]);
        } elseif ($this->surface_min < 0 || $this->surface_max < 0 || $this->surface_max < $this->surface_min) {
            $this->currentStep = 3;
            throw ValidationException::withMessages([
                'surface_min' => __('alerts.max_lt_min'),
            ]);
        } else {
            $this->currentStep = 4;
        }
        $this->setButtons();
    }

    public function fourthStepSubmit()
    {
        $validatedData = $this->validate([
            'bed_rooms_min' => 'required|numeric|max:'.Alert::ROOM_RANGE_MAX,
            'bed_rooms_max' => 'required|numeric|max:'.Alert::ROOM_RANGE_MAX,
            'commodities' => 'nullable|array',
            'commodities.*' => 'exists:commodities,id',
            'floor_min' => 'nullable|numeric|max:'.Alert::FLOOR_RANGE_MAX,
            'floor_max' => 'nullable|numeric|max:'.Alert::FLOOR_RANGE_MAX,
        ]);
        // Few more checkings
        if ($this->bed_rooms_min < 0 || $this->bed_rooms_max < 0 || $this->bed_rooms_max < $this->bed_rooms_min) {
            $this->currentStep = 4;
            throw ValidationException::withMessages([
                'bed_rooms_min' => __('alerts.max_lt_min'),
            ]);
        } elseif ($this->floor_min < 0 || $this->floor_max < 0 || $this->floor_max < $this->floor_min) {
            $this->currentStep = 4;
            throw ValidationException::withMessages([
                'floor_min' => __('alerts.max_lt_min'),
            ]);
        } else {
            $this->currentStep = 5;
        }
        $this->setButtons();
    }

    public function fifthStepSubmit()
    {
        $validatedData = $this->validate(
            [
                'user_email' => 'required|email',
                'frequency' => 'required|numeric|'.Rule::in(array_keys(Alert::getFrequencies())),
                'user_telephone' => 'nullable'
            ],
            [
                'user_email.required' => __('alerts.provide_email'),
                'user_email.email' => __('alerts.invalid_email')
            ]
        );
        // The followinng checkings are certainly not necessary, but ...
        if (! $this->frequency) {
            $this->currentStep = 5;
            throw ValidationException::withMessages([
                'frequency' => __('alerts.incorrect_values')
            ]);
        } elseif (trim($this->user_email) == '') {
            $this->currentStep = 5;
            throw ValidationException::withMessages([
                'user_email' => __('alerts.incorrect_values')
            ]);
        } else {
            $this->currentStep = 6;
        }
        $this->setButtons();
    }

    /**
     * Write code on Method
     * @throws ValidationException
     */
    public function submitForm()
    {
        $user = Auth::user() ?? User::firstOrCreate(
            ['email' => $this->user_email],
            [
                'name' => Str::of($this->user_email)->explode('@')[0],
                'first_name' => Str::of($this->user_email)->explode('@')[0],
                'password' => Hash::make('password')
            ]
        );
        $localisation_id = Localisation::select('id')->where('name', $this->localisations)->first();
        $alert = Alert::create([
            'acquisition' => $this->acquisition,
            'localisation_id' => $localisation_id?->id,
            'budget_range' => json_encode(['min' => $this->budget_min, 'max' => $this->budget_max]),
            'rooms_range' => json_encode(['min' => $this->rooms_min, 'max' => $this->rooms_max]),
            'surface_range' => json_encode(['min' => $this->surface_max, 'max' => $this->surface_max]),
            'bed_room_range' => json_encode(['min' => $this->bed_rooms_min, 'max' => $this->bed_rooms_max]),
            'commodities' => json_encode($this->commodities),
            'floor_range' => json_encode(['min' => $this->floor_min, 'max' => $this->floor_max]),
            'frequency' => $this->frequency,
            'user_id' => $user->id,
            'active' => 1,
            'nbr_sent' => 0,
        ]);

        $alert->propertyTypes()->sync($this->propertyTypes);
        $alert->localisations()->sync($this->localisation);
        $alert->theCommodities()->sync($this->commodities);

        $this->successMsg = 'Alert successfully created.';

        Mail::to($user->email)->send(new AlertCreated());

        return redirect()->route('alert-created', $alert->ref);
    }

    /**
     * Write code on Method
     */
    public function back()
    {
        $this->currentStep  = $this->currentStep > 1 ? --$this->currentStep : 1;
        $this->setButtons();
    }

    public function updateBudget($field, $value)
    {
        if ($value < Alert::BUDGET_RANGE_MIN || $value > Alert::BUDGET_RANGE_MAX) {
            $this->$field = Alert::BUDGET_RANGE_MIN;
        }
    }

    public function updateRooms($field, $value)
    {
        if ($value < Alert::ROOM_RANGE_MIN || $value > Alert::ROOM_RANGE_MAX) {
            $this->$field = Alert::ROOM_RANGE_MIN;
        }
    }

    public function updateSurface($field, $value)
    {
        if ($value > Alert::SURFACE_RANGE_MAX) {
            $this->$field = Alert::SURFACE_RANGE_MIN;
        }
    }

    public function updateFloor($field, $value)
    {
        if ($value > Alert::FLOOR_RANGE_MAX) {
            $this->$field = Alert::FLOOR_RANGE_MIN;
        }
    }
    /**
     * Write code on Method
     */
    public function clearForm()
    {
        $this->name = '';
        $this->price = '';
        $this->detail = '';
    }

    private function setButtons()
    {
        $this->buttons = [
            'back' => [
                'label' => __('common_terms.back'),
                'click' => 'back',
                'icon' => 'mdi-backburger'
            ],
            'forward' => [
                'label' => $this->currentStep >= $this->maxSteps
                    ? __('estimations.confirm_save')
                    : __('common_terms.next'),
                'click' => $this->getNextAction(),
                'icon' => $this->currentStep >= $this->maxSteps ? 'mdi-content-save-check' :'mdi-forwardburger'
            ]
        ];
    }

    private function getNextAction(): string
    {
        return match ($this->currentStep) {
            2 => 'secondStepSubmit',
            3 => 'thirdStepSubmit',
            4 => 'fourthStepSubmit',
            5 => 'fifthStepSubmit',
            6 => 'submitForm',

            default => 'firstStepSubmit'
        };
    }
}
