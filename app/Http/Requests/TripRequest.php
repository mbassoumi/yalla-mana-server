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

            /*if ($this->user()->type == 'driver' and $this->user()->status =='active'){
                return true;
            }
            return false;*/
        }

        if (\Request::is('*/request')){
            return \Auth::user()->can('requestTrip', Trip::class);

            /*if ($this->user()->status =='active'){
                return true;
            }
            return false;*/
        }


        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $trip = $this->route('trip');

        $rules = [];

        if ($this->isStore()) {
            // validation rule for create request.
            $rules['from_city_id'] = 'required';
            $rules['to_city_id'] = 'required';
            $rules['date'] = 'required';
            $rules['price'] = 'required';
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
