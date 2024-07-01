<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkuRequest extends FormRequest
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
            'master_sku_id' => 'required|exists:master_skus,id',
            'sku_name' => 'required|string|max:255',
            'sku_company_code' => 'nullable|string|max:255',
            'pack_type' => 'nullable|string|max:255',
            'variant' => 'nullable|string|max:255',
            'pack_size' => 'nullable|string|max:255',
            'attribute' => 'nullable|string|max:255',
            'sub_attribute' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive',
        ];
    }
}
