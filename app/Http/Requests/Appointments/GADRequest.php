<?php

namespace OBS\Http\Requests\Appointments;

use OBS\Http\Requests\Request;

class GADRequest extends Request
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
        $return = [
            'appointment_id' => 'required'
        ];

        return $return;
    }
}
