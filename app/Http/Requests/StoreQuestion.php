<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestion extends FormRequest
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
            'question.question' => 'required|string|min:5|max:255',
            'answers.*.answer' => "required|string|min:5|max:255"
        ];
    }

    public function messages()
    {
        return [
            'question.question.required' => "Please enter the question",
            'question.question.string' => "Why don't you give me something realistic",
            'question.question.min' => "I am not sure people will get this. Add more!!!",
            'question.question.max' => "Please do not exceed the 255 chars",

            'answers.*.answer.required' => "Please enter the choide",
            'answers.*.answer.string' => "Why don't you give me something realistic",
            'answers.*.answer.min' => "I am not sure people will get this. Add more!!!",
            'answers.*.answer.max' => "Please do not exceed the 255 chars"
        ];
    }
}
