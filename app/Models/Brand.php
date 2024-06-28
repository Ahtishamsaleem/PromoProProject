<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brands';

    protected $fillable = [
        'business_unit_id',
        'category_id',
        'brand_name',
        'brand_company_code',
        'status',
    ];

    // Define the relationships
    public function businessUnit()
    {
        return $this->belongsTo(BusinessUnit::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
