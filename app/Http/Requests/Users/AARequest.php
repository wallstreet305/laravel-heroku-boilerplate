<?php

namespace OBS\Http\Requests\Users;

use OBS\Http\Requests\Request;

class AARequest extends Request
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
            'email' => 'required|email',
            'verification_code' => 'required|string'
        ];
        return $rules;
    }

    public function messages()
    {
        return [];
    }
}
