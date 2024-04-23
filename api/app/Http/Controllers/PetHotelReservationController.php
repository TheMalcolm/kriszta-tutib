<?php

namespace App\Http\Controllers;

use App\Http\Requests\PetHotelReservationStoreRequest;
use App\Http\Resources\PetHotelReservationResource;
use App\Http\Resources\PetHotelReservationResourceCollection;
use App\Models\PetHotelReservation;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PetHotelReservationController extends Controller
{
    /**
     * @param PetHotelReservationStoreRequest $request
     * 
     * @return PetHotelReservationResource
     */
    public function store(PetHotelReservationStoreRequest $request): PetHotelReservationResource
    {
        $petHotelReservation = PetHotelReservation::create([
            'owner_name' => $request->get('ownerDetails')['name'],
            'email' => $request->get('ownerDetails')['email'],
            'phone' => $request->get('ownerDetails')['phone'],
            'stay_from' => Carbon::parse($request->get('interval')[0])->addDay()->format('Y-m-d'),
            'stay_till' => Carbon::parse($request->get('interval')[1])->addDay()->format('Y-m-d'),
            'pets' => $request->get('entries'),
            'total' => $request->get('total'),
        ]);

        return new PetHotelReservationResource($petHotelReservation);
    }

    /**
     * @param Request $request
     * 
     * @return PetHotelReservationResourceCollection
     */
    public function list(Request $request): PetHotelReservationResourceCollection
    {
        return new PetHotelReservationResourceCollection(PetHotelReservation::orderBy('id', 'desc')->paginate(4));
    }

    /**
     * @param PetHotelReservation $petHotelReservation
     * 
     * @return void
     */
    public function destroy(string $petHotelReservationId): void
    {
        $petHotelReservation = PetHotelReservation::findOrFail($petHotelReservationId);
        $petHotelReservation->delete();
    }

    /**
     * @param Request $request
     * 
     * @return JsonResponse
     */
    public function getSpacesAvailable(Request $request): JsonResponse
    {
        $maxOccupancy = 0;

        $from = Carbon::parse($request->get('interval')[0])->addHours(2)->format('Y-m-d');
        $till = Carbon::parse($request->get('interval')[1])->addHours(2)->format('Y-m-d');
        $period = new CarbonPeriod($from, '1 day', $till);

        foreach($period as $day) {
            $reservationsCounter = PetHotelReservation::query()
                ->where('stay_from', '<=', $day)
                ->where('stay_till', '>=', $day)
                ->count();

            if($reservationsCounter > $maxOccupancy) {
                $maxOccupancy = $reservationsCounter;
            }
        }

        return new JsonResponse([
            'occupancy' => $maxOccupancy,
            'maxPetsAllowed' => PetHotelReservation::$maxPetsAllowed
        ]);
    }

    /**
     * @return JsonResponse
     */
    public function getReservedIntervals(): JsonResponse
    {
        $occupancies = [];
        $from = Carbon::now()->format('Y-m-d');
        $till = Carbon::now()->addMonths(2)->format('Y-m-d');

        $period = new CarbonPeriod($from, '1 day', $till);
        $reservations = PetHotelReservation::query()
            ->where('stay_till', '>=', $from)
            ->orWhere('stay_from', '<=', $till)->get();

        foreach($period as $day) {
            $day = $day->format('Y-m-d');
            $occupancies[$day] = $reservations
                ->where('stay_from', '<=', $day)
                ->where('stay_till', '>=', $day)
                ->count();
        }

        $disabledDates = collect($occupancies)->filter(function($item) {
            return $item >= PetHotelReservation::$maxPetsAllowed;
        })->keys()->toArray();

        return new JsonResponse([
            'occupancy' => $occupancies,
            'disabledDates' => $disabledDates,
            'maxPetsAllowed' => PetHotelReservation::$maxPetsAllowed,
            'lastBookableDate' => $till
        ]);
    }
}
