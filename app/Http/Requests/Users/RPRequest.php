<?php

namespace OBS\Http\Requests\Users;

use OBS\Http\Requests\Request;

class RPRequest extends Request
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
            'password' => 'required|' . parent::PASSWORD_STRENGTH_VALIDATOR . '|min:6|max:50',
        ];
        return $rules;
    }

    public function messages()
    {
        return [];
    }
}
