<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class DiscountStoreRequest extends FormRequest
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
            'category' => 'required|string|min:2',
            'min_age' => 'required|int',
            'max_age' => 'required|int',
            'discount' => 'required|int',
        ];
    }

    /**
     * @inheritDoc
     */
    public function messages(): array
    {
        return [
            'category.required' => 'Categorie is verplicht.',
            'min_age.required' => 'Minimum leeftijd is verplicht.',
            'max_age.required' => 'Maximum leeftijd is verplicht.',
            'discount.required' => 'Korting is verplicht.',
        ];
    }
}
