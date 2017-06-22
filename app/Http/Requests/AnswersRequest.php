<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnswersRequest extends FormRequest
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
//        dd($this->except('_token', 'survey_id'));
        foreach($this->except('_token', 'survey_id') as $key => $value) {
                $rules[$key] = 'required';
        }
        return $rules;
    }

}
