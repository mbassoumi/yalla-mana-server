<?php

namespace App\Http\Requests;

use App\Models\Trip;
use App\Http\Requests\Request as FormRequest;
use Illuminate\Validation\Rule;

class TripRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $trip = Trip::find($this->route('trip'));


        if (\Request::is('*/offer')){
            return \Auth::user()->can('offerTrip', Trip::class);
        }

        if (\Request::is('*/request')){
            return \Auth::user()->can('requestTrip', Trip::class);
        }

        if ($this->isDelete()){
            return $trip and $this->user()->can('delete', $trip);
        }

        if ($this->isUpdate()){
            return $trip and $this->user()->can('update', $trip);
        }

        if (\Request::is('*/reserve')){
            return $trip and $this->user()->can('reserveTrip', $trip);
        }

        if (\Request::is('*/cancel-reservation')){
            return $trip and $this->user()->can('cancelReservation', $trip);
        }

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
//        $trip = $this->route('trip');

        $rules = [];

        if (\Request::is('*/reserve') or \Request::is('*/cancel-reservation') ){
            return [];
        }

        if ($this->isStore()) {
            // validation rule for create request.
            $rules['from_city_id'] = 'required';
            $rules['to_city_id'] = 'required';
            $rules['date'] = 'required';
            $rules['price'] = 'required';
            $rules['seats_number'] = 'required';
            $rules['status'] = [
                'required',
                Rule::in(['offered', 'requested']),
            ];

        }

        if ($this->isUpdate()) {
            // Validation rule for update request.
        }

        if ($this->isStore() || $this->isUpdate()) {

        }
        return $rules;
    }
}
