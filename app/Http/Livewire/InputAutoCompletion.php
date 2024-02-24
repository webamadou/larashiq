<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use App\Traits\AutocompletionRequests;

class InputAutoCompletion extends Component
{
    use AutocompletionRequests;

    public $inputDisplayingValue;
    public $inputSavingValue = '';
    public $inputName;
    public $modelName;
    public $model;
    public $modelLabelColumns;
    public $optionsVisible = false;
    public $userId;
    public $modelOptions;
    public $inputLabel = 'Propriétaire *';
    public int $minChar = 3;
    public string $searchMethod = '';

    public $user;

    protected $rules = [
        'users.*.id' => '',
        'users.*.name' => '',

        'user.id' => '',
        'user.name' => '',
    ];

    public function mount()
    {
        $this->modelOptions = [];
        $this->model = $this->modelName::find($this->inputSavingValue) ?? new $this->modelName();
        $this->inputDisplayingValue = $this->buildModelLabel();
    }

    public function updatedModelId()
    {
        $this->user = $this->model::find($this->userId);
    }

    public function updatedInputDisplayingValue()
    {
        if (strlen($this->inputDisplayingValue) >= $this->minChar) {
            $this->optionsVisible = true;
            $this->getModelOptions();
        }
    }


    public function getModelOptions()
    {
        if (method_exists(AutocompletionRequests::class, $this->searchMethod)) {
            $methodName = $this->searchMethod;
            $this->modelOptions = $this->$methodName($this->inputDisplayingValue);
        }
    }

    public function setNewValue($id)
    {
        $this->optionsVisible = false;
        if ($this->model = $this->modelName::find($id)) {
            $this->inputSavingValue = $id;
            $this->inputDisplayingValue = $this->model->first_name.' '.$this->model->name;
        }
    }

    public function hideOptions()
    {
        $this->setNewValue($this->inputSavingValue);
    }

    public function buildModelLabel()
    {
        $response = [];
        $columns = explode(',', $this->modelLabelColumns);
        if (! is_iterable($columns)) {
            return '';
        }

        foreach ($columns as $column) {
            $column = trim($column);
            $response[] = $this->model?->$column;
        }

        return implode(' ', $response);
    }

    public function render()
    {
        return view('livewire.input-auto-completion');
    }
}
