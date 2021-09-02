<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


//FORSE NON MI SERVE A NIENTE
class StepCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true; //OGNI PERSONA E' AUTORIZZATA A USARE QUESTA REQUEST-RULE
    }


    public function rules()
    {
        return [
            'name' => 'required|max:255'
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'Devi inserire un nome!!!',
            'name.max' => 'Nome non oltre i 255 caratteri!!!',
        ];
    }
}
