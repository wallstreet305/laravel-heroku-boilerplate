<?php

namespace OBS\Http\Middleware;

use JWTAuth;
use Closure;
use Exception;

class AuthJWT
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            if(JWTAuth::parseToken()->authenticate()){
                return $next($request);
            }
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return response()->json([
                    'error' => [
                        'type'      => 'TokenMismatchException',
                        'message'   => 'Invalid token has been provided'
                    ]
                ], 401);
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return response()->json([
                    'error' => [
                        'type'      => 'TokenExpiredException',
                        'message'   => 'Sorry! token has been expired'
                    ]
                ], 401);
            } elseif($e instanceof \Tymon\JWTAuth\Exceptions\TokenBlacklistedException) {
                return response()->json([
                    'error' => [
                        'type'      => 'TokenBlacklistedException',
                        'message'   => 'The token has been blacklisted'
                    ]
                ], 401);
            } else {
                return response()->json([
                    'error' => [
                        'type'      => 'JWTException',
                        'message'   => 'Sorry! you are not authorized to perform this action, please try again after re-login'
                    ]
                ], 401);
            }
        }
        return $next($request);
    }
}
