<?php

namespace OBS\Http\Requests\Users;

use OBS\Http\Requests\Request;

class LVSARequest extends Request
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
            'facebook-access-token' => 'string|required_without_all:google-plus-access-token',
            'google-plus-access-token' => 'string|required_without_all:facebook-access-token',
        ];
        return $rules;
    }
}
