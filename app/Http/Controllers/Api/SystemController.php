<?php

namespace OBS\Http\Controllers\Api;

use Auth;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Log;
use OBS\ApiMocks\Controllers\SystemClass;
use OBS\Http\Controllers\MainController;
use OBS\Http\Middleware\ServiceAccess;
use OBS\User;
use Schnittstabil\Csrf\TokenService\TokenService;

class SystemController extends MainController implements SystemClass
{
    /**
     * Implementing SystemClass::getXCsrf() method
     *
     * {@inheritdoc}
     */
    public function getXCsrf(Request $request)
    {
        try {
            $token_service = new TokenService(env('JWT_SECRET'), 3600, 'SHA512');
            return $this->displayResponseToUser($request, [
                'success' => [
                    'type' => 'ResponseReceived',
                    'X_CSRF_TOKEN' => $token_service->generate(env('JWT_SECRET'))
                ]
            ], Response::HTTP_OK);
        } catch (Exception $e) {
            Log::error(
                'Get start up token exception (startUp):' . PHP_EOL .
                'File: ' . $e->getFile() . PHP_EOL .
                'Line: ' . $e->getLine() . PHP_EOL .
                $e->getMessage() . PHP_EOL . PHP_EOL
            );
            return $this->displayResponseToUser($request, [
                'error' => [
                    'type' => 'NotAvailable',
                    'message' => 'Sorry! system is not available at this moment, please try later'
                ]
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
