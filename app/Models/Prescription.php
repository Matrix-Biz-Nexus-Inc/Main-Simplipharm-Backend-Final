<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

        protected $fillable = [
            'title',
            'type',
            'src',
            'pharmId',
            'clientId',
            'location',
            'rx_number'
    ];
}
