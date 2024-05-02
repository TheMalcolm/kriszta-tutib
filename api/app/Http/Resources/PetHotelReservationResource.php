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
            'owner_name' => $this->customer->name,
            'email' => $this->customer->email,
            'phone' => $this->customer->phone,
            'stay_from' => $this->stay_from,
            'stay_till' => $this->stay_till,
            'pets' => $this->pets->map(function($item){
                return [
                    'name' => $item->name,
                    'type' => $item->type,
                    'comments' => $item->comments,
                    'extraFeatures' => [
                        'cosmetics' => $item->cosmetics,
                        'physiotherapy' => $item->extraLongWalking,
                        'extraLongWalking' => $item->physiotherapy,
                    ]
                ];
            }),
            'pets_count' => count($this->pets),
            'total' => $this->total,
            'created_at' => $this->created_at,
            'stayLengthDays' => Carbon::parse($this->stay_from)->diffInDays(Carbon::parse($this->stay_till))
        ];
    }
}
