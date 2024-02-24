<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PageRequest extends FormRequest
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
        $page = $this->page->id ?? '';

        return [
            'name' => 'required|max:255|'.Rule::unique('pages')->ignore($page),
            'content' => 'required|min:10',
            'images' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ];
    }
}
