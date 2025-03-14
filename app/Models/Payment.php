<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{


    protected $fillable = [
        'amount', 'user_id', 'rental_id'
    ];
}