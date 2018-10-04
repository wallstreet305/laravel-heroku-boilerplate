<?php

namespace OBS\Http\Requests\Users;

use OBS\Http\Requests\Request;

class UUPRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'latitude' => 'required',
            'longitude' => 'required',
            'phone' => 'required',
            'due_date_calc_flag' => 'required|integer',
            'first_day_last_period' => 'required_if:due_date_calc_flag,1|string',
            'cycle_length' => 'required_if:due_date_calc_flag,1|integer',
            'conceive_date' => 'required_if:due_date_calc_flag,2|string'
        ];
        return $rules;
    }

    public function messages()
    {
        return [];
    }
}
