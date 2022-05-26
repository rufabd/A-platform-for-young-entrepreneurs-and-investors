<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FounderPostRequest extends FormRequest
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
        return [
            'founder_id' => ['required'],
            'hiring_tag_id' => ['required'],
            'industry_tag_id' => ['required'],
            'title' => ['required', 'string'],
            'organization_description' => ['required'],
            'post_description' => ['required'],
            'country' => ['required'],
            'city' => ['required'],
            'organization' => ['required'],
            'organization_year' => ['required'],
            'project_stage' => ['required'],
            'hours_per_week' => ['required'],
            'type_week' => ['required'],
            'investment' => ['required'],
        ];
    }
}
