<?php

namespace OBS\Http\Requests\Appointments;

use OBS\Http\Requests\Request;
class AANRequest extends Request
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
            'appointment_id' => 'required',
            'notes' => 'required|max:500'
        ];
        return $rules;
    }
}
