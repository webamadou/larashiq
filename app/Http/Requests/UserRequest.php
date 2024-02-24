<?php

namespace App\Http\Requests;

use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $nullableIfADmin = Auth::user()->hasRole('super-admin') ? 'nullable' : 'required';
        $currentUser = $this->user->id ?? '';

        return [
            'name' => 'required|max:255',
            'first_name' => 'required|max:255',
            'email' => 'required|email|'.Rule::unique('users')->ignore($currentUser),
            'roles' => 'array',
            'gender' => 'required|integer'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('users.message_required_field', ['field' => "Nom de l'utilisateur"]),
            'name.max.string' => __('users.message_input_max_length', ['nbr' => 255, 'input' => 'name']),
            'first_name.required' => __('users.message_required_field'),
            'first_name.max' => __('users.message_input_max_length', ['nbr' => 255, 'input' => 'first_name']),
            'email.required' => __('users.message_required_field', ['field' => 'email']),
            'email.email' => __('users.message_bad_email_format'),
            'email.unique' => __('users.message_email_unique'),
            'roles.required' => __('users.message_at_least_one_role', ['field' => 'des roles']),
            'roles.array' => __('users.message_bad_role_format'),
            'gender.required' => __('users.message_required_field', ['field' => 'gender']),
            'gender.integer' => __('users.message_bad_gender_format'),
        ];
    }
}
