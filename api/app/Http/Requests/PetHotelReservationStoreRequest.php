<?php

namespace App\Http\Requests;

use Pearl\RequestValidate\RequestAbstract;

class PetHotelReservationStoreRequest extends RequestAbstract
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'total' => 'required',
            'ownerDetails.name' => 'required',
            'ownerDetails.email' => 'required|email',
            'ownerDetails.phone' => 'required',
            'gdprAccepted' => 'required|in:accepted',
            'entries' => 'required|min:1|array',
            'petCount' => 'required|min:1'
        ];
    }

    public function attributes(): array
    {
        return [
            'ownerDetails.name' => 'teljes név',
            'ownerDetails.email' => 'e-mail cím',
            'ownerDetails.phone' => 'telefonszám',
        ];
    }

    public function messages(): array
    {
        return [
            'gdprAccepted.in' => 'Az ÁSZF elfogadása kötelező az időpontfoglaláshoz!'
        ];
    }
}
