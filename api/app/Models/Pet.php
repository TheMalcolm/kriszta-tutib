<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pet extends Model
{
    protected $fillable = [
        'pet_hotel_reservation_id',
        'name',
        'type',
        'comments',
        'cosmetics',
        'physiotherapy',
        'extraLongWalking',
    ];

    /**
     * @return BelongsTo
     */
    public function petHotelReservation(): BelongsTo
    {
        return $this->belongsTo(PetHotelReservation::class);
    }
}