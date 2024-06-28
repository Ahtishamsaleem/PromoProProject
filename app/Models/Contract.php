<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'contract_name',
        'uploaded_on',
        'uploaded_by',
    ];

    protected $dates = [
        'uploaded_on',
    ];
}
