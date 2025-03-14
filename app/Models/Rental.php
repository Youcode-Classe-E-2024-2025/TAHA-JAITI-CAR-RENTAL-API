<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    //

    protected $fillable = [
        'car_id', 'user_id', 'start_date', 'end_date'
    ];
}
