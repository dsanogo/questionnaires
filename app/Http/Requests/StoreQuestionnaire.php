<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionnaire extends FormRequest
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
            'title' => 'required|min:3|max:100',
            'purpose' => 'required|min:3|max:50'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Hey, give me a title please',
            'title.min' => 'Hey, title needs to be at least 3 chars',
            'purpose.required' => 'Humm, people might not know why you are creating this questionnaire',
            'purpose.min' => "Hey, why don't you give it more chars?"
        ];
    }
}
