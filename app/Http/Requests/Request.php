<?php

namespace OBS\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request as IncomingRequest;
use Illuminate\Http\Response;
use OBS\ApiMocks\ValidationSkeleton;
use OBS\Http\Controllers\MainController;

abstract class Request extends FormRequest
{
    /**
     * Password validation regex, this will be use inside all requests for input password validation.
     * If password strength requirement change, you can change it anytime here.
     */
    const PASSWORD_STRENGTH_VALIDATOR = 'string';

    /**
     * Get the proper failed validation response for the request.
     *
     * @param  array $errors
     * @return \Illuminate\Http\Response | \Illuminate\Http\RedirectResponse
     */
    public function response(array $errors)
    {
        if ($this->ajax() || $this->wantsJson()) {
            return MainController::outputResponse(IncomingRequest::capture(), $errors, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return $this->redirector->to($this->getRedirectUrl())
            ->withInput($this->except($this->dontFlash))
            ->withErrors($errors, $this->errorBag);
    }

    /**
     * Format the errors from the given Validator instance.
     *
     * @param  \Illuminate\Contracts\Validation\Validator $validator
     * @return array
     */
    protected function formatErrors(Validator $validator)
    {

        if ($validator instanceof \Illuminate\Validation\Validator) {
            return ValidationSkeleton::readyValidationErrorResponse($validator);
        } else {
            return $validator->getMessageBag()->toArray();
        }
    }
}
