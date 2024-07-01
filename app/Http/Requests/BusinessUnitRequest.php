<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusinessUnitRequest extends FormRequest
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
            'manufacturer_id' => 'required|exists:manufacturers,id',
            'business_unit_name' => 'required|string|max:255',
            'business_unit_company_code' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive',
        ];
    }
}
