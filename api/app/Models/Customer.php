<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
    ];

    /**
     * @return HasMany
     */
    public function cosmeticsAppointments(): HasMany
    {
        return $this->hasMany(CosmeticsAppointment::class);
    }
    
    /**
     * @return HasMany
     */
    public function petHotelReservations(): HasMany
    {
        return $this->hasMany(PetHotelReservation::class);
    }
}