<?php

namespace App\Http\Controllers;

use App\Http\Requests\CosmeticsAppointmentStoreRequest;
use App\Http\Resources\CosmeticsAppointmentResource;
use App\Http\Resources\CosmeticsAppointmentResourceCollection;
use App\Models\CosmeticsAppointment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class CosmeticsAppointmentController extends Controller
{
    /**
     * @param CosmeticsAppointmentStoreRequest $request
     * 
     * @return CosmeticsAppointmentResource
     */
    public function store(CosmeticsAppointmentStoreRequest $request): CosmeticsAppointmentResource
    {
        $cosmeticsAppointment = CosmeticsAppointment::create([
            'owner_name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'pet_name' => $request->get('name'),
            'pet_type' => $request->get('pet'),
            'treatment_type' => $request->get('servicetype'),
            'options' => [
                'dogsize' => $request->get('dogsize'),
                'animaltype' => $request->get('animaltype'),
            ],
            'appointment_date' => $request->get('selectedDate') . ' ' . $request->get('selectedTime'),
        ]);

        return new CosmeticsAppointmentResource($cosmeticsAppointment);
    }

    /**
     * @param Request $request
     * 
     * @return JsonResource
     */
    public function list(Request $request): JsonResource
    {
        $payload = CosmeticsAppointment::query()
            ->where('appointment_date', '>', Carbon::now())
            ->orderBy('appointment_date', 'ASC')
            ->get()
            ->mapToGroups(function($item){
                return [Carbon::parse($item->appointment_date)->format('Y.m.d') => new CosmeticsAppointmentResource($item)];
            });

        return new JsonResource($payload);
    }

    /**
     * @param CosmeticsAppointment $cosmeticsAppointment
     * 
     * @return void
     */
    public function destroy(string $cosmeticsAppointmentId): void
    {
        $cosmeticsAppointment = CosmeticsAppointment::findOrFail($cosmeticsAppointmentId);
        $cosmeticsAppointment->delete();
    }
}
