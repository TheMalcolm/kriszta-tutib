<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PetHotelReservation extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'customer_id',
        'stay_from',
        'stay_till',
        'total',
    ];

    /**
     * @var int
     */
    public static $maxPetsAllowed = 6;

    /**
     * @return HasMany
     */
    public function pets(): HasMany
    {
        return $this->hasMany(Pet::class);
    }

    /**
     * @return BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }


    /**
     * @return int
     */
    public function getPetsCountAttribute(): int
    {
        return count($this->pets);
    }

}