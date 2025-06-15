<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class FamilyMemberUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
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
            'birthdate' => 'required|date',
            'member_type' => 'required|string',
            'family_id' => 'required|int',
            'member_type_id' => 'required|int',
        ];
    }

    /**
     * @inheritDoc
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Naam is verplicht.',
            'birthdate.required' => 'Geboortedatum is verplicht.',
            'member_type.required' => 'Rol is verplicht.',
            'family_id.required' => 'Familie is verplicht.',
            'member_type_id.required' => 'Lidmaatschap is verplicht.',
            'name.min' => 'Naam moet minstens 2 karakters lang zijn.',
            'birthdate.date' => 'Geboortedatum is ongeldig.',
        ];
    }
}
