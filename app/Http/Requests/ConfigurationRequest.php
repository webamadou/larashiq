<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfigurationRequest extends FormRequest
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
        return [
            'bilboard_title' => 'nullable|max:500',
            'bilboard_subtitle' => 'nullable|max:500',
            'official_email_address' => 'nullable|max:500',
            'home_video_title' => 'nullable|max:500',
            'home_video_subtitle' => 'nullable|max:1024',
            'home_video_embed_code' => 'nullable',
            'facebook_link' => 'nullable|max:500',
            'twiter_link' => 'nullable|max:500',
            'instagram_link' => 'nullable|max:500',
            'linkedin_link' => 'nullable|max:500',
            'header address' => 'nullable|max:500',
            'official_phone_nums' => 'nullable|max:500',
            'customer_space_url' => 'nullable|max:500',
            'home_bloc_one_video' => 'nullable',
        ];
    }
}
