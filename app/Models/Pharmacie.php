<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacie extends Model
{
    use HasFactory;

        protected $fillable = [
            'company_name',
            'registered_name',
            'branch_code',
            'license_num',
            'address',
            'phone',
            'delivery',
            'paypal_email',
            'blockchain_ver',
            'contact_person',
            'contact_person_number',
            'area',
            'country',
            'state',
            'city',
            'country_id',
    ];
}
