<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

        protected $fillable = [
           'username',
            'first_name',
            'middle_name',
            'last_name',
            'address',
            'email',
            'phone'
    ];
}
