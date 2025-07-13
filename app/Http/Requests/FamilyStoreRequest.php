<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class FamilyStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return boolean
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:2',
            'address' => 'required|string|min:4|unique:families,address',
        ];
    }

    /**
     * @inheritDoc
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Naam is verplicht.',
            'address.required' => 'Adres is verplicht.',
            'name.min' => 'Naam moet minstens 2 karakters lang zijn.',
            'address.min' => 'Adres moet minstens 4 karakters lang zijn.',
            'address.unique' => 'Dit adres is al in gebruik.',
        ];
    }
}
