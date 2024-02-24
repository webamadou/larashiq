<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
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
        $post = $this->post->id ?? '';

        return [
            'name' => 'required|max:255|'.Rule::unique('posts')->ignore($post),
            'content' => 'required|min:10',
            'category_id' => 'required|integer|exists:post_categories,id',
            'images' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ];
    }
}
