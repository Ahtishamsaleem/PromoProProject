<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_code',
        'customer_name',
        'customer_company_code',
        'customer_status',
        'customer_channel',
        'customer_sub_channel',
        'customer_address',
        'contact_person',
        'contact_number',
        'email',
        'cnic',
        'cnic_expiry',
    ];

    protected static function newFactory()
    {
        return \Database\Factories\CustomerFactory::new();
    }
    public function contracts()
    {
        return $this->hasMany(Contract::class, 'customer_id');
    }
}
