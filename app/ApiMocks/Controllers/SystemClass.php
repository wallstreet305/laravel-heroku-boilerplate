<?php

namespace OBS\ApiMocks\Controllers;

use Illuminate\Http\Request;
use OBS\ApiMocks\BaseSkeleton;

interface SystemClass extends BaseSkeleton
{
    /**
     * @apiVersion 1.0.1
     * @apiHeader {String} Accept=application/json Content-Types that are acceptable for the response
     * @apiGroup 1. Authorization
     * @api {get} api/get-x-csrf Get X-CSRF token
     * @apiName GetXcSRF
     * @apiDescription This Api will be use to get X-CSRF token <code>Most important,
     * and should call on start up of application.
     * I.e. this will be the first Api, application should call on background</code>.
     * CSRF protection applies to all unsafe HTTP requests (POST, PUT, DELETE, PATCH).
     * Received token from this API will be added in next all api request (unsafe HTTP requests) header along with
     * the same key name, as received in this Api (<code>X-CSRF-TOKEN</code>).<br>
     * This token expires after one hour of issue time, so please make sure to re-generate new token if
     * local token is older then one hour.
     * X-CSRF is a temporary token, and can expire in case of following change detected,
     * to help prevent miss-use of this token..<br>
     * 1: IP address change.<br>
     * 2: Device change.
     * @apiUse ResponseReceived
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getXCsrf(Request $request);
}