<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //OGNI PERSONA E' AUTORIZZATA A USARE QUESTA REQUEST-RULE
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255'
        ];
    }


    public function messages()
    {
        return [
            'title.required' => 'Devi inserire un titolo!!!',
            'title.max' => 'Non oltre i 255 caratteri!!!',
        ];
    }
}
