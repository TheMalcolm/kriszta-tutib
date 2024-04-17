<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PetHotelReservation extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'owner_name',
        'email',
        'phone',
        'stay_from',
        'stay_till',
        'pets',
        'total',
    ];

    protected $casts = [
        'pets' => 'array'
    ];
}