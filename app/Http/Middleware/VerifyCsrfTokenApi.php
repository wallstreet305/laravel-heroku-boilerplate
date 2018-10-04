<?php

namespace OBS\Http\Middleware;

use Illuminate\Http\Response;
use Illuminate\Session\TokenMismatchException;
use OBS\Http\Controllers\MainController;
use Schnittstabil\Csrf\TokenService\TokenService;
use Closure;

class VerifyCsrfTokenApi
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     *
     * @throws \Illuminate\Session\TokenMismatchException
     */
    public function handle($request, Closure $next)
    {
        $token_service = new TokenService(env('JWT_SECRET'));
        $token = $request->input('_token') ?: $request->header('X-CSRF-TOKEN');

        if ($this->isReading($request) or $this->shouldPassThrough($request) or $token_service->validate(env('JWT_SECRET'), $token)) {
            return $next($request);
        }
        throw new TokenMismatchException(
            'Sorry! you are not authorized to perform this action, please try again after re-login',
            Response::HTTP_UNAUTHORIZED
        );
    }

    /**
     * Determine if the request has a URI that should pass through CSRF verification.
     *
     * @param  \Illuminate\Http\Request $request
     * @return bool
     */
    protected function shouldPassThrough($request)
    {
        foreach ($this->except as $except) {
            if ($except !== '/') {
                $except = trim($except, '/');
            }

            if ($request->is($except)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determine if the HTTP request uses a ‘read’ verb.
     *
     * @param  \Illuminate\Http\Request $request
     * @return bool
     */
    protected function isReading($request)
    {
        return in_array($request->method(), ['HEAD', 'GET', 'OPTIONS']);
    }
}
