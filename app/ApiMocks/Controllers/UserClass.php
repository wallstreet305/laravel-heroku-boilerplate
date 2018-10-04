<?php
/**
 * Created by Developer.
 * User: muneeb
 * Date: 4/10/18
 * Time: 10:36 AM
 */

namespace OBS\ApiMocks\Controllers;

use OBS\ApiMocks\BaseSkeleton;
use OBS\Http\Requests\Users\CURequest;
use OBS\Http\Requests\Users\AARequest;
use OBS\Http\Requests\Users\USRequest;
use OBS\Http\Requests\Users\FPRequest;
use OBS\Http\Requests\Users\RPRequest;
use OBS\Http\Requests\Users\VACRequest;
use OBS\Http\Requests\Users\RVCRequest;
use OBS\Http\Requests\Users\LVSARequest;
use OBS\Http\Requests\Users\SBMIRequest;
use OBS\Http\Requests\Users\UUPRequest;
use OBS\Http\Requests\Users\UPPRequest;


interface UserClass extends BaseSkeleton
{
    /**
     * @apiVersion 1.0.0
     * @apiHeader {String} Accept=application/json Content-Types that are acceptable for the response
     * @apiHeader {String} X-CSRF-TOKEN The CSRF that has been received in <code>system/get-x-csrf</code> Api
     * @apiGroup 1. Authorization
     * @api {post} api/register-via-email Register via Email
     * @apiName RegisterViaEmailsssss
     * @apiDescription This Api will be used to register users via email on system.
     * @apiParam {String} full_name This attribute should define Full name of user, who is trying to create account on system.
     * @apiParam {String} email This attribute should define the unique email address, that has not been registered before in this system.
     * @apiParam {String} password This attribute should define plain text password, on application side there should be no encryption.
     * @apiParam {String} uuid This attribute should define application <code>UUID</code>.
     * @apiParam {String} timezone This attribute should define user current timezone. For example: <code>GMT+3</code>
     * @apiUse TokenMismatchException
     * @apiUse ValidationException
     * @apiUse VerificationEmailSent
     *
     * @param \OBS\Http\Requests\Users\CURequest $request
     * @return \Illuminate\Http\Response
     */
    public function registerViaEmail(CURequest $request);
    /**
     * @apiVersion 1.0.0
     * @apiHeader {String} Accept=application/json Content-Types that are acceptable for the response
     * @apiHeader {String} X-CSRF-TOKEN The CSRF that has been received in <code>system/get-x-csrf</code> Api
     * @apiGroup 1. Authorization
     * @api {patch} api/activate Account activation
     * @apiName AccountActivation
     * @apiDescription This Api will be used to activate user account after registration via email activation code
     * @apiParam {String} email This attribute should define the unique email address, that has not been registered before in this system.
     * @apiParam {String} verification_code This is a 5 digit randomly generated code.
     * @apiUse TokenMismatchException
     * @apiUse ValidationException
     * @apiUse InvalidVerificationCodeProvided
     * @apiUse AccessGranted
     *
     * @param \OBS\Http\Requests\Users\AARequest $request
     * @return \Illuminate\Http\Response
     */
    public function accountActivation(AARequest $request);
    /**
     * @apiVersion 1.0.0
     * @apiHeader {String} Accept=application/json Content-Types that are acceptable for the response
     * @apiHeader {String} X-CSRF-TOKEN The CSRF that has been received in <code>system/get-x-csrf</code> Api
     * @apiGroup 1. Authorization
     * @api {patch} api/login User login via Email
     * @apiName User Login
     * @apiDescription This Api will be used to login in to system via email / password
     * @apiParam {String} email This attribute should define the unique email address.
     * @apiParam {String} Password Logging in account password, this password should be relevant to provided email address.
     * @apiUse TokenMismatchException
     * @apiUse ValidationException
     * @apiUse InvalidVerificationCodeProvided
     * @apiUse AccessGranted
     * @apiUse NotVerifiedYet
     * @apiUse InvalidCredentials
     *
     * @param \OBS\Http\Requests\Users\USRequest $request
     * @return \Illuminate\Http\Response
     */
    public function userSignIn(USRequest $request);
    /**
     * @apiVersion 1.0.0
     * @apiHeader {String} Accept=application/json Content-Types that are acceptable for the response
     * @apiHeader {String} X-CSRF-TOKEN The CSRF that has been received in <code>system/get-x-csrf</code> Api
     * @apiGroup 1. Authorization
     * @api {post} api/forgot-password Forgot password
     * @apiName Forgot Password
     * @apiDescription This Api will be used to retreive the password using verification code via email
     * @apiParam {String} email This attribute should define the unique email address.
     * @apiUse TokenMismatchException
     * @apiUse ValidationException
     * @apiUse VerificationEmailSent
     * @param \OBS\Http\Requests\Users\FPRequest $request
     * @return \Illuminate\Http\Response
     */
    public function forgotPassword(FPRequest $request);
    /**
     * @apiVersion 1.0.0
     * @apiHeader {String} Accept=application/json Content-Types that are acceptable for the response
     * @apiHeader {String} X-CSRF-TOKEN The CSRF that has been received in <code>system/get-x-csrf</code> Api
     * @apiGroup 1. Authorization
     * @api {patch} api/reset-password Reset Password
     * @apiName Reset Password
     * @apiDescription This Api will be used to update the password
     * @apiParam {String} email This attribute should define the unique email address.
     * @apiParam {String} password This attribute should define the new password for user account.
     * @apiUse TokenMismatchException
     * @apiUse ValidationException
     * @apiUse PasswordUpdated
     *
     * @param \OBS\Http\Requests\Users\RPRequest $request
     * @return \Illuminate\Http\Response
     */
    public function resetPassword(RPRequest $request);

    /**
     * @apiVersion 1.0.0
     * @apiHeader {String} Accept=application/json Content-Types that are acceptable for the response
     * @apiHeader {String} X-CSRF-TOKEN The CSRF that has been received in <code>system/get-x-csrf</code> Api
     * @apiGroup 1. Authorization
     * @api {patch} api/verify-email Verify Email for Reset Password
     * @apiName Verify Email
     * @apiDescription This Api will be used to verify email for password reset
     * @apiParam {String} email This attribute should define the unique email address.
     * @apiParam {String} verification_code This attribute should define the verification code provided via email.
     * @apiUse TokenMismatchException
     * @apiUse ValidationException
     * @apiUse InvalidVerificationCodeProvided
     * @apiUse VerificationCodeValid
     *
     * @param \OBS\Http\Requests\Users\VACRequest $request
     * @return \Illuminate\Http\Response
     */
    public function verifyActivationCode(VACRequest $request);

    /**
     * @apiVersion 1.0.0
     * @apiHeader {String} Accept=application/json Content-Types that are acceptable for the response
     * @apiHeader {String} X-CSRF-TOKEN The CSRF that has been received in <code>system/get-x-csrf</code> Api
     * @apiGroup 1. Authorization
     * @api {patch} api/resend-verification-code Resend Verification Code
     * @apiName Resend Verification Code
     * @apiDescription This Api will be used to resend verification code via email
     * @apiParam {String} email This attribute should define the unique email address.
     * @apiUse TokenMismatchException
     * @apiUse ValidationException
     * @apiUse VerificationEmailSent
     * @apiUse InvalidAccountProvided
     * @param \OBS\Http\Requests\Users\RVCRequest $request
     * @return \Illuminate\Http\Response
     */
    public function resendVerificationCode(RVCRequest $request);
    /**
     * @apiVersion 1.0.1
     * @apiHeader {String} Accept=application/json Content-Types that are acceptable for the response
     * @apiHeader {String} X-CSRF-TOKEN The CSRF that has been received in <code>system/get-x-csrf</code> Api
     * @apiGroup 1. Authorization
     * @api {post} api/login-via-social-app Login with Social Applications
     * @apiName LoginViaSocialApp
     * @apiDescription This Api will help users to merge their social accounts (permanent identity) with
     * applications account. In this way, users will be able to synchronize their account application details,
     * such as level, score, total reading details etc. with our cloud system. There are two types of token,
     * that can be pass to this Api. <code>Only one of them is required</code>. If guest user login with Social APP,
     * its guest account will be connected to social account.
     * @apiParam {String} facebook-access-token Facebook access token, received after facebook user login,
     * token should have permission access from user against his email, date of birth and gender
     * @apiParam {String} google-plus-access-token Google plus access token, received after g-plus user login,
     * token should have permission access from user against his email, date of birth and gender
     * @apiUse JWTException
     * @apiUse TokenBlacklistedException
     * @apiUse TokenExpiredException
     * @apiUse TokenInvalidException
     * @apiUse ValidationException
     * @apiUse AccountBlockedException
     * @apiUse AccessGranted
     * @param \OBS\Http\Requests\Users\LVSARequest $request
     * @return \Illuminate\Http\Response
     */
    public function loginViaSocialApp(LVSARequest $request);
    /**
     * @apiVersion 1.0.1
     * @apiHeader {String} Accept=application/json Content-Types that are acceptable for the response
     * @apiHeader {String} X-CSRF-TOKEN The CSRF that has been received in <code>system/get-x-csrf</code> Api
     * @apiHeader {String} Authorization Authorization header will hold the system generated token, that
     * was generated in <code>users/register</code> Api call. e.g. <code>Authorization: Bearer y04Njk3LTA0MjYzIi</code>
     * @apiGroup 1. Authorization
     * @api {patch} api/set-bmi BMI
     * @apiName SaveBmiValues
     * @apiDescription This Api will help to update user stats with height, weight, age which we later can use to
     * calculate BMI.
     * @apiParam {String} email This attribute should define the unique email address.
     * @apiParam {Numeric} height This will define the height of the user
     * @apiParam {NUmeric} start_weight This will define the weight of the user
     * @apiParam {integer} age This will define the user's age
     * @apiUse TokenExpiredException
     * @apiUse TokenInvalidException
     * @apiUse ValidationException
     * @apiUse InvalidAccountProvided
     * @apiUse RecordUpdated
     * @param \OBS\Http\Requests\Users\SBMIRequest $request
     * @return \Illuminate\Http\Response
     */
    public function saveBmiValues(SBMIRequest $request);
    /**
     * @apiVersion 1.0.1
     * @apiHeader {String} Accept=application/json Content-Types that are acceptable for the response
     * @apiHeader {String} X-CSRF-TOKEN The CSRF that has been received in <code>system/get-x-csrf</code> Api
     * @apiHeader {String} Authorization Authorization header will hold the system generated token, that
     * was generated in <code>users/register</code> Api call. e.g. <code>Authorization: Bearer y04Njk3LTA0MjYzIi</code>
     * @apiGroup 2. User Activities
     * @api {post} api/update-profile Update User Profile
     * @apiName UpdateUserProfile
     * @apiDescription This Api will help to update user profile with phone-no and latitude and longitude alongwith
     * user stats to calculate estimated due date e.g: first-day-last-period, cycle-length OR conceive-date.
     * @apiParam {double} latitude This will latitude of the user's location
     * @apiParam {double} longitude This will define the longitude of the user's location
     * @apiParam {string} phone-number Users phone number
     * @apiParam {integer} due_date_calc_flag This flag value define if we have the conceive date or not
     * if due_date_calc_flag = 1, then we will also need first_day_last_period and cycle_length OR
     * if due_date_calc_flag = 2, then we will require conceive_date
     * @apiParam {date} first_day_last_period this date will define the first day of the last period
     * @apiParam {integer} cycle_length this will define the total time of the last periods
     * @apiParam {date} conceive_date this is the conceive date value
     * @apiUse ValidationException
     * @apiUse InvalidAccountProvided
     * @apiUse RecordUpdated
     * @param \OBS\Http\Requests\Users\UUPRequest $request
     * @return \Illuminate\Http\Response
     */
    public function updateUserProfile(UUPRequest $request);

    /**
     * @apiVersion 1.0.1
     * @apiHeader {String} Accept=application/json Content-Types that are acceptable for the response
     * @apiHeader {String} X-CSRF-TOKEN The CSRF that has been received in <code>system/get-x-csrf</code> Api
     * @apiHeader {String} Authorization Authorization header will hold the system generated token, that
     * was generated in <code>users/register</code> Api call. e.g. <code>Authorization: Bearer y04Njk3LTA0MjYzIi</code>
     * @apiGroup 2. User Activities
     * @api {post} api/profile-picture upload profile picture
     * @apiName uploadProfilePicture
     * @apiDescription This Api will help user to upload his profile picture
     * @apiParam {Image} picture This is user ptofile picture
     * @apiUse ValidationException
     * @apiUse InvalidAccountProvided
     * @apiUse PictureUploaded
     * @param \OBS\Http\Requests\Users\UPPRequest $request
     * @return \Illuminate\Http\Response
     */
    public function uploadProfilePicture(UPPRequest $request);

}