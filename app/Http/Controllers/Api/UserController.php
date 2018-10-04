<?php
namespace OBS\Http\Controllers\Api;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use JWTAuth;
use OBS\Http\Middleware\ServiceAccess;
use OBS\Jobs\SendBackgroundEmail;
use OBS\User;
use OBS\UserStats;
use OBS\UserPictures;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Storage;
use Exception;
use Log;
use OBS\ApiMocks\Controllers\UserClass;
use OBS\Http\Controllers\MainController;
use OBS\Http\Requests\Users\CURequest;
use OBS\Http\Requests\Users\USRequest;
use OBS\Http\Requests\Users\FPRequest;
use OBS\Http\Requests\Users\RPRequest;
use OBS\Http\Requests\Users\SBERequest;
use OBS\Http\Requests\Users\AARequest;
use OBS\Http\Requests\Users\LVSARequest;
use OBS\Http\Requests\Users\VACRequest;
use OBS\Http\Requests\Users\RVCRequest;
use OBS\Http\Requests\Users\SBMIRequest;
use OBS\Http\Requests\Users\UUPRequest;
use OBS\Http\Requests\Users\UPPRequest;
use Schnittstabil\Csrf\TokenService\TokenService;
use Zend\Json\Decoder as JsonDecoder;
use Zend\Http\Client as HTTPClient;
use Zend\Json\Json;
use OBS\Http\Middleware\AuthJWT;
use DB;

class UserController extends MainController implements UserClass
{
    /**
     * UsersController constructor.
     */
    public function __construct()
    {
        $this->middleware(ServiceAccess::class, ['only' => [
            'updateUserProfile','uploadProfilePicture'
        ]]);
    }
    /**
     * Implementing UserController::registerViaEmail() method to register using Email
     *
     * {@inheritdoc}
     */
    public function registerViaEmail(CURequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->all();

            $user = User::firstOrNew(['email' => $input['email']]);

            $user_info = [
                'full_name' => $input['full_name'],
                'password' => bcrypt($input['password']),
                'email' =>($input['email']),
                'uuid' => $input['uuid'],
                'timezone' => $input['timezone'],
                'status' => User::USER_STATUS_INACTIVE,
                'last_seen' => Carbon::now(),
            ];
            $data = $user->fill($user_info)->save();

            if ($data) {
                $user_stats = UserStats::create([
                                'user_id_fk' => $user['user_id'],
                                'dob' => null,
                                'height' => '0',
                                'age' => '0',
                                'start_weight' => '0',
                                'first_day_last_period' => null,
                                'cycle_length' => '0',
                                'conceive_date' => null,
                                'estimated_due_date' => null,
                            ]);
            }
            DB::commit();

            return $this->sendVerificationEmail(SBERequest::createFromBase($request),'verify-email');
        } catch (JWTException $e) {
            DB::rollBack();
            Log::error(
                'Register via email method exception (registerViaEmail()):' . PHP_EOL .
                'File: ' . $e->getFile() . PHP_EOL .
                'Line: ' . $e->getLine() . PHP_EOL .
                $e->getMessage() . PHP_EOL . PHP_EOL . $e->getTraceAsString()
            );
            return $this->displayResponseToUser($request, [
                'error' => [
                    'type' => 'NotAvailable',
                    'message' => 'Sorry! we are not able to process your request at this moment, please try later'
                ]
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Implementing UsersClass::accountActivation() method
     *
     * {@inheritdoc}
     */
    public function accountActivation(AARequest $request)
    {
        try {
            $input = $request->all();

            if (empty($input['verification_code'])) {
                return $this->displayResponseToUser($request, [
                    'error' => [
                        'type' => 'InvalidVerificationCodeProvided',
                        'message' => 'Sorry! either you have provided invalid activation code or your activation code has been expireds'
                    ]
                ], Response::HTTP_PRECONDITION_REQUIRED);
            }
            $user = User::where('email', '=', $input['email'])
                ->where('remember_token', '=', $input['verification_code'])
                ->where('remember_token_created_time', '>', Carbon::now()->subHour()->toDateTimeString())
                ->where('status', '=', 0)
                ->first();

            if (!empty($user) and $user->count()) {
                $user_fill_array = [
                    'remember_token' => null,
                    'remember_token_created_time' => null,
                    'status' => User::USER_STATUS_ACTIVE,
                    'last_seen' => Carbon::now()->toDateTimeString()
                ];
                $user->fill($user_fill_array)->save();
                $user_data = $user->toArray();
                $token = JWTAuth::fromUser($user);
                $subject = "Account is Active Now";
                $this->dispatch(
                    new SendBackGroundEmail(
                        'emails.welcome', ['full_name' => $user_data['full_name']], $user_data['email'], $user_data['full_name'], $subject
                    )
                );
                return $this->displayResponseToUser($request, [
                    'success' => [
                        'type' => 'AccessGranted',
                        'message' => 'Congrats! your account has been activated.',
                        'token' => $token,
                        'user' => $user,
                        'user_stats' => $user->user_stats
                    ]
                ], Response::HTTP_OK);
            } else {
                return $this->displayResponseToUser($request, [
                    'error' => [
                        'type' => 'InvalidVerificationCodeProvided',
                        'message' => 'Sorry! either you have provided invalid activation code or your activation code has been expired'
                    ]
                ], Response::HTTP_PRECONDITION_FAILED);
            }
        } catch (Exception $e) {
            Log::error(
                'Account activation exception (accountActivation):' . PHP_EOL .
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
     * @param Request $request
     * @return Response
     * UserController:UserSignIn Method
     */
    public function userSignIn(USRequest $request)
    {
        try {
            $input = $request->all();
            $token = JWTAuth::attempt(['email' => $input['email'], 'password' => $input['password']]);
            if ($token) {
                $user = JWTAuth::user();
                if (!isset($user->status) or $user->status != 'active') {
                    return $this->displayResponseToUser($request, [
                        'success' => [
                            'type' => 'NotVerifiedYet',
                            'message' => 'Sorry! you have not verified your email address, please verify it before login',
                            'email' => $user->email
                        ]
                    ], Response::HTTP_LOCKED);
                }
                $user_fill_array = [
                    'last_seen' => Carbon::now()->toDateTimeString()
                ];
                $user->fill($user_fill_array)->save();
                $user_data = $user->toArray();
                return $this->displayResponseToUser($request, [
                    'success' => [
                        'type' => 'AccessGranted',
                        'message' => 'Congrats! user successfully logged in to system.',
                        'token' => $token,
                        'user' => $user_data,
                        'user_stats' => $user->user_stats,
                    ]
                ], Response::HTTP_OK);
            } else {
                return $this->displayResponseToUser($request, [
                    'error' => [
                        'type' => 'InvalidCredentials',
                        'message' => 'Sorry! you have provided invalid credentials (email / password)'
                    ]
                ], Response::HTTP_BAD_REQUEST);
            }
        } catch (Exception $e) {
            Log::error(
                'Login via email exception (userSignIn):' . PHP_EOL .
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
     * Implementing UserController::forgotPassword
     */

    public function forgotPassword(FPRequest $request) {
        try {
            return $this->sendVerificationEmail(SBERequest::createFromBase($request), 'forget-password');
        } catch (Exception $e) {
            Log::error(
                'Forgot password exception (forgotPassword):' . PHP_EOL .
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
     * Implementing UserController:: resendVerificationCode
     */
    public function resendVerificationCode(RVCRequest $request) {
        try {
            return $this->sendVerificationEmail(SBERequest::createFromBase($request));
        } catch (Exception $e) {
            Log::error(
                'Resend Verification code  exception (resendVerificationCode):' . PHP_EOL .
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
     * Implementing UserController::resetPassword
     */
    public function resetPassword(RPRequest $request) {
        try {
            $input = $request->all();
            $password = trim($input['password']);
            $user = User::where('email','=', $input['email'])
                        ->where('status', '=', 1)
                        ->first();
            if (!empty($user) and $user->count() > 0) {
                $user_fill_array = [
                    'password' => bcrypt($password),
                    'last_seen' => Carbon::now()->toDateTimeString(),
                    'remember_token' => null,
                    'remember_token_created_time' => null,
                ];
                $user->fill($user_fill_array)->save();
                return $this->displayResponseToUser($request, [
                    'success' => [
                        'type' => 'PasswordUpdated',
                        'message' => 'Congrats! new password has been saved'
                    ]
                ], Response::HTTP_OK);
            } else {
                return $this->displayResponseToUser($request, [
                    'error' => [
                        'type' => 'InvalidVerificationCodeProvided',
                        'message' => 'Unable to complete your password reset request, invalid email address provided'
                    ]
                ], Response::HTTP_PRECONDITION_FAILED);
            }

        } catch (Exception $e) {
            Log::error(
                'password reset exception (resetPassword):' . PHP_EOL .
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
     *
     */

    public function userLogout(Request $request)
    {
        try {
            $token = JWTAuth::getToken();
            $user = JWTAuth::toUser($token);

            User::where('user_id', '=', $user->user_id)
                ->update(['uuid' => NULL]);
            JWTAuth::invalidate();
            //$token_service = new TokenService(env('JWT_SECRET'), 3600, 'SHA512');
            //$token_service->generate($user->user_id);
            return $this->displayResponseToUser($request, [
                'success' => [
                    'type' => 'LogoutSuccessfully',
                    'message' => 'User Logout Successfully!'
                ]
            ], Response::HTTP_OK);
        } catch (Exception $e) {
            Log::error('User Logout exception (userLogout)' . PHP_EOL .
                'File' . $e->getFile() . PHP_EOL .
                'Line' . $e->getLine() . PHP_EOL .
                $e->getMessage() . PHP_EOL . PHP_EOL
            );
            return $this->displayResponseToUser($request, [
                'error' => [
                    'type' => 'NotAvailable',
                    'message' => 'Sorry! system is no available at this moment, please try later'
                ]
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function loginViaSocialApp(LVSARequest $request) {
        try {
            $input = $request->all();
            $user_data_array = [];
            $user = NULL;
            $user_new = NULL;
            $access_token = NULL;
            $social_app = '';
            $user_array = array();

            if (!empty($input['facebook-access-token'])) {
                $access_token =  $input['facebook-access-token'];
                $social_app = 'facebook';
            } else {
                $access_token =  $input['google-plus-access-token'];
                $social_app = 'google';
            }

            $response = $this->getSocialUserInfo($access_token, $social_app);
            $user_data_array = $response['user_data_array'];
            $user = $response['user'];
            if($response['user_with_email_already_exist'] == true) {
                $token = JWTAuth::fromUser($user);
                $user_array = User::where('user_id', '=', $user['user_id'])->first()->toArray();
                return $this->displayResponseToUser($request, [
                    'success' => [
                        'type' => 'AccessGranted',
                        'message' => 'Congrats! you are successfully logged in to our system',
                        'already_exist' => 'somethingelse',
                        'token' => $token,
                        'user' => $user_array,
                        'user_stats' => $user->user_stats,
                    ]
                ],Response::HTTP_OK);
            }

            // if user is already registered via social login
            // fetch user data & make user login
            if(!empty($user) and $user instanceof User) {
                $token = JWTAuth::fromUser($user);
                $user_array = User::where('user_id', '=', $user['user_id'])->first()->toArray();
                return $this->displayResponseToUser($request, [
                    'success' => [
                        'type' => 'AccessGranted',
                        'message' => 'Congrats! you are successfully logged in to our system',
                        'already_exist' => 'something',
                        'token' => $token,
                        'user' => $user_array,
                        'user_stats' => $user->user_stats,
                    ]
                ]);
            }

            // register user
            if (!empty($user_data_array)) {
                //$ip_info = $this->getUserInfoFromIPAddress();
                //$user_data_array = array_merge($user_data_array, $ip_info);
                $user_data_array['last_seen'] = Carbon::now()->toDateTimeString();
                $user_data_array['uuid'] = NULL;
                $user_data_array['status'] = 1;

                DB::beginTransaction();

                if (!empty($user_data_array['facebook_reference']))
                    $user = User::firstOrNew(['facebook_reference' => $user_data_array['facebook_reference']]);
                elseif (!empty($user_data_array['gplus_reference']))
                    $user = User::firstOrNew(['gplus_reference' => $user_data_array['gplus_reference']]);

                $user_array = $user->toArray();
                $user->fill($user_data_array)->save();

                ///user stats by default
                UserStats::create([
                    'user_id_fk' => $user->user_id,
                    'dob' => null,
                    'height' => '0',
                    'age' => '0',
                    'start_weight' => '0',
                    'first_day_last_period' => null,
                    'cycle_length' => '0',
                    'conceive_date' => null,
                    'estimated_due_date' => null,
                ]);

                DB::commit();

                $user_array = User::where('user_id', '=', $user['user_id'])->first()->toArray();
                $token = JWTAuth::fromUser($user);

                if(!empty($user_array['email']) or !empty($user_array['full_name'])) {
                    $subject = "Welcome to OBS";
                    $this->dispatch(
                        new SendBackGroundEmail(
                            'emails.welcome', ['full_name' => $user_array['full_name']], $user_array['email'], $user_array['full_name'], $subject
                        )
                    );
                }

                return $this->displayResponseToUser($request, [
                    'success' => [
                        'type' => 'AccessGranted',
                        'message' => 'Congrats! you are successfully logged in to our system',
                        'token' => $token,
                        'user' => $user_array,
                        'user_stats' => $user->user_stats
                    ]
                ],Response::HTTP_OK);
            } else {
                Log::error(
                    'User has provided invalid social app token to parse (loginWithSocialApp):' . PHP_EOL .
                    'Input: ' . json_encode($input) . PHP_EOL . PHP_EOL
                );
                return $this->displayResponseToUser($request, [
                    'error' => [
                        'type' => 'InvalidTokenProvided',
                        'message' => 'Sorry! system is not able to access your account information now, please try later'
                    ]
                ], Response::HTTP_PRECONDITION_FAILED);
            }
        } catch (Exception $e) {
            Log::error(
                'Login with social app exception (loginViaSocialApp):' . PHP_EOL .
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
     *
     */

    public function verifyActivationCode(VACRequest $request) {
        try {
            $input  = $request->all();
            $user = User::where('email','=', $input['email'])
                            ->where('remember_token','=',$input['verification_code'])
                            ->where('remember_token_created_time', '>', Carbon::now()->subHour()->toDateTimeString())
                            ->first();
            if (!empty($user) and $user->count()) {
                $now = Carbon::now()->toDateTimeString();
                $user_array = [
                    'remember_token' => null,
                    'remember_token_created_time' => null,
                    'forget_password_requested' => 0,
                    'last_seen' => $now,
                    'forgot_password_request' => 0
                ];
                $user->fill($user_array)->save();
                return $this->displayResponseToUser($request, [
                    'success' => [
                        'type' => 'VerificationCodeValid',
                        'message' => 'Success! provided verification is valid'
                    ]
                ], Response::HTTP_OK);
            } else {
                return $this->displayResponseToUser($request, [
                    'error' => [
                        'type' => 'InvalidVerificationCodeProvided',
                        'message' => 'Unable to complete your password reset request, invalid email address or verification code provided'
                    ]
                ], Response::HTTP_PRECONDITION_FAILED);
            }
        } catch (Exception $e) {
            Log::error(
                'Verify code exception (verifyActivationCode):' . PHP_EOL .
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
     * Get user info against social account reference
     *
     * @param $access_token
     * @param $social_app
     * @return array
     */
    private function getSocialUserInfo($access_token, $social_app)
    {
        $user = NULL;
        $user_exist = NULL;
        $reference_where = [];
        $email_where = [];
        $user_data_array = [];
        if ($social_app === 'facebook') {
            $client = new HTTPClient('https://graph.facebook.com/me?fields=id,name,email,gender,age_range,picture&access_token=' . $access_token);
            $response = $client->setOptions(['ssl-verify-peer' => null])->send();
            $response = $response->getBody();
            $response = json_decode($response, true);
            if (!empty($response) and is_array($response) and empty($response['error'])) {
                if (!empty($response['id'])) {
                    $reference_where['facebook_reference'] = Str::substr($response['id'], 0, 50);
                    $user_data_array['facebook_reference'] = Str::substr($response['id'], 0, 50);
                    $user = User::where('facebook_reference', '=', $reference_where['facebook_reference'])
                        ->first();
                }
                if (!empty($response['email'])) {
                    $email_where['email'] = Str::substr($response['email'], 0, 254);
                    $user_data_array['email'] = Str::substr($response['email'], 0, 254);
                    $user_exist = User::where('email', '=', $user_data_array['email'])
                        ->first();
                }
                if (!empty($response['name']))
                    $user_data_array['full_name'] = Str::substr($response['name'], 0, 254);
                if (!empty($response['gender']))
                    $user_data_array['gender'] = Str::substr($response['gender'], 0, 6);
                if (!empty($response['age_range'])) {
                    $age = null;
                    if (!empty($response['age_range']['min']) and !empty($response['age_range']['max'])) {
                        $age = ceil(((int)$response['age_range']['min'] + (int)$response['age_range']['max']) / 2);
                    } else if (!empty($response['age_range']['min'])) {
                        $age = (int)$response['age_range']['min'];
                    } else if (!empty($response['age_range']['max'])) {
                        $age = (int)$response['age_range']['max'];
                    }
                    $user_data_array['age'] = $age;
                    unset($age);
                }
            }
        } else {
            $client = new HTTPClient('https://www.googleapis.com/oauth2/v3/tokeninfo?fields=sub,gender,ageRange,email,name,picture,given_name,family_name,locale&id_token=' . $access_token);
            $response = $client->setOptions(['ssl-verify-peer' => null])->send();
            $response = $response->getBody();
            $response = json_decode($response, true);

            if (!empty($response) and is_array($response) and empty($response['error_description'])) {
                if (!empty($response['sub'])) {
                    $reference_where['gplus_reference'] = Str::substr($response['sub'], 0, 50);
                    $user_data_array['gplus_reference'] = Str::substr($response['sub'], 0, 50);
                    $user = User::where('gplus_reference', '=', $reference_where['gplus_reference'])
                        ->first();
                }
                if (!empty($response['email'])) {
                    $email_where['email'] = Str::substr($response['email'], 0, 254);
                    $user_data_array['email'] = Str::substr($response['email'], 0, 254);
                    $user_exist = User::where('email', '=', $user_data_array['email'])
                        ->first();
                }
                if (!empty($response['name']))
                    $user_data_array['full_name'] = Str::substr($response['name'], 0, 254);
                if (!empty($response['gender']))
                    $user_data_array['gender'] = Str::substr($response['gender'], 0, 6);
                if (!empty($response['picture']))
                    $user_data_array['picture_path'] = Str::substr($response['picture'], 0, 254);
                if (!empty($response['ageRange'])) {
                    $age = null;
                    if (!empty($response['ageRange']['min']) and !empty($response['ageRange']['max'])) {
                        $age = ceil(((int)$response['ageRange']['min'] + (int)$response['ageRange']['max']) / 2);
                    } else if (!empty($response['ageRange']['min'])) {
                        $age = (int)$response['ageRange']['min'];
                    } else if (!empty($response['ageRange']['max'])) {
                        $age = (int)$response['ageRange']['max'];
                    }
                    $user_data_array['age'] = $age;
                    unset($age);
                }
            }
        }

        if(!empty($user))
            return [
                'user' => $user,
                'user_data_array' => $user_data_array,
                'user_with_email_already_exist' => false
            ];

        if(!empty($user_exist))
            return [
                'user' => $user_exist,
                'user_data_array' => $user_data_array,
                'user_with_email_already_exist' => true
            ];

        return [
            'user' => NULL,
            'user_data_array' => $user_data_array,
            'user_with_email_already_exist' => false
        ];
    }

    /**
     * Implementing BMI Values UserControllers::saveBmiValues()
     */

    public function saveBmiValues(SBMIRequest $request) {
        try {
            $user_fill_data= array();
            $input = $request->all();

            // first find the user
            $user = User::where('email', '=', $input['email'])
                        ->first();
            if (!empty($user) && $user->count() > 0) {
               $userId = $user['user_id'];
               $stats = UserStats::where('user_id_fk','=', $userId)
                           ->orderBy('user_stat_id','desc')
                           ->get();
               $user_stats = $stats[0];

               DB::beginTransaction();
               $user_fill_data = $input;

               $user_stats->update($user_fill_data);
               DB::commit();
                return $this->displayResponseToUser($request, [
                    'success' => [
                        'type' => 'RecordUpdated',
                        'message' => 'Success! record has been updated',
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
        } catch (JWTException $e) {
            DB::rollBack();
            Log::error(
                'save bmi values method exception (saveBmiValues()):' . PHP_EOL .
                'File: ' . $e->getFile() . PHP_EOL .
                'Line: ' . $e->getLine() . PHP_EOL .
                $e->getMessage() . PHP_EOL . PHP_EOL . $e->getTraceAsString()
            );
            return $this->displayResponseToUser($request, [
                'error' => [
                    'type' => 'NotAvailable',
                    'message' => 'Sorry! we are not able to process your request at this moment, please try later'
                ]
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    public function updateUserProfile(UUPRequest $request) {
        try {
            $input = $request->all();
            $user = JWTAuth::user();
            $edd = '';

            if (!empty($user) && $user->count() > 0) {
                $userId = $user->user_id;
                $stats = UserStats::where('user_id_fk','=', $userId)
                    ->orderBy('user_stat_id','desc')
                    ->get();
                $user_stats = $stats[0];

                DB::beginTransaction();
                $user_data = [
                    'phone' => $input['phone'],
                    'latitude' => $input['latitude'],
                    'longitude' => $input['longitude']
                ];

                $user_stat_fill = [
                    'due_date_calc_flag' => $input['due_date_calc_flag'],
                    'conceive_date' => $input['conceive_date'],
                    'estimated_due_date' => $input['estimated_due_date'],
                ];

                if($input['first_day_last_period'] != -1)
                    $user_stat_fill['first_day_last_period'] = $input['first_day_last_period'];

                if($input['cycle_length'] != -1)
                    $user_stat_fill['cycle_length'] = $input['cycle_length'];

                $user->update($user_data);
                $user_stats->update($user_stat_fill);
                if($input['first_day_last_period'] != -1)
                    $user_stat_fill['first_day_last_period'] = strtotime($input['first_day_last_period']);
                else
                    $user_stat_fill['first_day_last_period'] = -1;

                if($input['cycle_length'] != -1)
                    $user_stat_fill['cycle_length'] = $input['cycle_length'];
                else
                    $user_stat_fill['cycle_length'] = -1;

                $user_stat_fill['conceive_date'] = strtotime($input['conceive_date']);
                $user_stat_fill['estimated_due_date'] = strtotime($input['estimated_due_date']);


                DB::commit();
                return $this->displayResponseToUser($request, [
                    'success' => [
                        'type' => 'RecordUpdated',
                        'message' => 'Success! record has been updated',
                        'data' => $user_stat_fill
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
        } catch (JWTException $e) {
            DB::rollBack();
            Log::error(
                'update user profile method exception (updateUserProfile()):' . PHP_EOL .
                'File: ' . $e->getFile() . PHP_EOL .
                'Line: ' . $e->getLine() . PHP_EOL .
                $e->getMessage() . PHP_EOL . PHP_EOL . $e->getTraceAsString()
            );
            return $this->displayResponseToUser($request, [
                'error' => [
                    'type' => 'NotAvailable',
                    'message' => 'Sorry! we are not able to process your request at this moment, please try later'
                ]
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * UserController:: uploadProfilePicture()
     */

    public function uploadProfilePicture(UPPRequest $request) {
        try {
            $user = JWTAuth::user();
            if (!empty($user) && $user->count() > 0) {
                $file = $request->file('picture');
                $file_name = 'user_' . $user['user_id'] . '.' . $file->extension();
                $file_path = 'public/profile_pictures';
                $storage = Storage::disk('local');
                $file_access = 'storage/profile_pictures/' . $file_name;
                if (!$storage->exists($file_path))
                    $storage->makeDirectory($file_path);

                $user_data = [
                    'image_path' => $file_access,
                ];

                $user->update($user_data);
                $file->move(storage_path('app/' . $file_path), $file_name);
                return $this->displayResponseToUser($request, [
                    'success' => [
                        'type' => 'PictureUploaded',
                        'message' => 'User profile picture uploaded',
                        'image_path' => $file_access
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
                'Picture upload exception (uploadProfilePicture):' . PHP_EOL .
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

    public function refreshAuthToken(Request $request)
    {
        $token = JWTAuth::parseToken()->refresh();
        dd($token);
        $user = JWTAuth::setToken($token)->toUser();
        if (!empty($user) and $user instanceof User) {
            $user->fill(['last_seen' => Carbon::now()->toDateTimeString()])->save();
            $status = Response::HTTP_OK;
            $response = [
                'success' => [
                    'type' => 'TokenRefreshed',
                    'token' => $token
                ]
            ];
        } else {
            $status = Response::HTTP_UNAUTHORIZED;
            $response = [
                'error' => [
                    'type' => 'TokenMismatchException',
                    'token' => 'Invalid token has been provided'
                ]
            ];
        }
        return $this->displayResponseToUser($request, $response, $status);
    }


}