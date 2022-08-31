<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UuidTrait;

class Borrower extends Model
{
    use UuidTrait;

    protected $casts = [
        'steps' => 'array',
      ];

    protected $fillable = [
        'monthly_sales',
        'monthly_expenses',
        'other_financing',
        'other_financing_amount',
        'legal_business_name',
        'business_physical_address',
        'business_physical_city',     
        'business_physical_province',
        'business_physical_postal',
        'email',
        'dob'  
    ];
}
