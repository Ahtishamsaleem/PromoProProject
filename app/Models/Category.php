<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    protected $fillable = [
        'business_unit_id',
        'category_name',
        'category_company_code',
        'status',
    ];

    // Define the relationship
    public function businessUnit()
    {
        return $this->belongsTo(BusinessUnit::class);
    }
}
