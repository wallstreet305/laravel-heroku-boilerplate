<?php

namespace OBS\Http\Requests\Users;

use OBS\Http\Requests\Request;

class UPPRequest extends Request
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
        return [
            'picture' => 'required|mimetypes:image/gif,image/png,image/jpg,image/jpeg|' .
                'max:5120|dimensions:min_width=200,min_height=200,max_width=1000,max_height=1000'
        ];
        return $rules;
    }

    public function messages()
    {
        return [];
    }
}
