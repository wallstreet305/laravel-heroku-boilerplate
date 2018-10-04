<?php

namespace OBS\ApiMocks;

use Illuminate\Validation\Validator;

class ValidationSkeleton
{
    /**
     * @param \Illuminate\Validation\Validator $validator
     * @return array
     */
    public static function readyValidationErrorResponse(Validator $validator)
    {
        $failed = $validator->failed();
        $errors = [];

        foreach($failed as $field_name => $failedone) {
            if (isset($failed[$field_name])) {
                $errors[$field_name] = array_keys($failed[$field_name]);
            }
        }

        $first_failure = reset($errors);
        $rule = array_shift($first_failure);
        $field = key($errors);
        $payload = [
            'type' => 'ValidationException',
            'field' => $field,
            'message' => $validator->errors()->first(),
            'rule' => strtolower($rule),
        ];

        if (isset($failed[$field]) && 
            isset($failed[$field][$rule]) && 
            !in_array($rule, ['Unique', 'Exists'])) {
                $payload['rule_attributes'] = $failed[$field][$rule];
        }
        // $payload['all'] = $failed;
        return [
            'error' => $payload
        ];
    }
}