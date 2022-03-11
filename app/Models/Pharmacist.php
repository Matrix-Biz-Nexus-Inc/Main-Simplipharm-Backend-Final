<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacist extends Model
{
    use HasFactory;

    protected $fillable = [
            'first_name',
            'middle_name',
            'last_name',
            'school',
            'license_number',
            'license_image',
            'license_verified',
            'department',
            'date_hired'
    ];

    protected $casts = [
        'date_hired' => 'datetime:Y-m-d',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
