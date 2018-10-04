<?php

namespace OBS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use OBS\ApiMocks\ValidationSkeleton;
use Response as OutgoingResponse;
use OBS\Jobs\SendBackgroundEmail;
use OBS\Http\Requests\Users\SBERequest;
use Carbon\Carbon;
use OBS\User;
use Validator;
use Request as IncomingRequest;


class MainController extends Controller
{
    protected $output_response = [
        'error' => [
            'type' => 'InvalidRequestException',
            'message' => 'Please define your purpose to connect!'
        ]
    ], $validation_error = false;
    protected $search_records_limit = 20;
    protected $excluded_email_services = [
        'mailinator.com'
    ];

    /**
     * Helper method to return response, this method will be use to handle all kind of response
     *
     * @param Request $request
     * @param array $out Outgoing response
     * @param int $status This will represent the response header code
     * @param array $headers This array will include array of extra headers
     * @return \Illuminate\Http\Response
     */
    public static function outputResponse(Request $request, $out = [], $status = Response::HTTP_OK, $headers = [])
    {
        return (new static)->displayResponseToUser($request, $out, $status, $headers);
    }

    /**
     * Method to return response, this method will be use to handle all kind of response
     *
     * @param Request $request
     * @param array $out Outgoing response
     * @param int $status This will represent the response header code
     * @param array $headers This array will include array of extra headers
     * @return \Illuminate\Http\Response
     */
    public function displayResponseToUser(Request $request, $out = [], $status = Response::HTTP_OK, $headers = [])
    {
        if (empty($out))
            $out = $this->output_response;

        $out = $this->cleanArray($out);
        $response = OutgoingResponse::json($out, $status, [], JSON_PRETTY_PRINT);
        $response->header('Content-Type', 'application/json');
        if (!empty($headers) and is_array($headers)) {
            $response->withHeaders($headers);
            foreach ($headers as $h_key => $h_value) {
                $response->header($h_key, $h_value);
            }
        }
        $response->header('Access-Control-Allow-Origin', '*');
        $response->header('Access-Control-Expose-Headers', 'X-Pagination-Count, X-Pagination-Page, X-Pagination-Limit, X-RateLimit-Limit, X-RateLimit-Remaining');
        return $response;
    }

    /**
     * Method to clean array, this function will use to remove null objects from array before display response
     *
     * @param $array
     * @return mixed
     */
    protected function cleanArray($array)
    {
        if (is_object($array) and $array instanceof \Eloquent) {
            $array = $array->toArray();
        }
        foreach ($array as $key => $value) {
            if (is_array($value) or is_object($value)) {
                if (is_object($array)) {
                    $array->$key = $this->cleanArray($value);
                } else {
                    $array[$key] = $this->cleanArray($value);
                }
            } else {
                if (!is_int($value) and !is_float($value) and (is_null($value) or $value === '(null)')) {
                    if (is_object($array)) {
                        $array->$key = '';
                    } else {
                        $array[$key] = '';
                    }
                }
            }
        }
        return $array;
    }

    /**
     * Implementing UsersClass::sendVerificationEmail() method
     *
     * @param \Illuminate\Http\Request|\NapApp\Http\Requests\Users\SVERequest $request
     * @param string $email_type
     * @return \Illuminate\Http\Response
     */
    public function sendVerificationEmail(SBERequest $request, $email_type = 'new-account')
    {
        try {
            $input = $request->all();
            $where['email'] = $input['email'];
            $extra_update_array = [];
            if ($email_type === 'forget-password') {
                $email_subject = 'Reset Your Password';
                $email_template = 'emails.forgot_password';
                $success_message = 'Success! an email has been sent to your mail box, please follow the described process in email to reset your password';
                $extra_update_array = ['forgot_password_request' => 1];
            } elseif($email_type === 'verify-email') {
                $where['status'] = 0;
                $email_subject = 'Verify Your Email';
                $email_template = 'emails.account_verification';
                $success_message = 'Success! an email has been sent to your mail box, please follow the described process in email to verify your email';
            } else {
                $email_subject = 'Activate Your Account';
                $email_template = 'emails.account_verification';
                $success_message = 'Success! account has been created, an email has been sent to provided email address for account verification';
            }
            $now = Carbon::now()->toDateTimeString();
            $user = User::where($where)->where('email', '!=', '')->whereNotNull('email')->first();
            if (!empty($user) and $user->count()) {
                $verification_code = rand(10000, 99999);
                $user_fill_array = [
                    'remember_token' => $verification_code,
                    'remember_token_created_time' => $now,
                    'last_seen' => $now
                ];
                if (!empty($extra_update_array))
                    $user_fill_array = array_merge($user_fill_array, $extra_update_array);
                $user->fill($user_fill_array)->save();
                $user_data = $user->toArray();
                $this->dispatch(
                    new SendBackgroundEmail(
                        $email_template,['verification_code' => $verification_code,'full_name' => $user_data['full_name'] ], $user_data['email'], $user_data['full_name'], $email_subject
                    )
                );
                return $this->displayResponseToUser($request, [
                    'success' => [
                        'type' => 'VerificationEmailSent',
                        'message' => $success_message
                    ]
                ], Response::HTTP_OK);
            } else {
                return $this->displayResponseToUser($request, [
                    'error' => [
                        'type' => 'InvalidAccountProvided',
                        'message' => 'Sorry! system does not recognize your account, please correct your input and re-try'
                    ]
                ], Response::HTTP_NOT_FOUND);
            }
        } catch (Exception $e) {
            Log::error(
                'Send verification email exception (sendVerificationEmail):' . PHP_EOL .
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

    /**
     * Method to apply form validation
     *
     * @param \Illuminate\Http\Request $request
     * @param $fields
     * @return array
     */
    protected function validateInput(Request $request, $fields)
    {
        $this->validation_error = false;
        $validator = Validator::make($request->all(), $fields);
        if ($validator->fails()) {
            $this->validation_error = true;
            return ValidationSkeleton::readyValidationErrorResponse($validator);
        }
        return $request->only(array_keys($fields));
    }
    /**
     * Method to return user info from current ip address
     *
     * @param string $ip_address optional
     * @return mixed
     */
    public function getUserInfoFromIPAddress($ip_address = null)
    {
        $ip_address = $ip_address ?: IncomingRequest::ip();
        $geoip = GeoIP::setIp($ip_address);
        $info = [
            'country' => $geoip->getCountryCode() ?: 'UK',
            'timezone' => $geoip->getTimezone() ?: 'UTC',
            'location_lat' => $geoip->getLatitude() ?: null,
            'location_lng' => $geoip->getLongitude() ?: null,
        ];
        return $info;
    }
}