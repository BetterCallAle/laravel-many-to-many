<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
            'type_id' => ['nullable', 'exists:types,id'],
            'title' => ['required', 'max:150', Rule::unique('projects')->ignore($this->project)],
            'description' => ['nullable', 'max:300'],
            'cover_path' => ['nullable', 'image', 'max:255'],
            'technologies' => ['nullable', 'exists:technologies,id']
        ];
    }

    public function messages(){
        return [
            'type_id' => 'La tipologia inserita non è valida',
            'title.required' => 'Il titolo è obbligatorio',
            'title.max' => 'Il titolo può avere massimo 150 caratteri',
            'title.unique' => 'Esiste già un progetto con questo titolo',
            'description.max' => 'La descrizione può avere massimo 300 caratteri',
            'cover_path.image' => 'Il file della cover deve essere un file di tipo immagine',
            'cover_path.max' => 'Il file della cover può essere grande massimo 255kb'
        ];
    }
}
