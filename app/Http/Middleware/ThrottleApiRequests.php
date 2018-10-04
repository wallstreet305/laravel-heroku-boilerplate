<?php

namespace OBS\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Middleware\ThrottleRequests;
use OBS\Http\Controllers\MainController;

class ThrottleApiRequests extends ThrottleRequests
{
    /**
     * Overriding parent method
     *
     * @inheritdoc
     */
    protected function buildResponse($key, $maxAttempts)
    {
        $request = Request::capture();
        $output_response = [
            'error' => [
                'type' => 'TooManyAttempts',
                'message' => 'You are trying too often, please try again later'
            ]
        ];
        $response = MainController::outputResponse($request, $output_response, Response::HTTP_TOO_MANY_REQUESTS);
        $retryAfter = $this->limiter->availableIn($key);
        return $this->addHeaders(
            $response, $maxAttempts,
            $this->calculateRemainingAttempts($key, $maxAttempts, $retryAfter),
            $retryAfter
        );
    }
}
