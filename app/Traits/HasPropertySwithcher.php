<?php

namespace App\Traits;

use App\Models\Property;
use Illuminate\Database\Eloquent\Model;

trait HasPropertySwithcher
{
    public string $columnName = '';
    public int $columnValue = 0;
    public $modelObject;

    public function swithcher(string $columnName, int $id)
    {
        $this->modelObject = Property::find($id);

        if ($this->modelObject) {
            $this->columnName = $columnName;

            return view('layouts.partial.datatable-actions.bo-switcher')
                ->with('modelObject', $this->modelObject)
                ->with('columnValue', $this->modelObject->$columnName);
        }
    }

    public function toggleSwitch($modelObject)
    {
        $property = Property::find($modelObject['id']);
        $column = $this->columnName;
        $property->$column = $property->$column === 1 ? 0 : 1;

        $property->save();
    }
}
