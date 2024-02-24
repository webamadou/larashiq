<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $city = $this->city->id ?? '';

        return [
            'name' => 'required|max:255|'.Rule::unique('cities')->ignore($city),
            'country_id' => 'required|integer|exists:countries,id'
        ];
    }
}
