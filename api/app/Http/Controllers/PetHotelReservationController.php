<?php

namespace App\Http\Controllers;

use App\Http\Requests\PetHotelReservationStoreRequest;
use App\Http\Resources\PetHotelReservationResource;
use App\Http\Resources\PetHotelReservationResourceCollection;
use App\Models\PetHotelReservation;
use Carbon\Carbon;
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
}
