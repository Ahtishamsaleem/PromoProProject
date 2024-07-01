<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterSKU extends Model
{
    use HasFactory;
    
    protected $table = 'master_skus';

    protected $fillable = [
        'manufacturer_id',
        'business_unit_id',
        'category_id',
        'brand_id',
        'master_sku_name',
        'master_sku_company_code',
        'attribute',
        'sub_attribute',
        'status',
    ];

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
   
}
