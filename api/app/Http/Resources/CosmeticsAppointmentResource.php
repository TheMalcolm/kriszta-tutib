<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CosmeticsAppointmentResource extends JsonResource
{
    /**
     * The "data" wrapper that should be applied.
     *
     * @var string
     */
    public static $wrap = 'cosmeticsAppointment';

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'owner_name' => $this->customer->name,
            'email' => $this->customer->email,
            'phone' => $this->customer->phone,
            'pet_name' => $this->pet_name,
            'pet_type' => $this->animaltype,
            'treatment_type' => $this->treatment_type,
            'options' => [
                'dogsize' => $this->dogsize,
                'animaltype' => $this->animaltype,
                'fur' => $this->fur,
            ],
            'appointment_date' => $this->appointment_date,
            'created_at' => $this->created_at,
            'appointment_time' => Carbon::parse($this->appointment_date)->format('H:i')
        ];
    }
}
