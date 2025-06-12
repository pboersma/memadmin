<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class MemberTypeUpdateRequest extends FormRequest
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
            'description' => 'required|string|min:2',
        ];
    }

    public function messages(): array
    {
        return [
            'description.required' => 'Beschrijving is verplicht.',
            'description.min' => 'Beschrijving moet minstens 2 karakters lang zijn.',
        ];
    }
}
