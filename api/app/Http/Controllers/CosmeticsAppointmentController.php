<?php

namespace App\Http\Controllers;

use App\Http\Requests\CosmeticsAppointmentStoreRequest;
use App\Http\Resources\CosmeticsAppointmentResource;
use App\Models\CosmeticsAppointment;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
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
            'treatment_duration' => $request->get('treatmentDuration'),
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

    /**
     * @param Request $request
     * 
     * @return JsonResponse
     */
    public function getBookedAppointments(Request $request): JsonResponse
    {
        $selectedDate = $request->get('selectedDate');
        $bookedAppointments = new Collection([]);
        $cosmeticsAppointments = CosmeticsAppointment::query()
            ->whereRaw('appointment_date LIKE ?', ["{$selectedDate}%"])
            ->orderBy('appointment_date', 'ASC')
            ->get();

        foreach($cosmeticsAppointments as $appointment) {
            $treatmentDurationMultiplier = ($appointment->treatment_duration / 30) - 1;
            $bookedAppointments->push(Carbon::parse($appointment->appointment_date)->format('H:i'));

            if($treatmentDurationMultiplier > 0) {
                for($i = 0; $i < $treatmentDurationMultiplier; $i++) {
                    $bookedAppointments->push(Carbon::parse($appointment->appointment_date)->addMinutes(30 * ($i + 1))->format('H:i'));
                }
            }
        }

        return new JsonResponse($bookedAppointments->unique()->values());
    }
}
