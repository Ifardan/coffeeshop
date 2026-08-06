<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'customer_name',
        'phone',
        'table_number',
        'reservation_date',
        'reservation_time',
        'status'
    ];
}