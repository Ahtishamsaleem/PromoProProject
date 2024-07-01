<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MasterSkuRequest extends FormRequest
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
            'business_unit_id' => 'required|exists:business_units,id',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'master_sku_name' => 'required|string|max:255',
            'master_sku_company_code' => 'nullable|string|max:255',
            'attribute' => 'nullable|string|max:255',
            'sub_attribute' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive',
        ];
    }
}
