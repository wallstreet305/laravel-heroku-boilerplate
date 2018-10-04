<?php

namespace OBS\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Auth\Middleware\Authenticate as AppAuthAuthenticate;
use Illuminate\Auth\Middleware\AuthenticateWithBasicAuth;
use Illuminate\Auth\Middleware\Authorize;
use OBS\Http\Middleware\EncryptCookies;
use OBS\Http\Middleware\RequestLogs;
use OBS\Http\Middleware\ThrottleApiRequests;
use OBS\Http\Middleware\VerifyCsrfToken;
use OBS\Http\Middleware\RedirectIfAuthenticated;
use OBS\Http\Middleware\VerifyCsrfTokenApi;
use Tymon\JWTAuth\Http\Middleware\Authenticate as JWTAuthenticate;
use Tymon\JWTAuth\Http\Middleware\AuthenticateAndRenew;
use Tymon\JWTAuth\Http\Middleware\Check;
use Tymon\JWTAuth\Http\Middleware\RefreshToken;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        CheckForMaintenanceMode::class,
        RequestLogs::class
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            EncryptCookies::class,
            AddQueuedCookiesToResponse::class,
            StartSession::class,
            ShareErrorsFromSession::class,
            VerifyCsrfToken::class,
            SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
            VerifyCsrfTokenApi::class
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => AppAuthAuthenticate::class,
        'auth.basic' => AuthenticateWithBasicAuth::class,
        'bindings' => SubstituteBindings::class,
        'can' => Authorize::class,
        'guest' => RedirectIfAuthenticated::class,
        'throttle' => ThrottleApiRequests::class,

        'jwt.renew' => AuthenticateAndRenew::class,
        'jwt.refresh' => RefreshToken::class,
        'jwt.auth' => JWTAuthenticate::class,
        'jwt.check' => Check::class
    ];
}
