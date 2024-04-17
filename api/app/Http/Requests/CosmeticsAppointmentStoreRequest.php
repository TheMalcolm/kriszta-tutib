<?php

namespace App\Http\Requests;

use Pearl\RequestValidate\RequestAbstract;

class CosmeticsAppointmentStoreRequest extends RequestAbstract
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
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'pet' => 'required',
            'servicetype' => 'required',
            'animaltype' => 'required',
            'dogsize' => 'required',
            'length' => 'required',
            'selectedDate' => 'required',
            'selectedTime' => 'required',
            'gdprAccepted' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'phone' => 'telefonszám',
            'pet' => 'kisállat neve',
            'servicetype' => 'szolgáltatás típusa',
            'animaltype' => 'kisállat fajtája',
            'dogsize' => 'kisállat mérete',
            'length' => 'szőr hosszúság',
            'selectedDate' => 'dátum',
            'selectedTime' => 'időpont'
        ];
    }
}
