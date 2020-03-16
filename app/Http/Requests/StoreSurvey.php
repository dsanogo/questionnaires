<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSurvey extends FormRequest
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
            'responses.*.answer_id' => 'required',
            'responses.*.question_id' => 'required',
            'survey.name' => 'required|string|min:5',
            'survey.email' => 'required|email'
        ];
    }

    public function messages()
    {
        return [
            'responses.*.answer_id.required' => 'Please select your choice',
            'responses.*.question_id.required' => 'Please select your choice',
            'survey.name.required' => 'Please enter your name',
            'survey.name.min' => 'Please enter your full name',
            'survey.email.required' => 'Please enter your email',
            'survey.email.email' => "Invalid email format"
        ];
    }
}
