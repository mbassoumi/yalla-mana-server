<?php

namespace App\Http\Requests;

use App\Http\Requests\Request as FormRequest;

class CarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $car = $this->route('car');

        $rules = [];

        if ($this->isStore()) {
            // validation rule for create request.
        }

        if ($this->isUpdate()) {
            // Validation rule for update request.
        }

        if ($this->isStore() || $this->isUpdate()) {

        }
        return $rules;
    }
}
