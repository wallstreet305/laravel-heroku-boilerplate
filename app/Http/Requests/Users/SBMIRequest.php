<?php

namespace OBS\Http\Requests\Users;

use OBS\Http\Requests\Request;

class SBMIRequest extends Request
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
            'height' => 'required|numeric',
            'start_weight' => 'required|numeric',
            'age' => 'required|integer',
            'email' => 'required|email|string'
        ];
        return $rules;
    }

    public function messages()
    {
        return [];
    }
}
