<?php

namespace OBS\Http\Requests\Users;

use OBS\Http\Requests\Request;

class CURequest extends Request
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
            'full_name' => 'required|string|max:254',
            'email' => 'required|email|unique:users|max:254',
            'password' => 'required|' . parent::PASSWORD_STRENGTH_VALIDATOR . '|min:6|max:50',
            'uuid' => 'required|unique:users'
        ];
        return $rules;
    }

    public function messages()
    {
        return [];
    }
}
