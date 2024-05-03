<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CosmeticsAppointment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'customer_id',
        'pet_name',
        'pet_type',
        'treatment_type',
        'treatment_duration',
        'appointment_date',
        'dogsize',
        'animaltype',
        'fur'
    ];

    /**
     * @return BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}