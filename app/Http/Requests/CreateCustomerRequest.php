<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCustomerRequest extends FormRequest
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
            'customer_code' => 'required|unique:customers,customer_code',
            'customer_name' => 'required',
            'customer_company_code' => 'required',
            'customer_status' => 'required|in:active,inactive',
            'customer_channel' => 'required',
            'customer_sub_channel' => 'required',
            'customer_address' => 'required',
            'contact_person' => 'nullable',
            'contact_number' => 'nullable',
            'email' => 'nullable|email',
            'cnic' => 'nullable',
            'cnic_expiry' => 'nullable|date',
        ];
    }
}
