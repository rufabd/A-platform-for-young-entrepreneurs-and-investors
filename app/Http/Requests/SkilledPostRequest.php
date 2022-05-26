<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkilledPostRequest extends FormRequest
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
            'skilled_id' => ['required'],
            'hiring_tag_id' => ['required'],
            'industry_tag_id' => ['required'],
            'title' => ['required', 'string'],
            'post_desciption' => ['required'],
            'country' => ['required'],
            'city' => ['required'],
            'hours_per_week' => ['required'],
            'type' => ['required'],
        ];
    }
}
