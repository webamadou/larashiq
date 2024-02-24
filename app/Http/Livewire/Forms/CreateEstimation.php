<?php

namespace App\Http\Livewire\Forms;

use App\Http\Livewire\Traits\HasFomrActions;
use App\Jobs\EstimationRequestNotifications;
use App\Models\Estimation;
use App\Models\PropertyType;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Component;

class CreateEstimation extends Component
{
    use HasFomrActions;

    public array $formData;
    public string $address = '';
    public $propertyTypes = '0';
    public $builtYear = '0';
    public $minYear = '0';
    public $nbrRooms = '0';
    public $nbrBedRooms = '0';
    public $surface = '0';
    public $livingSpace = '0';
    public $livingRoomSurface = '0';
    public $nbrWaterRoom = '0';
    public $nbrBathRoom = '0';
    public $heatingSystem = '0';
    public $generalCondition = '0';
    public $kitchenType = '0';
    public $furnished = '0';
    public $nbrParking = '0';
    public $garageSpace = '0';
    public string $user_email = '';
    public string $description = '';
    public string $phoneNumber = '';
    public array $commodities = [];
    public int $conditionsChecked = 0;

    public int $status = 0;
    public $currentStep = 1;
    public array $backButton = [];
    public int $maxSteps = 7;
    public array $buttons = [];

    public function mount()
    {
        $this->user_email = Auth::user()->email ?? '';
        $this->builtYear = date('Y');
        $this->setButtons();
        $this->minYear = $this->builtYear - 75;
    }

    public function render()
    {
        return view('livewire.forms.create-estimation');
    }

    public function firstStepSubmit()
    {
        $validatedData = $this->validate(
            [
                'address' => 'required|string|min:5',
            ],
            [
                'address.required' => __('estimations.address_required'),
                'address.min' => __('estimations.address_min')
            ]
        );

        $this->currentStep = 2;
        $this->setButtons();
    }

    public function secondStepSubmit()
    {
        $validatedData = $this->validate(
            [
                'propertyTypes' => 'required|integer|min:1',
            ],
            [
                'propertyTypes.required' => __('estimations.propertyTypes_required'),
                'propertyTypes.min' => __('estimations.propertyTypes_required')
            ]
        );

        $this->currentStep = 3;
        $this->setButtons();
    }

    public function thirdStepSubmit()
    {
        $validations = [
            'builtYear' => 'nullable|numeric|min:'.$this->minYear,
            'nbrRooms' => 'required|numeric|min:0',
            'surface' => 'required|numeric|min:9',
            'nbrWaterRoom' => 'nullable|numeric|min:0',
            'nbrBathRoom' => 'nullable|numeric|min:0',
        ];
        if ($this->propertyTypes == 1 || $this->propertyTypes == 2) {// if property type is villa or appartment
            $validations['nbrBedRooms'] = 'required|numeric|min:1';
            /*$validations['livingRoomSurface'] = 'required|numeric|min:9';*/
            $validations['livingSpace'] = 'nullable|numeric|min:0';
        }
        if ($this->propertyTypes == 12) { // conditions for property type = terrain
            $validations['nbrRooms'] = 'nullable|numeric|min:0';
        }

        $validatedData = $this->validate(
            $validations,
            [
                'builtYear.*' => __('estimations.builtYear_required'),
                'nbrRooms.*' => __('estimations.nbr_rooms_required'),
                'nbrBedRooms.*' => __('estimations.nbr_bed_rooms_required'),
                'surface.*' => __('estimations.surface_required'),
                'livingRoomSurface.*' => __('estimations.living_room_surface_required'),
                'nbrWaterRoom.*' => __('estimations.incorrect_values'),
                'nbrBathRoom.*' => __('estimations.incorrect_values'),
            ]
        );

        $this->currentStep = 4;
        $this->setButtons();
    }

    public function fourthStepSubmit()
    {
        $validatedData = $this->validate(
            [
                'heatingSystem' => 'nullable|numeric|min:0',
                'generalCondition' => 'nullable|numeric|min:0',
                'kitchenType' => 'nullable|numeric|min:0',
                'nbrParking' => 'nullable|numeric|min:0',
                'garageSpace' => 'nullable|numeric|min:0',
            ],
            [
                'heatingSystem.*' => __('estimations.incorrect_values'),
                'generalCondition.*' => __('estimations.incorrect_values'),
                'kitchenType.*' => __('estimations.incorrect_values'),
                'nbrParking.*' => __('estimations.incorrect_values'),
                'garageSpace.*' => __('estimations.incorrect_values'),
            ]
        );

        $this->currentStep = 5;
        $this->setButtons();
    }

    public function fifthStepSubmit()
    {
        $validatedData = $this->validate(
            [
                'commodities' => 'nullable|array',
                'commodities.*' => 'exists:commodities,id',
                'description' => 'nullable'
            ],
            [
                'commodities.*' => __('estimations.incorrect_values'),
            ]
        );

        $this->currentStep = 6;
        $this->setButtons();
    }

    public function sixthStepSubmit()
    {
        $validatedData = $this->validate(
            [
                'user_email' => 'required|email',
                'phoneNumber' => 'nullable|string',
                'conditionsChecked' => 'nullable|integer'
            ],
            [
                'user_email.required' => __('estimations.provide_email'),
                'user_email.email' => __('estimations.invalid_email'),
                'conditionsChecked.nullable' => __('estimations.incorrect_values')
            ]
        );

        $this->currentStep = 7;
        $this->setButtons();
    }

    /**
     * Write code on Method
     * @throws ValidationException
     */
    public function submitForm()
    {
        $user = User::firstOrCreate(
            ['email' => $this->user_email],
            [
                'name' => Str::of($this->user_email)->explode('@')[0],
                'first_name' => Str::of($this->user_email)->explode('@')[0],
                'phone_number' => $this->phoneNumber,
                'password' => Hash::make('password')
            ]
        );

        $estimation = Estimation::create([
            'address' => $this->address,
            'property_type_id' => $this->propertyTypes,
            'user_id' => $user->id,
            'built_year' => $this->builtYear,
            'nbr_rooms' => $this->nbrRooms,
            'nbr_bed_rooms' => $this->nbrBedRooms,
            'surface' => $this->surface,
            'living_space' => $this->propertyTypes == 2 ? $this->livingSpace : 0,
            'living_room_surface' => $this->propertyTypes == 2 ? $this->livingRoomSurface : 0,
            'nbr_water_room' => $this->nbrWaterRoom,
            'nbr_bathroom' => $this->nbrBathRoom,
            'commodities' => json_encode($this->commodities),
            'heating_system' => $this->heatingSystem,
            'general_condition' => $this->generalCondition,
            'kitchen_type' => $this->kitchenType,
            'nbr_parking' => $this->propertyTypes == 2 ? $this->nbrParking : 0,
            'garage_space' => $this->propertyTypes == 1 ? $this->garageSpace : 0,
            'description' => $this->description,
            'phone_number' => $this->phoneNumber,
            'status' => Estimation::STATUS_PENDING
        ]);

        $estimation->commodities()->sync($this->commodities);

        $this->successMsg = __('estimations.estimation_created');

        (new EstimationRequestNotifications($estimation))->dispatch($estimation);

        return redirect()->route('estimation-created', $estimation->ref);
    }

    /**
     * Write code on Method
     */
    public function back()
    {
        $this->currentStep  = $this->currentStep > 1 ? --$this->currentStep : 1;
        $this->setButtons();
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
                6 => 'sixthStepSubmit',
                7 => 'submitForm',

                default => 'firstStepSubmit'
        };
    }
}
