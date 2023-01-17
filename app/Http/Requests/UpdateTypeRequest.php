<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTypeRequest extends FormRequest
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
            'name' => ['required', 'max:50', Rule::unique('types')->ignore($this->type)]
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Il nome della tipologia è obbligatorio',
            'name.max' => 'Il nome della tipologia può avere massimo 50 caratteri',
            'name.uinque' => 'Esiste già una tipologia con questo nome'
        ];
    }
}
