<?php

namespace OBS\Http\Middleware;

use Closure;
use JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Tymon\JWTAuth\Exceptions\JWTException;

class ServiceAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     * @throws JWTException
     */
    public function handle(Request $request, Closure $next)
    {
        if (JWTAuth::parseToken()->authenticate()) {
            return $next($request);
        } else {
            throw new JWTException(
                'Sorry! you are not authorized to perform this action, please try again after re-login',
                Response::HTTP_UNAUTHORIZED
            );
        }
    }
}
