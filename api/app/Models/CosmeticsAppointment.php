<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CosmeticsAppointment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'owner_name',
        'email',
        'phone',
        'pet_name',
        'pet_type',
        'treatment_type',
        'options',
        'appointment_date',
    ];

    protected $casts = [
        'options' => 'array'
    ];
}