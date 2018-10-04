<?php

namespace OBS\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Illuminate\Session\TokenMismatchException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
//    public function render($request, Exception $exception)
//    {
//        return parent::render($request, $exception);
//    }

    public function render($request, Exception $e)
    {
        $code = 400;
        $response = [
            'error' => [
                'type'      => class_basename(get_class($e)),
                'message'   => $e->getMessage(),
                'file'      => $e->getFile(),
                'line'      => $e->getLine()
            ]
        ];

        if ($e instanceof ValidationException) {
            $code = 422;
            $validator = $e->validator;
            $failed = $validator->failed();

            $errors = [];

            foreach ($failed as $field_name => $failedone) {
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

            if ($rule == 'RequiredUnless') {
                $payload['other_field'] = array_shift($payload['rule_attributes']);
            }
            $response['error'] = $payload;
        }

        if ($e instanceof TokenMismatchException || $e instanceof TokenExpiredException) {
            $code = 401;
        }
        return response()->json($response, $code);
    }
}
