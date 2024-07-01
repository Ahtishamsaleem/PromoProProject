<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SKU extends Model
{
    use HasFactory;

    protected $table = 'skus';

    protected $fillable = [
        'manufacturer_id',
        'business_unit_id',
        'category_id',
        'brand_id',
        'master_sku_id',
        'sku_name',
        'sku_company_code',
        'pack_type',
        'variant',
        'pack_size',
        'attribute',
        'sub_attribute',
        'status',
    ];

    // Define the relationships
    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function businessUnit()
    {
        return $this->belongsTo(BusinessUnit::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function masterSKU()
    {
        return $this->belongsTo(MasterSKU::class, 'master_sku_id');
    }
}
