<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class ContributionStoreRequest extends FormRequest
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
            'age' => 'required|int|min:1',
            'member_type' => 'required|string',
            'member_type_id' => 'required|int',
            'fiscal_year_id' => 'required|int',
            'amount' => 'required|decimal:0,2|min:0.01',
        ];
    }

    /**
     * @inheritDoc
     */
    public function messages(): array
    {
        return [
            'age.required' => 'Leeftijd is verplicht.',
            'member_type.required' => 'Lidmaatschap is verplicht.',
            'member_type_id.required' => 'Lidmaatschap is verplicht.',
            'fiscal_year_id.required' => 'Jaar is verplicht.',
            'amount.required' => 'Bedrag is verplicht.',
            'age.min' => 'Leeftijd moet minstens 1 zijn.',
            'amount.min' => 'Bedrag moet minstens 0.01 zijn.',
        ];
    }
}
