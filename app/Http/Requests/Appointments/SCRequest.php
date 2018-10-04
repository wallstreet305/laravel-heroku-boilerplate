<?php

namespace OBS\Http\Requests\Appointments;

use OBS\Http\Requests\Request;
class SCRequest extends Request
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
            'title' => 'required',
            'contact_number' => 'required'
        ];
        return $rules;
    }
}
