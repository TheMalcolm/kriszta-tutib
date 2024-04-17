<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PetHotelReservationResource extends JsonResource
{
    /**
     * The "data" wrapper that should be applied.
     *
     * @var string
     */
    public static $wrap = 'petHotelReservation';

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'owner_name' => $this->owner_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'stay_from' => $this->stay_from,
            'stay_till' => $this->stay_till,
            'pets' => $this->pets,
            'pets_count' => count($this->pets),
            'total' => $this->total,
            'created_at' => $this->created_at,
            'stayLengthDays' => Carbon::parse($this->stay_from)->diffInDays(Carbon::parse($this->stay_till))
        ];
    }
}
