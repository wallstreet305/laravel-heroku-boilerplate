<?php

namespace OBS\Http\Requests\Users;

use OBS\Http\Requests\Request;

class SBERequest extends Request
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
            'email' => 'required|exists:users,email'
        ];
        return $rules;
    }

    public function getValidatorInstance()
    {
        return parent::getValidatorInstance();
    }
}
