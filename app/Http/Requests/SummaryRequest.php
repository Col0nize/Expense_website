<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SummaryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'month' => 'nullable|integer|between:1,12', // Make 'month' optional
            'year' => 'nullable|integer|min:1990|max:' . now()->year, // Optional year filter
            'min' => 'nullable|numeric|min:0', // Optional minimum amount
            'max' => 'nullable|numeric|gte:min', // Optional maximum amount
        ];
    }

    public function messages(): array
    {
        return [
            'month.integer' => 'Please select a valid month.',
            'year.integer' => 'Please select a valid year.',
            'min.numeric' => 'Minimum expense must be a valid number.',
            'max.numeric' => 'Maximum expense must be a valid number.',
            'max.gte' => 'Maximum expense must be greater than or equal to minimum expense.',
        ];
    }
}
