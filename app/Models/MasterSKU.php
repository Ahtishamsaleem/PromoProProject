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
}
