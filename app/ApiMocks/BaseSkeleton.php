<?php

namespace OBS\ApiMocks;

interface BaseSkeleton
{

    /**
     * Response payloads definition list:
     * // ERROR RESPONSES ///////////////
     * 1. TokenMismatchException
     * 2. JWTException
     * 3. InvalidTokenProvided
     * 4. TokenBlacklistedException
     * 5. TokenExpiredException
     * 6. TokenInvalidException
     * 7. ValidationException
     * 8. AccountBlockedException
     * 9. NotFoundException
     * 10. AccountDisabled
     * 11. PrivilegeException
     * 12. InvalidAccountProvided
     * 13. NotVerifiedYet
     * 14. InvalidCredentials
     * 15. InvalidVerificationCodeProvided
     * 16. InvalidOldPasswordProvided
     * 17. UnAuthorized
     * 18. InValidEmailAddress
     * // SUCCESS RESPONSES ///////////////
     * 1. AccessGranted
     * 2. VerificationEmailSent
     * 3. SuccessfullyLoggedIn
     * 4. RequireUserAction
     * 5. ResponseReceived
     * 6. TokenRefreshed
     * 7. RecordUpdated
     * 8. ProcessCompleted
     * 9. FileDownload
     * 10. VerificationCodeValid
     * 11. PasswordUpdated
     * 12. RecordRemoved
     * 13. PictureUploaded
     * 14. PictureRemoved
     * 15. NotificationDelivered
     * 16. NotificationFailed
     * 17. LogoutSuccessfully
     * 18. EmailAddressUpdatedSuccessfully
     * 19. SuccessfulRegistration
     * 20. NotAvailable
     * 21. NotesAdded
     * 22. AppointmentBooked
     * 23. AppointmentUpdated
     * 24. AppointmentDeleted
     */

    ####################################################################################################################
    #------------------------------------------------------------------------------------------------------------------#
    #                                                 Error Response                                                   #
    #------------------------------------------------------------------------------------------------------------------#
    ####################################################################################################################
    /**
     * @apiDefine TokenMismatchException
     * @apiError {String} type=TokenMismatchException This will define the type of error
     * @apiError {String} message Invalid token has been provided
     * @apiErrorExample  {json} Invalid Token Exception:
     *     Error 401: Unauthorized
     *
     *     Date: Wed, 16 Nov 2016 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *     {
     *         "error": {
     *              "type": "TokenMismatchException",
     *              "message": "Invalid token has been provided"
     *         }
     *     }
     */
    /**
     * @apiDefine JWTException
     * @apiError {String} type=JWTException This will define the invalid token exception
     * @apiError {String} message This exception will come in case of invalid token
     * @apiErrorExample  {json} JWT Exception:
     *     Error 401: Unauthorized
     *
     *     Date: Wed, 16 Nov 2016 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *         "error": {
     *              "type": "JWTException",
     *              "message": "Sorry! you are not authenticate to perform this action"
     *         }
     *     }
     */
    /**
     * @apiDefine InvalidTokenProvided
     * @apiError {String} type=InvalidTokenProvided This will define the blacklist token exception
     * @apiError {String} message This exception will come in case of invalid token
     * @apiErrorExample  {json} Invalid Token Provided:
     *     Error 412: Precondition Failed
     *
     *     Date: Wed, 16 Nov 2016 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *         "error": {
     *              "type": "InvalidTokenProvided",
     *              "message": "Sorry! system is not able to access your account information now, please try later"
     *         }
     *     }
     */
    /**
     * @apiDefine InvalidAppointmentRecord
     * @apiError {String} type=InvalidAppointmentRecord This will define the invalid appoinment record exception
     * @apiError {String} message This exception will come if there is no record against that record id
     * @apiErrorExample  {json} Invalid Appointment id Provided:
     *     Error 404: HTTP NOT FOUND
     *
     *     Date: Wed, 16 Nov 2016 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *         "error": {
     *              "type": "InvalidAppointmentRecord",
     *              "message": "Sorry! requested appointment does not exist"
     *         }
     *     }
     */
    /**
     * @apiDefine TokenBlacklistedException
     * @apiError {String} type=TokenBlacklistedException This will define the blacklist token exception
     * @apiError {String} message This exception will come in case of invalid token
     * @apiErrorExample  {json} Blacklisted Exception:
     *     Error 401: Unauthorized
     *
     *     Date: Wed, 16 Nov 2016 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *         "error": {
     *              "type": "TokenBlacklistedException",
     *              "message": "Sorry! token has been blacklisted"
     *         }
     *     }
     */
    /**
     * @apiDefine TokenExpiredException
     * @apiError {String} type=TokenExpiredException This will define the expired token exception
     * @apiError {String} message This exception will come in case of expired token
     * @apiErrorExample  {json} Expired Exception:
     *     Error 401: Unauthorized
     *
     *     Date: Wed, 16 Nov 2016 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *         "error": {
     *              "type": "TokenExpiredException",
     *              "message": "Sorry! token has been expired"
     *         }
     *     }
     */
    /**
     * @apiDefine TokenInvalidException
     * @apiError {String} type=TokenInvalidException This will define the invalid token exception
     * @apiError {String} message This exception will come in case of invalid token
     * @apiErrorExample  {json} Invalid Exception:
     *     Error 401: Unauthorized
     *
     *     Date: Wed, 16 Nov 2016 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *         "error": {
     *              "type": "TokenInvalidException",
     *              "message": "Sorry! invalid token has been provided"
     *         }
     *     }
     */
    /**
     * @apiDefine ValidationException
     * @apiError {String} type=ValidationException This will define the type of error
     * @apiError {String} field The name of post object
     * @apiError {String} message The error description against relevant field
     * @apiErrorExample  {json} Validation Exception:
     *     Error 422: Unprocessable Entity
     *
     *     Date: Wed, 16 Nov 2016 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *    {
     *      "error": {
     *        "type": "ValidationException",
     *        "field": "full-name",
     *        "message": "The full-name may not be greater than 254 characters.",
     *        "rule": "max",
     *        "rule_attributes": [
     *          "254"
     *        ]
     *      }
     *    }
     */
    /**
     * @apiDefine AccountBlockedException
     * @apiError {String} type=AccountBlockedException This will define the type of error
     * @apiError {String} message The error description of this error
     * @apiErrorExample  {json} Account Blocked:
     *     Error 423: Locked
     *
     *     Date: Wed, 16 Nov 2016 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *         "error": {
     *              "type": "AccountBlockedException",
     *              "message": "Sorry! your account has been temporarily blocked, please contact support for assistance"
     *         }
     *     }
     */
    /**
     * @apiDefine NotFoundException
     * @apiError {String} type=NotFoundException This will define the type of error
     * @apiError {String} message The error description of this error
     * @apiErrorExample  {json} Not Found Exception:
     *     Error 404: Not Found
     *
     *     Date: Wed, 16 Nov 2016 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *         "error": {
     *              "type": "NotFoundException",
     *              "message": "Whoops, looks like you got off at the working stop"
     *         }
     *     }
     */
    /**
     * @apiDefine AccountDisabled
     * @apiError {String} type=AccountDisabled This will define the type of error
     * @apiError {String} message The error description of this error
     * @apiErrorExample  {json} Account Disabled:
     *     Error 423: Locked
     *
     *     Date: Wed, 16 Nov 2016 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *         "error": {
     *              "type": "AccountDisabled",
     *              "message": "Sorry! your account has been disabled by admin, please contact support to access application"
     *         }
     *     }
     */
    /**
     * @apiDefine PrivilegeException
     * @apiError {String} type=PrivilegeException This will define the type of error
     * @apiError {String} message The error description of this error
     * @apiErrorExample  {json} Privilege Exception:
     *     Error 403: Forbidden
     *
     *     Date: Wed, 16 Nov 2016 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *         "error": {
     *              "type": "PrivilegeException",
     *              "message": "Sorry! you did not have specific privileges to perform this action"
     *         }
     *     }
     */
    /**
     * @apiDefine InvalidAccountProvided
     * @apiError {String} type=InvalidAccountProvided This will define the type of error
     * @apiError {String} message The error description of this error
     * @apiErrorExample  {json} Invalid Account Provided:
     *     Error 404: Not Found
     *
     *     Date: Wed, 16 Nov 2016 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *         "error": {
     *              "type": "InvalidAccountProvided",
     *              "message": "Sorry! system does not recognize your account, please correct your input and re-try"
     *         }
     *     }
     */
    /**
     * @apiDefine NotVerifiedYet
     * @apiError {String} type=NotVerifiedYet This will define the type of error
     * @apiError {String} message The error description of this error
     * @apiErrorExample  {json} Email Not Verified Yet:
     *     Error 423: Locked
     *
     *     Date: Wed, 16 Nov 2016 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *         "error": {
     *              "type": "NotVerifiedYet",
     *              "message": "Sorry! you have not verified your email address, please verify it before login",
     *              "email" => "user@email.com"
     *         }
     *     }
     */
    /**
     * @apiDefine InvalidCredentials
     * @apiError {String} type=InvalidCredentials This will define the type of error
     * @apiError {String} message The error description of this error
     * @apiErrorExample  {json} Invalid Credentials Provided:
     *     Error 404: Not Found
     *
     *     Date: Wed, 16 Nov 2016 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *         "error": {
     *              "type": "InvalidCredentials",
     *              "message": "Sorry! you have provided invalid credentials (email / password)"
     *         }
     *     }
     */
    /**
     * @apiDefine InvalidVerificationCodeProvided
     * @apiError {String} type=InvalidVerificationCodeProvided This will define the type of error
     * @apiError {String} message The error description of this error
     * @apiErrorExample  {json} Invalid Verification Code:
     *     Error 428: Precondition Required / Error 412: Precondition Failed
     *
     *     Date: Wed, 16 Nov 2016 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
                "error": {
                    "type": "InvalidVerificationCodeProvided",
                    "message": "Unable to complete your password reset request, invalid email address."
                }
           }
     */
    /**
     * @apiDefine InvalidOldPasswordProvided
     * @apiError {String} type=InvalidOldPasswordProvided This will define the type of error
     * @apiError {String} message The error description of this error
     * @apiErrorExample  {json} Invalid Old Password Provided:
     *     Error 412: Precondition Failed
     *
     *     Date: Wed, 16 Nov 2016 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *         "error": {
     *              "type": "InvalidOldPasswordProvided",
     *              "message": "Sorry! you have provided invalid previous password"
     *         }
     *     }
     */
    /**
     * @apiDefine NotRegisteredYet
     * @apiError {String} type=NotRegisteredYet This will define the type of error
     * @apiError {String} message The error description of this error
     * @apiErrorExample  {json} User is not registered:
     *     Error 412: Precondition Failed
     *
     *     Date: Wed, 16 Nov 2016 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *         "error": {
     *              "type": "NotRegisteredYet",
     *              "message": "Sorry! you must have to register before using this feature"
     *         }
     *     }
     */
    /**
     * @apiDefine UnAuthorized
     * @apiError {String} type=UnAuthorized This will define the type of error
     * @apiError {String} message The error description of this error
     * @apiErrorExample  {json} User is not authorized:
     *     Error 412: Precondition Failed
     *
     *     Date: Wed, 16 Nov 2016 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *         "error": {
     *              "type": "UnAuthorized",
     *              "message": "Sorry! you are not authorized to perform this action"
     *         }
     *     }
     */
    ####################################################################################################################
    #------------------------------------------------------------------------------------------------------------------#
    #                                               Success Response                                                   #
    #------------------------------------------------------------------------------------------------------------------#
    ####################################################################################################################
    /**
     * @apiDefine AccessGranted
     * @apiSuccess {String} type=AccessGranted
     * @apiSuccess {String} token System generated token, this token will expire with in an hour.
     * Application must call "refresh-access-token" to renew access
     * @apiSuccess {String} message A success message, that will generate in case of success login
     * @apiSuccessExample  {json}  Success:
     *     HTTP/1.1 200 OK
     *
     *     Date: Wed, 16 Nov 2016 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *  {
            "success": {
                "type": "AccessGranted",
                "message": "Congrats! your account has been activated.",
                "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvb2JzLXNlcnZlci5hcHBcL2FwaVwvYWN0aXZhdGUiLCJpYXQiOjE1MjQ4MzAwMzksImV4cCI6MTUyNDgzMzYzOSwibmJmIjoxNTI0ODMwMDM5LCJqdGkiOiJjTHRNc2JLbVZ3VlNpQ3JCIiwic3ViIjo3NCwicHJ2IjoiMDVkMDA5N2RhZTFlZjc3NzBjYWE5OGMzNDc2NTM2N2Y3OTIyZTBiZiJ9.NYWjLr-NgQvQnXgscuMyXqtrrkpqzX4-jE6NC-BGiGo",
                "user": {
                    "user_id": 2,
                    "full_name": "Lopez ",
                    "email": "lopez@mailinator.com",
                    "phone": "+923435481100",
                    "gplus_reference": "",
                    "facebook_reference": "",
                    "device_token": "",
                    "location": "",
                    "uuid": 8238,
                    "timezone": "GMT+5",
                    "forgot_password_request": "",
                    "image_path": "",
                    "created_at": 1526799032,
                    "deleted_at": "",
                    "status": "active",
                    "latitude": 190.343,
                    "longitude": 127.34
                },
                "user_stats": [
                    {
                        "user_id_fk": 2,
                        "dob": null,
                        "due_date_calc_flag": 2,
                        "first_day_last_period": null,
                        "cycle_length": null,
                        "conceive_date": 1514764800,
                        "created_at": 1526799032,
                        "deleted_at": null,
                        "height": 0,
                        "start_weight": 0,
                        "age": 0,
                        "estimated_due_date": 153895680
                    }
                ]
            }
     *   }
     */
    /**
     * @apiDefine VerificationEmailSent
     * @apiSuccess {String} type=VerificationEmailSent
     * @apiSuccess {String} message A success message, that will generate in case of success login
     * @apiSuccessExample  {json} Success:
     *     HTTP/1.1 200 OK
     *
     *     Date: Wed, 16 Nov 2016 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *  {
            "success": {
                "type": "VerificationEmailSent",
                "message": "Success! an email has been sent to your mail box, please follow the described process in email to verify your email"
            }
        }
     */
    /**
     * @apiDefine SuccessfullyLoggedIn
     * @apiSuccess {String} type=SuccessfullyLoggedIn
     * @apiSuccess {Array} user Logged in user information, this information will be send in the form of key-pair object
     * @apiSuccessExample  {json} Success:
     *     HTTP/1.1 200 OK
     *
     *     Date: Wed, 16 Nov 2016 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *  {
            "success": {
                "type": "AccessGranted",
                "message": "Congrats! your account has been activated.",
                "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvb2JzLXNlcnZlci5hcHBcL2FwaVwvYWN0aXZhdGUiLCJpYXQiOjE1MjQ4MzAwMzksImV4cCI6MTUyNDgzMzYzOSwibmJmIjoxNTI0ODMwMDM5LCJqdGkiOiJjTHRNc2JLbVZ3VlNpQ3JCIiwic3ViIjo3NCwicHJ2IjoiMDVkMDA5N2RhZTFlZjc3NzBjYWE5OGMzNDc2NTM2N2Y3OTIyZTBiZiJ9.NYWjLr-NgQvQnXgscuMyXqtrrkpqzX4-jE6NC-BGiGo",
                "user": {
                    "user_id": 74,
                    "full_name": "TEST",
                    "email": "test@mailinator.com",
                    "phone": null,
                    "gplus_reference": null,
                    "facebook_reference": null,
                    "device_token": null,
                    "location": null,
                    "lat": null,
                    "long": null,
                    "uuid": 42382,
                    "timezone": "GMT+5",
                    "forgot_password_request": null,
                    "image_path": null,
                    "created_at": "2018-04-27 11:17:14",
                    "deleted_at": null,
                    "status": "active"
                },
                "user_stats": [
                    {
                        "user_id_fk": 74,
                        "dob": null,
                        "height": 0,
                        "start_weight": 0,
                        "first_day_last_period": null,
                        "cycle_length": 0,
                        "conceive_date": null,
                        "created_at": "2018-04-27 11:17:14",
                        "deleted_at": null
                    }
                ]
            }
    *   }
     */

    /**
     * @apiDefine ResponseReceived
     * @apiSuccess {String} type=ResponseReceived
     * @apiSuccess {String} X-CSRF-TOKEN System generated CSRF token, this token will use in <code>users/register</code> call
     * @apiSuccessExample  {json} Success:
     *     HTTP/1.1 200 OK
     *
     *     Date: Wed, 16 Nov 2016 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Set-Cookie: nap_app_secure_info=073bd41729; Max-Age=7200; Expires=Wed, 16-Nov-2016 11:33:07 GMT; Path=/; HttpOnly
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *         "success": {
     *              "type": "ResponseReceived",
     *              "X-CSRF-TOKEN": "RPB9I23GABY0936FAFF"
     *         }
     *     }
     */
    /**
     * @apiDefine TokenRefreshed
     * @apiSuccess {String} type=TokenRefreshed
     * @apiSuccess {String} token System generated access token, this token will use to access system APIs
     * @apiSuccessExample  {json} Success:
     *     HTTP/1.1 200 OK
     *
     *     Date: Wed, 16 Nov 2016 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *         "success": {
     *              "type": "TokenRefreshed",
     *              "token": "RPB9I23GABY0936FAFFING9I23GABY0936FAFF"
     *         }
     *     }
     */
    /**
     * @apiDefine RecordSaved
     * @apiSuccess {String} type=RecordSaved
     * @apiSuccess {String} message A system generated success message, on success response
     * @apiSuccessExample  {json} Success:
     *     HTTP/1.1 200 OK
     *
     *     Date: Wed, 16 Nov 2016 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *         "success": {
     *              "type": "RecordSaved",
     *              "message": "Success! record has been saved"
     *         }
     *     }
     */
    /**
     * @apiDefine RecordUpdated
     * @apiSuccess {String} type=RecordUpdated
     * @apiSuccess {String} message A system generated success message, on success response
     * @apiSuccessExample  {json} Success:
     *     HTTP/1.1 200 OK
     *
     *     Date: Wed, 16 Nov 2016 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *          "success": {
     *              "type": "RecordUpdated",
     *              "message": "Success! record has been updated",
     *              "data": {
     *                  "due_date_calc_flag": "2",
     *                  "first_day_last_period": 1515974400,
     *                  "cycle_length": "",
     *                  "conceive_date": 1529884800,
     *                  "estimated_due_date": 1556150400
     *              }
     *          }
     *      }
     */
    /**
     * @apiDefine RecordRemoved
     * @apiSuccess {String} type=RecordRemoved
     * @apiSuccess {String} message A system generated success message, on success response
     * @apiSuccessExample  {json} Success:
     *     HTTP/1.1 200 OK
     *
     *     Date: Wed, 16 Nov 2016 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *         "success": {
     *              "type": "RecordRemoved",
     *              "message": "Success! record has been removed"
     *         }
     *     }
     */
    /**
     * @apiDefine ProcessCompleted
     * @apiSuccess {String} type=ProcessCompleted
     * @apiSuccess {String} message A system generated success message, on success response
     * @apiSuccessExample  {json} Process Completed:
     *     HTTP/1.1 200 OK
     *
     *     Date: Wed, 16 Nov 2016 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *         "success": {
     *              "type": "ProcessCompleted",
     *              "message": "Success! your required request has been proceeded"
     *         }
     *     }
     */
    /**
     * @apiDefine FileDownload
     * @apiSuccessExample  {download} Success:
     *      HTTP/1.1 200 OK
     *      Content-Type: application/force-download
     *      Content-Length: 836271
     *      Content-Disposition: attachment; filename=en_translation.txt
     */
    /**
     * @apiDefine VerificationCodeValid
     * @apiSuccess {String} type=VerificationCodeValid
     * @apiSuccess {String} message A system generated success message, on success response
     * @apiSuccessExample  {json} Success:
     *     HTTP/1.1 200 OK
     *
     *     Date: Wed, 16 Nov 2016 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *         "success": {
     *              "type": "VerificationCodeValid",
     *              "message": "Success! provided verification is valid"
     *         }
     *     }
     */
    /**
     * @apiDefine PasswordUpdated
     * @apiSuccess {String} type=PasswordUpdated
     * @apiSuccess {String} message A system generated success message, on success response
     * @apiSuccessExample  {json} Success:
     *     HTTP/1.1 200 OK
     *
     *     Date: Wed, 16 Nov 2016 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
            {
                "success": {
                    "type": "PasswordUpdated",
                    "message": "Congrats! new password has been saved"
                }
            }
     */
    /**
     * @apiDefine RecordRemoved
     * @apiSuccess {String} type=RecordRemoved
     * @apiSuccess {String} message A system generated success message, on success response
     * @apiSuccessExample  {json} Success:
     *     HTTP/1.1 200 OK
     *
     *     Date: Wed, 16 Nov 2016 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *         "success": {
     *              "type": "RecordRemoved",
     *              "message": "Success! your selected entry has been removed"
     *         }
     *     }
     */
    /**
     * @apiDefine PictureUploaded
     * @apiSuccess {String} type=PictureUploaded
     * @apiSuccess {String} message A system generated success message, on success response
     * @apiSuccessExample  {json} Picture Uploaded:
     *     HTTP/1.1 200 OK
     *
     *     Date: Wed, 16 Nov 2016 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *         "success": {
     *              "type": "PictureUploaded",
     *              "message": "User profile picture uploaded",
     *              "image_path": "storage/profile_pictures/user_120.jpeg"
     *         }
     *     }
     */
    /**
     * @apiDefine PictureRemoved
     * @apiSuccess {String} type=PictureRemoved
     * @apiSuccess {String} message A system generated success message, on success response
     * @apiSuccessExample  {json} Picture Removed:
     *     HTTP/1.1 200 OK
     *
     *     Date: Wed, 16 Nov 2016 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *         "success": {
     *              "type": "PictureRemoved",
     *              "message": "Success! picture has been removed from system"
     *         }
     *     }
     */
    /**
     * @apiDefine NotificationDelivered
     * @apiSuccess {String} type=NotificationDelivered
     * @apiSuccess {String} message A system generated success message, on success response
     * @apiSuccessExample  {json} Notification Sent:
     *     HTTP/1.1 200 OK
     *
     *     Date: Wed, 16 Nov 2016 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *     {
     *          success: {
     *              "type": "NotificationDelivered",
     *              "message": "Notification delivered successfully!"
     *          }
     *     }
     */
    /**
     * @apiDefine NotificationFailed
     * @apiError {String} type=NotificationFailed This will define the type of error
     * @apiError {String} message The error description of this error
     * @apiErrorExample  {json} Push Notification Failed to Send:
     *     Error 500: Internal Server Error
     *
     *     Date: Wed, 16 Nov 2016 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *         "error": {
     *              "type": "NotificationFailed",
     *              "message": "Sorry! system is not able to complete send-notification, please re-initiate process"
     *         }
     *     }
     */
    /**
     * @apiDefine LogoutSuccessfully
     * @apiSuccess {String} type=LogoutSuccessfully
     * @apiSuccess {String} message A system generated success message, on success response
     * @apiSuccessExample  {json} Success:
     *     HTTP/1.1 200 OK
     *
     *     Date: Wed, 16 Nov 2016 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *         "success": {
     *              "type": "LogoutSuccessfully",
     *              "message": "User Logout Successfully!"
     *          }
     *     }
     */
    /**
     * @apiDefine EmailAddressUpdatedSuccessfully
     * @apiSuccess {String} type=EmailAddressUpdatedSuccessfully
     * @apiSuccess {String} message A success message, that will generate in case of success email id update
     * @apiSuccessExample  {json} Successfully email updated:
     *     HTTP/1.1 200 OK
     *
     *     Date: Wed, 16 Nov 2016 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *     {
     *           "success": {
     *              "type": "EmailAddressUpdatedSuccessfully",
     *              "message": "Success, User email address updated",
     *          }
     *      }
     */
    /**
     * @apiDefine NotesAdded
     * @apiSuccess {String} type=PictureUploaded
     * @apiSuccess {String} message A system generated success message, on success response
     * @apiSuccessExample  {json} User notes added for the appointment:
     *     HTTP/1.1 200 OK
     *
     *     Date: Wed, 16 Nov 2018 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *         "success": {
     *              "type": "NotesAdded",
     *              "message": "User notes added for the appointment",
     *              "notes": "Any notes about the appointment"
     *         }
     *     }
     */
    /**
     * @apiDefine AppointmentBooked
     * @apiSuccess {String} type=AppointmentBooked
     * @apiSuccess {String} message A system generated success message, on success response
     * @apiSuccessExample  {json} Appointment data saved
     *     HTTP/1.1 200 OK
     *
     *     Date: Wed, 16 Nov 2018 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *       {
     *          "success": {
     *          "type": "AppointmentBooked",
     *              "message": "Appointment data saved",
     *              "appointment": {
     *                  "appointment_id": 14,
     *                  "appointment_time": 1544799600,
     *                  "doctor_id": 1,
     *                  "patient_id": 2,
     *                  "location": "Civil Lines, Rawalpindi,Pakistan",
     *                  "pregnancy_week": 10,
     *                  "appointment_type": "doctor",
     *                  "created_at": 1532424157,
     *                  "updated_at": 1532424157,
     *                  "status": 0,
     *                  "notes": null,
     *                  "overview": "lorem ipsum lorem ipsum",
     *                  "labs": "CBP, Blood Group",
     *                  "doctor_detail": {
     *                      "doctor_id": 1,
     *                      "first_name": "Brig Waqar",
     *                      "last_name": "Ahmed",
     *                      "title": "Gynaecologist",
     *                      "qualifications": "MBBS FCPS",
     *                      "gender": "Male",
     *                      "languages": "English, Urdu",
     *                      "created_at": null,
     *                      "updated_at": null
     *                  }
     *              }
     *          }
     *      }
     */
    /**
     * @apiDefine GpNotSelected
     * @apiSuccess {String} type=GpNotSelected
     * @apiSuccess {String} message A system generated success message, on success response
     * @apiSuccessExample  {json} user does not have a gp assigned
     *     HTTP/1.1 200 OK
     *
     *     Date: Wed, 16 Nov 2018 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *         "success": {
     *              "type": "GpNotSelected",
     *              "message": "Select gp before appointment booking",
     *         }
     *     }
     */
    /**
     * @apiDefine GetAppointmentList
     * @apiSuccess {String} type=GetAppointmentList
     * @apiSuccess {String} message A system generated success message, on success response
     * @apiSuccessExample  {json} Appointments list
     *     HTTP/1.1 200 OK
     *
     *     Date: Wed, 16 Nov 2018 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *         "success": {
     *              "type": "GetAppointmentList",
     *              "message": "Appointments list",
     *              "appointment_list": [
     *                   {
     *                      "appointment_id": 1,
     *                      "appointment_time": "1530443700",
     *                      "doctor_id": 1,
     *                      "patient_id": 2,
     *                      "location": "WEST BEACH SA 5024",
     *                      "pregnancy_week": 23,
     *                      "appointment_type": "hospital",
     *                      "created_at": "2018-06-11 09:44:40",
     *                      "updated_at": "2018-06-11 09:44:40",
     *                      "status": 0,
     *                      "notes": null,
     *                      "hospital_id": 0,
     *                      "lab_id": 0,
     *                      "overview": "",
     *                      "labs": "Morphology scan",
     *                      "doctor_detail": null,
     *                      "hospital_detail": null,
     *                      "doctor_detail": {
     *                          "doctor_id": 1,
     *                          "first_name": "Daniel",
     *                          "last_name": "Mark",
     *                          "title": "Gynaecologist",
     *                          "qualifications": "MBBS FCPS",
     *                          "gender": "Male",
     *                          "langauges": "French, English",
     *                          "created_at": null,
     *                          "updated_at": null
     *                       }
     *                  }
     *                  .
     *                  .
     *                  .
     *                  .
     *              ]
     *         }
     *     }
     */
    /**
     * @apiDefine editAppointment
     * @apiSuccess {String} type=editAppointment
     * @apiSuccess {String} message A system generated success message, on success response
     * @apiSuccessExample  {json} User appointment is updated successfully
     *     HTTP/1.1 200 OK
     *
     *     Date: Wed, 16 Nov 2018 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *         'success' => {
     *              'type' => 'AppointmentUpdated',
     *              'message' => 'User appointment is updated successfully',
     *              'appointment_datetime' => "2018-06-11 09:44:40"
                }
     *     }
     */
    /**
     * @apiDefine deleteAppointment
     * @apiSuccess {String} type=deleteAppointment
     * @apiSuccess {String} message A system generated success message, on success response
     * @apiSuccessExample  {json} User appointment is deleted successfully
     *     HTTP/1.1 200 OK
     *
     *     Date: Wed, 16 Nov 2018 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *         'success' => {
     *              'type' => 'AppointmentDeleted',
     *              'message' => 'Appointment deleted successfully',
     *          }
     *     }
     */
    /**
     * @apiDefine GetGpHospitalLabList
     * @apiSuccess {String} type=GetGpHospitalLabList
     * @apiSuccess {String} message A system generated success message, on success response
     * @apiSuccessExample  {json} Get gps list with schedules
     *     HTTP/1.1 200 OK
     *
     *     Date: Wed, 16 Nov 2018 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *         'success' => {
     *              'type' => 'GetGpHospitalLabList',
     *              'message' => 'Get gps, hospitals and labs list',
     *              "gps": [
     *                       {
     *                           "doctor_id": 1,
     *                           "first_name": "Brig Waqar",
     *                           "last_name": "Ahmed",
     *                            "title": "Gynaecologist",
     *                            "qualifications": "MBBS FCPS",
     *                            "gender": "Male",
     *                            "langauges": "English, Urdu",
     *                            "created_at": null,
     *                            "updated_at": null,
     *                            "schedules": [
     *                              {
     *                                      "schedule_id": 1,
     *                                      "doctor_id": 1,
     *                                      "location": "Civil Lines, Rawalpindi,Pakistan",
     *                                      "phone_no": "5146528",
     *                                      "postal_code": "46000",
     *                                      "time": "11:00-16:00",
     *                                          "created_at": null,
     *                                      "updated_at": null,
     *                                      "latitude": 33.5917,
     *                                      "longitude": 73.0663
     *                               }
     *                              ]
     *                          },
     *                           {
     *                               "doctor_id": 2,
     *                                   "first_name": "Muhammad",
     *                                   "last_name": "Ali",
     *                                   "title": "Gynaecologist",
     *                                   "qualifications": "MBBS FCPS",
     *                                   "gender": "Male",
     *                                   "langauges": "English, Urdu",
     *                                   "created_at": null,
     *                                   "updated_at": null,
     *                                   "schedules": [
     *                                       {
     *                                           "schedule_id": 2,
     *                                           "doctor_id": 2,
     *                                           "location": "Civil Lines, Rawalpindi,Pakistan",
     *                                           "phone_no": "5394285",
     *                                           "postal_code": "46000",
     *                                           "time": "11:00-16:00",
     *                                           "created_at": null,
     *                                           "updated_at": null,
     *                                           "latitude": 33.5306,
     *                                           "longitude": 73.0612
     *                                       }
     *                                   ]
     *                               }
     *                              .
     *                              .
     *                              .
     *                              .
     *                              .
     *                  "hospitals": [
     *                      {
     *                          "hospital_id": 1,
     *                          "dhs_id": 49,
     *                          "name": "Angaston District Hospital",
     *                          "address": "29 North Street",
     *                          "suburb": "Angaston",
     *                          "postcode": "5353",
     *                          "phone": "+61 8 8563 8500",
     *                          "subtype": "Public Acute",
     *                          "lat": "-34.9220048",
     *                          "lng": "171.5950892",
     *                          "created_at": "2018-07-31 12:33:23",
     *                          "updated_at": "2018-07-31 12:33:23"
     *                      },
     *                      {
     *                          "hospital_id": 2,
     *                          "dhs_id": 4401,
     *                          "name": "Ardrossan Community Hospital Inc",
     *                          "address": "37 Fifth Street",
     *                          "suburb": "Ardrossan",
     *                          "postcode": "5571",
     *                          "phone": "+61 8 8837 3021",
     *                          "subtype": "Private Acute",
     *                          "lat": "-34.9220048",
     *                          "lng": "171.5950892",
     *                          "created_at": "2018-07-31 12:33:23",
     *                          "updated_at": "2018-07-31 12:33:23"
     *                       }
     *
     *                       .
     *                       .
     *                       .
     *                  ],
     *                   "labs": [
     *                      {
     *                          "lab_id": 1,
     *                          "area": "Metropolitan",
     *                          "suburb": "Adelaide (136 North Terrace, Roma Mitchell House)",
     *                          "location": "Unit 15, 136 North Terrace Adelaide SA 5000",
     *                          "timings": "Mon-Fri 7:30am 12:00 noon, Sat 08:00am – 12 noon.",
     *                          "phone": "08 8222 3000",
     *                          "lat": "-34.9220048",
     *                          "lng": "138.5950892",
     *                          "created_at": "2018-07-31 12:34:35",
     *                          "updated_at": "2018-07-31 12:34:35"
     *                      },
     *                      {
     *                          "lab_id": 2,
     *                          "area": "Metropolitan",
     *                          "suburb": "Adelaide (Adelaide City General Practice)",
     *                          "location": "2nd Floor, 29 King William St, Adelaide SA 5000",
     *                          "timings": "Mon-Fri 8:30am to 1:30pm",
     *                          "phone": "08 8222 3000",
     *                          "lat": "-34.922628",
     *                          "lng": "138.599122",
     *                          "created_at": "2018-07-31 12:34:35",
     *                          "updated_at": "2018-07-31 12:34:35"
     *                      },
     *                      .
     *                      .
     *                      .
     *                      .
     *                    ]
     *
     *                  }
     *              }
     */
    /**
     * @apiDefine SelectedSuccessfully
     * @apiSuccess {String} type=SelectedSuccessfully
     * @apiSuccess {String} message A system generated success message, on success response
     * @apiSuccessExample  {json} User has selected the gp/hospital/lab successfully
     *     HTTP/1.1 200 OK
     *
     *     Date: Wed, 16 Nov 2018 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *         'success' => {
     *              'type' => 'SelectedSuccessfully',
     *              'message' => 'User has selected the gp/hospital/lab successfully',
     *              'user_id_fk' => 3,
     *          }
     *     }
     */
    /**
     * @apiDefine AppointmentUpdated
     * @apiSuccess {String} type=AppointmentUpdated
     * @apiSuccess {String} message A system generated success message, on success response
     * @apiSuccessExample  {json} User appointment is updated successfully
     *     HTTP/1.1 200 OK
     *
     *     Date: Wed, 16 Nov 2018 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *         'success' => {
     *              'type' => 'AppointmentUpdated',
     *              'message' => 'User appointment is updated successfully',
     *              'appointment_datetime' => '2018-09-01 12:00:00,
     *          }
     *     }
     */
    /**
     * @apiDefine AppointmentDeleted
     * @apiSuccess {String} type=AppointmentDeleted
     * @apiSuccess {String} message A system generated success message, on success response
     * @apiSuccessExample  {json} Appointment deleted successfully
     *     HTTP/1.1 200 OK
     *
     *     Date: Wed, 16 Nov 2018 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *         'success' => {
     *             'type' => 'AppointmentDeleted',
     *              'message' => 'Appointment deleted successfully',
     *          }
     *     }
     */
    /**
     * @apiDefine AppointmentAvailable
     * @apiSuccess {String} type=AppointmentAvailable
     * @apiSuccess {String} message A system generated success message, on success response
     * @apiSuccessExample  {json} User Appointment is available
     *     HTTP/1.1 200 OK
     *
     *     Date: Wed, 16 Nov 2018 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *         'success' => {
     *             'type' => 'AppointmentAvailable',
     *              'message' => 'User appointment detail',
     *              "appointment": {
     *                  "appointment_id": 14,
     *                  "appointment_time": 1544799600,
     *                  "doctor_id": 1,
     *                  "patient_id": 2,
     *                  "location": "Civil Lines, Rawalpindi,Pakistan",
     *                  "pregnancy_week": 10,
     *                  "appointment_type": "doctor",
     *                  "created_at": 1532424157,
     *                  "updated_at": 1532424157,
     *                  "status": 0,
     *                  "notes": null,
     *                  "doctor_detail": {
     *                      "doctor_id": 1,
     *                      "first_name": "Brig Waqar",
     *                      "last_name": "Ahmed",
     *                      "title": "Gynaecologist",
     *                      "qualifications": "MBBS FCPS",
     *                      "gender": "Male",
     *                      "languages": "English, Urdu",
     *                      "created_at": null,
     *                      "updated_at": null
     *                  }
     *              }
     *          }
     *     }
     */
    /**
     * @apiDefine NoAppointmentAvailable
     * @apiSuccess {String} type=NoAppointmentAvailable
     * @apiSuccess {String} message A system generated success message, on success response
     * @apiSuccessExample  {json} No User Appointment is available
     *     HTTP/1.1 200 OK
     *
     *     Date: Wed, 16 Nov 2018 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *         'success' => {
     *             'type' => 'NoAppointmentAvailable',
     *              'message' => 'User does not have any appointment',
     *          }
     *     }
     */
    /**
     * @apiDefine WeeklyAppointments
     * @apiSuccess {String} type=WeeklyAppointments
     * @apiSuccess {String} message A system generated success message, on success response
     * @apiSuccessExample  {json} User future weekly appointments
     *     HTTP/1.1 200 OK
     *
     *     Date: Wed, 16 Nov 2018 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *         'success' => {
     *             'type' => 'WeeklyAppointments',
     *              'message' => 'User future weekly appointments',
     *              "weekly_appointments": [
     *                  {
     *                      "weekly_appointment_id": 1,
     *                      "title": "First Hospital Appointment",
     *                      "overview": "Did you have your first hospital appointment?",
     *                      "week_no": 7,
     *                      "appointment_type": "hospital"
     *                  },
     *                  {
     *                      "weekly_appointment_id": 2,
     *                      "title": "First GP Appointment",
     *                      "overview": "Did you have your blood tests by GP or hospital( this info should go to DB)",
     *                      "week_no": 8,
     *                      "appointment_type": "gp"
     *                  },
     *              }
     *     }
     */

    /**
     * @apiDefine GetUserDoctorHospitalLabStatus
     * @apiSuccess {String} type=GetUserDoctorHospitalLabStatus
     * @apiSuccess {String} message A system generated success message, on success response
     * @apiSuccessExample  {json} User status of Hospital, Lab, and Gp
     *     HTTP/1.1 200 OK
     *
     *     Date: Wed, 16 Nov 2018 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *      {
     *          "success": {
     *              "type": "GetUserDoctorHospitalLabStatus",
     *              "message": "Get user doctor hospital lab status",
     *              "doctor_details": {
     *                  "doctor_id": 1,
     *                  "first_name": "Brig Waqar",
     *                  "last_name": "Ahmed",
     *                  "title": "Gynaecologist",
     *                  "qualifications": "MBBS FCPS",
     *                  "gender": "Male",
     *                  "languages": "English, Urdu",
     *                  "created_at": null,
     *                  "updated_at": null
     *              },
     *              "hospital_details": {
     *                  "hospital_id": 1,
     *                  "dhs_id": 49,
     *                  "name": "Angaston District Hospital",
     *                  "address": "29 North Street",
     *                  "suburb": "Angaston",
     *                  "postcode": "5353",
     *                  "phone": "+61 8 8563 8500",
     *                  "subtype": "Public Acute",
     *                  "lat": "-34.9220048",
     *                  "lng": "171.5950892",
     *                  "created_at": "2018-07-31 12:33:23",
     *                  "updated_at": "2018-07-31 12:33:23"
     *             },
     *              "lab_details": {
     *                  "lab_id": 2,
     *                  "area": "Metropolitan",
     *                  "suburb": "Adelaide (Adelaide City General Practice)",
     *                  "location": "2nd Floor, 29 King William St, Adelaide SA 5000",
     *                  "timings": "Mon-Fri 8:30am to 1:30pm",
     *                  "phone": "08 8222 3000",
     *                  "lat": "-34.922628",
     *                  "lng": "138.599122",
     *                  "created_at": "2018-07-31 12:34:35",
     *                  "updated_at": "2018-07-31 12:34:35"
     *              }
     *          }
     *      }
     *
     */

    /**
     * @apiDefine ListOfFaqQuestions
     * @apiSuccess {String} type=ListOfFaqQuestions
     * @apiSuccess {String} message A system generated success message, on success response
     * @apiSuccessExample  {json} Get the list of FAQs
     *     HTTP/1.1 200 OK
     *
     *     Date: Wed, 16 Jul 2018 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *      {
     *          "success": {
     *              "type": "ListOfFaqQuestions",
     *              "message": "Get list of faqs",
     *              "faq": [
     *                  {
     *                      "category_name": "First Appointment with GP",
     *                      "questions": [
     *                          {
     *                              "question_text": "What can i expect to happen at my first ante-natal appointment with my GP?",
     *                              "answer_text": "Your first visit with your GP is exciting ................. \n "
     *                          },
     *                          {
     *                              "question_text": "What is the telephone number of the SA Pregnancy Info-line?",
     *                              "answer_text": "1300 368 820 \n "
     *                          },
     *                          {
     *                              "question_text": "Where are the Public Hospitals located in Adelaide?",
     *                              "answer_text": " ** The Women's and Children's Hospital – ** 72 King William Street, North Adelaide SA \n "
     *                          }
     *                        ]
     *                     },
     *                      {
     *                          "category_name": "Investigations during pregnancy",
     *                          "questions": [
     *                              {
     *                                  "question_text": "What is an amniocentesis?",
     *                                  "answer_text": " An amniocentesis is a medical procedure performed to sample the fluid around the baby in the uterus (womb). The fluid is collected using a special needle inserted through the pregnant women's abdomen. \n "
     *                              },
     *                              {
     *                                  "question_text": "Why would an amniocentesis be performed?",
     *                                  "answer_text": " The most common reason is to test for Dow Syndrome or other chromosome or genetic conditions. The test is often offered because of a suspected chromosome or genetic condition found on ultrasound or other screening investigation. \n "
     *                              },
     *                              {
     *                                  "question_text": "Does it hurt?",
     *                                  "answer_text": "The pain from an amniocentesis needle is like having a blood test from your arm. Sometimes you may suffer with cramping pains or period-like pain. Most women will not require any pain relief following the procedure. \n "
     *                              },
     *                              {
     *                                  "question_text": "Are there any risks?",
     *                                  "answer_text": " There is a small risk of miscarriage in any pregnancy and having an amniocentesis may increase the over-all risk. The estimated risk of miscarriage due to an amniocentesis is less than 1in 200. \n "
     *                              },
     *
     *                      }
     *                   ]
     *                  .
     *                  .
     *                  .
     *                  .
     *                  .
     *                  .
     *              }
     *          }
     *
     */

    /**
     * @apiDefine ContactSaved
     * @apiSuccess {String} type=ContactSaved
     * @apiSuccess {String} message A system generated success message, on success response
     * @apiSuccessExample  {json} User contact is saved successfully
     *     HTTP/1.1 200 OK
     *
     *     Date: Wed, 16 Nov 2018 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *      {
     *          "success": {
     *              "type": "ContactSaved",
     *              "message": "User contact is saved successfully",
     *              "new_contact": {
     *                      "title": "Cantt Lab",
     *                      "phone_number": "+323 456 2333",
     *                      "user_id_fk": 1
     *                  }
     *              }
     *          }
     */

    /**
     * @apiDefine ContactList
     * @apiSuccess {String} type=ContactList
     * @apiSuccess {String} message A system generated success message, on success response
     * @apiSuccessExample  {json} User contacts list
     *     HTTP/1.1 200 OK
     *
     *     Date: Wed, 16 Nov 2018 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *      {
     *          "success": {
     *              "type": "ContactList",
     *              "message": "User contacts list",
     *              "new_contact": [
     *                  {
     *                      "emergency_contact_id": 1,
     *                      "title": "Ibne-sina Hospital",
     *                      "phone_number": "+300 123 0101",
     *                      "type": 1,
     *                      "user_id_fk": 1
     *                  },
     *                  {
     *                      "emergency_contact_id": 2,
     *                      "title": "Arizona Lab",
     *                      "phone_number": "+323 456 0011",
     *                      "type": 2,
     *                      "user_id_fk": 1
     *                  },
     *                  {
     *                      "emergency_contact_id": 3,
     *                      "title": "Dr. Fernanda Kavoski",
     *                      "phone_number": "+323 456 0011",
     *                      "type": 3,
     *                      "user_id_fk": 1
     *                  }
     *              ]
     *          }
     *      }
     */
    /**
     * @apiDefine GetChecklist
     * @apiSuccess {String} type=GetChecklist
     * @apiSuccess {String} message A system generated success message, on success response
     * @apiSuccessExample  {json} Test' Check List
     *     HTTP/1.1 200 OK
     *
     *     Date: Wed, 16 Nov 2018 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *      {
     *          "success": {
                "type": "GetChecklist",
                "message": "Success! Checklist items retrieved successfully!",
                "checklist": [
                    {
                    "checklist_id": 1,
                    "title": "Alpha-fetoprotein",
                    "status": 0
                    },
                    {
                    "checklist_id": 2,
                    "title": "Amniocentesis",
                    "status": 0
                    },
                    {
                    "checklist_id": 3,
                    "title": "Chorionic villus sampling",
                    "status": 0
                    },
                    ...
                ]
     *      }
     */
    /**
     * @apiDefine DoctorAndHospitalNotSelected
     * @apiError {String} type=DoctorAndHospitalNotSelected This will show User doctor and hospital not selected yet
     * @apiError {String} message This exception will come in case of User have not selected doctor and hospital
     * @apiErrorExample  {json} Invalid Request:
     *     Error 401: HTTP_UNAUTHORIZED
     *
     *     Date: Wed, 16 Nov 2016 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *         "error": {
     *              "type": "DoctorAndHospitalNotSelected",
     *              "message": "Doctor and Hospital are not yet selected"
     *              "doctor_details": null,
     *              "hospital_details": null,
     *              "lab_details": null
     *         }
     *     }
     */
    /**
     * @apiDefine AppointmentUpdated
     * @apiSuccess {String} type=AppointmentUpdated
     * @apiSuccess {String} message A system generated success message, on success response
     * @apiSuccessExample  {json} Success:
     *     HTTP/1.1 200 OK
     *
     *     Date: Wed, 16 Nov 2016 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *          "success": {
     *              "type": "AppointmentUpdated",
     *              "message": "Appointment Status Updated!"
     *          }
     *      }
     */
    /**
     * @apiDefine UpdateChecklistItem
     * @apiSuccess {String} type=UpdateChecklistItem
     * @apiSuccess {String} message A system generated success message, on success response
     * @apiSuccessExample  {json} Success:
     *     HTTP/1.1 200 OK
     *
     *     Date: Wed, 16 Nov 2016 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *          "success": {
                "type": "UpdateChecklistItem",
                "message": "Success! checklist item updated successfully!",
                "checklist": [
     *              [
     *                  "checklist_id": 1,
     *                  "title": "Alpha-fetoprotein",
     *                  "status": 1
     *              ],
     *              [
     *                  "checklist_id": 2,
     *                  "title": "Amniocentesis",
     *                  "status": 1
     *              ],
     *              [
     *                  "checklist_id": 3,
     *                  "title": "Cell-free fetal DNA testing",
     *                  "status": 1
     *              ],
 *              ]
                }
     *      }
     */
    /**
     * @apiDefine GetChecklist
     * @apiSuccess {String} type=GetChecklist
     * @apiSuccess {String} message A system generated success message, on success response
     * @apiSuccessExample  {json} Success:
     *     HTTP/1.1 200 OK
     *
     *     Date: Wed, 16 Nov 2016 09:33:07 GMT
     *     Server: Apache/2.4.23 (Ubuntu)
     *     Cache-Control: no-cache
     *     Access-Control-Allow-Origin: *
     *     Vary: Accept-Encoding
     *     Content-Encoding: gzip
     *     Content-Length: 228
     *     Connection: close
     *     Content-Type: application/json; charset=UTF-8
     *     X-RateLimit-Limit: 60
     *     X-RateLimit-Remaining: 59
     *
     *     {
     *          "success": {
                "type": "GetChecklist",
                "message": "Success! Checklist items retrieved successfully!",
                "checklist":
     *          [
                    {
                        "checklist_id": 1,
                        "title": "Alpha-fetoprotein",
                        "status": 1
                    },
                    {
                        "checklist_id": 2,
                        "title": "Amniocentesis",
                        "status": 0
                    },
     *              ...
                ]
                }
     *      }
     */

}