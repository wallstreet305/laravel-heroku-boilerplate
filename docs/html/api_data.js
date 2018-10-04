define({ "api": [
  {
    "version": "1.0.0",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Accept",
            "defaultValue": "application/json",
            "description": "<p>Content-Types that are acceptable for the response</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-CSRF-TOKEN",
            "description": "<p>The CSRF that has been received in <code>system/get-x-csrf</code> Api</p>"
          }
        ]
      }
    },
    "group": "1__Authorization",
    "type": "patch",
    "url": "api/activate",
    "title": "Account activation",
    "name": "AccountActivation",
    "description": "<p>This Api will be used to activate user account after registration via email activation code</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>This attribute should define the unique email address, that has not been registered before in this system.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "verification_code",
            "description": "<p>This is a 5 digit randomly generated code.</p>"
          }
        ]
      }
    },
    "filename": "app/ApiMocks/Controllers/UserClass.php",
    "groupTitle": "1__Authorization",
    "sampleRequest": [
      {
        "url": "http://52.203.78.55:9980/api/activate"
      }
    ],
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "type",
            "defaultValue": "TokenMismatchException",
            "description": "<p>This will define the type of error</p>"
          },
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>Invalid token has been provided</p>"
          },
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "field",
            "description": "<p>The name of post object</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Invalid Token Exception:",
          "content": "Error 401: Unauthorized\n\nDate: Wed, 16 Nov 2016 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n{\n    \"error\": {\n         \"type\": \"TokenMismatchException\",\n         \"message\": \"Invalid token has been provided\"\n    }\n}",
          "type": "json"
        },
        {
          "title": "Validation Exception:",
          "content": " Error 422: Unprocessable Entity\n\n Date: Wed, 16 Nov 2016 09:33:07 GMT\n Server: Apache/2.4.23 (Ubuntu)\n Cache-Control: no-cache\n Access-Control-Allow-Origin: *\n Vary: Accept-Encoding\n Content-Encoding: gzip\n Content-Length: 228\n Connection: close\n Content-Type: application/json; charset=UTF-8\n X-RateLimit-Limit: 60\n X-RateLimit-Remaining: 59\n\n{\n  \"error\": {\n    \"type\": \"ValidationException\",\n    \"field\": \"full-name\",\n    \"message\": \"The full-name may not be greater than 254 characters.\",\n    \"rule\": \"max\",\n    \"rule_attributes\": [\n      \"254\"\n    ]\n  }\n}",
          "type": "json"
        },
        {
          "title": "Invalid Verification Code:",
          "content": "Error 428: Precondition Required / Error 412: Precondition Failed\n\nDate: Wed, 16 Nov 2016 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n\n{\n            \"error\": {\n                \"type\": \"InvalidVerificationCodeProvided\",\n                \"message\": \"Unable to complete your password reset request, invalid email address.\"\n            }\n       }",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "type",
            "defaultValue": "AccessGranted",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>System generated token, this token will expire with in an hour. Application must call &quot;refresh-access-token&quot; to renew access</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>A success message, that will generate in case of success login</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success:",
          "content": "   HTTP/1.1 200 OK\n\n   Date: Wed, 16 Nov 2016 09:33:07 GMT\n   Server: Apache/2.4.23 (Ubuntu)\n   Cache-Control: no-cache\n   Access-Control-Allow-Origin: *\n   Vary: Accept-Encoding\n   Content-Encoding: gzip\n   Content-Length: 228\n   Connection: close\n   Content-Type: application/json; charset=UTF-8\n   X-RateLimit-Limit: 60\n   X-RateLimit-Remaining: 59\n{\n           \"success\": {\n               \"type\": \"AccessGranted\",\n               \"message\": \"Congrats! your account has been activated.\",\n               \"token\": \"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvb2JzLXNlcnZlci5hcHBcL2FwaVwvYWN0aXZhdGUiLCJpYXQiOjE1MjQ4MzAwMzksImV4cCI6MTUyNDgzMzYzOSwibmJmIjoxNTI0ODMwMDM5LCJqdGkiOiJjTHRNc2JLbVZ3VlNpQ3JCIiwic3ViIjo3NCwicHJ2IjoiMDVkMDA5N2RhZTFlZjc3NzBjYWE5OGMzNDc2NTM2N2Y3OTIyZTBiZiJ9.NYWjLr-NgQvQnXgscuMyXqtrrkpqzX4-jE6NC-BGiGo\",\n               \"user\": {\n                   \"user_id\": 2,\n                   \"full_name\": \"Lopez \",\n                   \"email\": \"lopez@mailinator.com\",\n                   \"phone\": \"+923435481100\",\n                   \"gplus_reference\": \"\",\n                   \"facebook_reference\": \"\",\n                   \"device_token\": \"\",\n                   \"location\": \"\",\n                   \"uuid\": 8238,\n                   \"timezone\": \"GMT+5\",\n                   \"forgot_password_request\": \"\",\n                   \"image_path\": \"\",\n                   \"created_at\": 1526799032,\n                   \"deleted_at\": \"\",\n                   \"status\": \"active\",\n                   \"latitude\": 190.343,\n                   \"longitude\": 127.34\n               },\n               \"user_stats\": [\n                   {\n                       \"user_id_fk\": 2,\n                       \"dob\": null,\n                       \"due_date_calc_flag\": 2,\n                       \"first_day_last_period\": null,\n                       \"cycle_length\": null,\n                       \"conceive_date\": 1514764800,\n                       \"created_at\": 1526799032,\n                       \"deleted_at\": null,\n                       \"height\": 0,\n                       \"start_weight\": 0,\n                       \"age\": 0,\n                       \"estimated_due_date\": 153895680\n                   }\n               ]\n           }\n }",
          "type": "json"
        }
      ]
    }
  },
  {
    "version": "1.0.0",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Accept",
            "defaultValue": "application/json",
            "description": "<p>Content-Types that are acceptable for the response</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-CSRF-TOKEN",
            "description": "<p>The CSRF that has been received in <code>system/get-x-csrf</code> Api</p>"
          }
        ]
      }
    },
    "group": "1__Authorization",
    "type": "post",
    "url": "api/forgot-password",
    "title": "Forgot password",
    "name": "Forgot_Password",
    "description": "<p>This Api will be used to retreive the password using verification code via email</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>This attribute should define the unique email address.</p>"
          }
        ]
      }
    },
    "filename": "app/ApiMocks/Controllers/UserClass.php",
    "groupTitle": "1__Authorization",
    "sampleRequest": [
      {
        "url": "http://52.203.78.55:9980/api/forgot-password"
      }
    ],
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "type",
            "defaultValue": "TokenMismatchException",
            "description": "<p>This will define the type of error</p>"
          },
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>Invalid token has been provided</p>"
          },
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "field",
            "description": "<p>The name of post object</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Invalid Token Exception:",
          "content": "Error 401: Unauthorized\n\nDate: Wed, 16 Nov 2016 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n{\n    \"error\": {\n         \"type\": \"TokenMismatchException\",\n         \"message\": \"Invalid token has been provided\"\n    }\n}",
          "type": "json"
        },
        {
          "title": "Validation Exception:",
          "content": " Error 422: Unprocessable Entity\n\n Date: Wed, 16 Nov 2016 09:33:07 GMT\n Server: Apache/2.4.23 (Ubuntu)\n Cache-Control: no-cache\n Access-Control-Allow-Origin: *\n Vary: Accept-Encoding\n Content-Encoding: gzip\n Content-Length: 228\n Connection: close\n Content-Type: application/json; charset=UTF-8\n X-RateLimit-Limit: 60\n X-RateLimit-Remaining: 59\n\n{\n  \"error\": {\n    \"type\": \"ValidationException\",\n    \"field\": \"full-name\",\n    \"message\": \"The full-name may not be greater than 254 characters.\",\n    \"rule\": \"max\",\n    \"rule_attributes\": [\n      \"254\"\n    ]\n  }\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "type",
            "defaultValue": "VerificationEmailSent",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>A success message, that will generate in case of success login</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success:",
          "content": "   HTTP/1.1 200 OK\n\n   Date: Wed, 16 Nov 2016 09:33:07 GMT\n   Server: Apache/2.4.23 (Ubuntu)\n   Cache-Control: no-cache\n   Access-Control-Allow-Origin: *\n   Vary: Accept-Encoding\n   Content-Encoding: gzip\n   Content-Length: 228\n   Connection: close\n   Content-Type: application/json; charset=UTF-8\n   X-RateLimit-Limit: 60\n   X-RateLimit-Remaining: 59\n\n{\n           \"success\": {\n               \"type\": \"VerificationEmailSent\",\n               \"message\": \"Success! an email has been sent to your mail box, please follow the described process in email to verify your email\"\n           }\n       }",
          "type": "json"
        }
      ]
    }
  },
  {
    "version": "1.0.1",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Accept",
            "defaultValue": "application/json",
            "description": "<p>Content-Types that are acceptable for the response</p>"
          }
        ]
      }
    },
    "group": "1__Authorization",
    "type": "get",
    "url": "api/get-x-csrf",
    "title": "Get X-CSRF token",
    "name": "GetXcSRF",
    "description": "<p>This Api will be use to get X-CSRF token <code>Most important, and should call on start up of application. I.e. this will be the first Api, application should call on background</code>. CSRF protection applies to all unsafe HTTP requests (POST, PUT, DELETE, PATCH). Received token from this API will be added in next all api request (unsafe HTTP requests) header along with the same key name, as received in this Api (<code>X-CSRF-TOKEN</code>).<br> This token expires after one hour of issue time, so please make sure to re-generate new token if local token is older then one hour. X-CSRF is a temporary token, and can expire in case of following change detected, to help prevent miss-use of this token..<br> 1: IP address change.<br> 2: Device change.</p>",
    "filename": "app/ApiMocks/Controllers/SystemClass.php",
    "groupTitle": "1__Authorization",
    "sampleRequest": [
      {
        "url": "http://52.203.78.55:9980/api/get-x-csrf"
      }
    ],
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "type",
            "defaultValue": "ResponseReceived",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "X-CSRF-TOKEN",
            "description": "<p>System generated CSRF token, this token will use in <code>users/register</code> call</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success:",
          "content": "HTTP/1.1 200 OK\n\nDate: Wed, 16 Nov 2016 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nSet-Cookie: nap_app_secure_info=073bd41729; Max-Age=7200; Expires=Wed, 16-Nov-2016 11:33:07 GMT; Path=/; HttpOnly\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n\n{\n    \"success\": {\n         \"type\": \"ResponseReceived\",\n         \"X-CSRF-TOKEN\": \"RPB9I23GABY0936FAFF\"\n    }\n}",
          "type": "json"
        }
      ]
    }
  },
  {
    "version": "1.0.1",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Accept",
            "defaultValue": "application/json",
            "description": "<p>Content-Types that are acceptable for the response</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-CSRF-TOKEN",
            "description": "<p>The CSRF that has been received in <code>system/get-x-csrf</code> Api</p>"
          }
        ]
      }
    },
    "group": "1__Authorization",
    "type": "post",
    "url": "api/login-via-social-app",
    "title": "Login with Social Applications",
    "name": "LoginViaSocialApp",
    "description": "<p>This Api will help users to merge their social accounts (permanent identity) with applications account. In this way, users will be able to synchronize their account application details, such as level, score, total reading details etc. with our cloud system. There are two types of token, that can be pass to this Api. <code>Only one of them is required</code>. If guest user login with Social APP, its guest account will be connected to social account.</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "facebook-access-token",
            "description": "<p>Facebook access token, received after facebook user login, token should have permission access from user against his email, date of birth and gender</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "google-plus-access-token",
            "description": "<p>Google plus access token, received after g-plus user login, token should have permission access from user against his email, date of birth and gender</p>"
          }
        ]
      }
    },
    "filename": "app/ApiMocks/Controllers/UserClass.php",
    "groupTitle": "1__Authorization",
    "sampleRequest": [
      {
        "url": "http://52.203.78.55:9980/api/login-via-social-app"
      }
    ],
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "type",
            "defaultValue": "JWTException",
            "description": "<p>This will define the invalid token exception</p>"
          },
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>This exception will come in case of invalid token</p>"
          },
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "field",
            "description": "<p>The name of post object</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "JWT Exception:",
          "content": "Error 401: Unauthorized\n\nDate: Wed, 16 Nov 2016 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n\n{\n    \"error\": {\n         \"type\": \"JWTException\",\n         \"message\": \"Sorry! you are not authenticate to perform this action\"\n    }\n}",
          "type": "json"
        },
        {
          "title": "Blacklisted Exception:",
          "content": "Error 401: Unauthorized\n\nDate: Wed, 16 Nov 2016 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n\n{\n    \"error\": {\n         \"type\": \"TokenBlacklistedException\",\n         \"message\": \"Sorry! token has been blacklisted\"\n    }\n}",
          "type": "json"
        },
        {
          "title": "Expired Exception:",
          "content": "Error 401: Unauthorized\n\nDate: Wed, 16 Nov 2016 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n\n{\n    \"error\": {\n         \"type\": \"TokenExpiredException\",\n         \"message\": \"Sorry! token has been expired\"\n    }\n}",
          "type": "json"
        },
        {
          "title": "Invalid Exception:",
          "content": "Error 401: Unauthorized\n\nDate: Wed, 16 Nov 2016 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n\n{\n    \"error\": {\n         \"type\": \"TokenInvalidException\",\n         \"message\": \"Sorry! invalid token has been provided\"\n    }\n}",
          "type": "json"
        },
        {
          "title": "Validation Exception:",
          "content": " Error 422: Unprocessable Entity\n\n Date: Wed, 16 Nov 2016 09:33:07 GMT\n Server: Apache/2.4.23 (Ubuntu)\n Cache-Control: no-cache\n Access-Control-Allow-Origin: *\n Vary: Accept-Encoding\n Content-Encoding: gzip\n Content-Length: 228\n Connection: close\n Content-Type: application/json; charset=UTF-8\n X-RateLimit-Limit: 60\n X-RateLimit-Remaining: 59\n\n{\n  \"error\": {\n    \"type\": \"ValidationException\",\n    \"field\": \"full-name\",\n    \"message\": \"The full-name may not be greater than 254 characters.\",\n    \"rule\": \"max\",\n    \"rule_attributes\": [\n      \"254\"\n    ]\n  }\n}",
          "type": "json"
        },
        {
          "title": "Account Blocked:",
          "content": "Error 423: Locked\n\nDate: Wed, 16 Nov 2016 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n\n{\n    \"error\": {\n         \"type\": \"AccountBlockedException\",\n         \"message\": \"Sorry! your account has been temporarily blocked, please contact support for assistance\"\n    }\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "type",
            "defaultValue": "AccessGranted",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>System generated token, this token will expire with in an hour. Application must call &quot;refresh-access-token&quot; to renew access</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>A success message, that will generate in case of success login</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success:",
          "content": "   HTTP/1.1 200 OK\n\n   Date: Wed, 16 Nov 2016 09:33:07 GMT\n   Server: Apache/2.4.23 (Ubuntu)\n   Cache-Control: no-cache\n   Access-Control-Allow-Origin: *\n   Vary: Accept-Encoding\n   Content-Encoding: gzip\n   Content-Length: 228\n   Connection: close\n   Content-Type: application/json; charset=UTF-8\n   X-RateLimit-Limit: 60\n   X-RateLimit-Remaining: 59\n{\n           \"success\": {\n               \"type\": \"AccessGranted\",\n               \"message\": \"Congrats! your account has been activated.\",\n               \"token\": \"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvb2JzLXNlcnZlci5hcHBcL2FwaVwvYWN0aXZhdGUiLCJpYXQiOjE1MjQ4MzAwMzksImV4cCI6MTUyNDgzMzYzOSwibmJmIjoxNTI0ODMwMDM5LCJqdGkiOiJjTHRNc2JLbVZ3VlNpQ3JCIiwic3ViIjo3NCwicHJ2IjoiMDVkMDA5N2RhZTFlZjc3NzBjYWE5OGMzNDc2NTM2N2Y3OTIyZTBiZiJ9.NYWjLr-NgQvQnXgscuMyXqtrrkpqzX4-jE6NC-BGiGo\",\n               \"user\": {\n                   \"user_id\": 2,\n                   \"full_name\": \"Lopez \",\n                   \"email\": \"lopez@mailinator.com\",\n                   \"phone\": \"+923435481100\",\n                   \"gplus_reference\": \"\",\n                   \"facebook_reference\": \"\",\n                   \"device_token\": \"\",\n                   \"location\": \"\",\n                   \"uuid\": 8238,\n                   \"timezone\": \"GMT+5\",\n                   \"forgot_password_request\": \"\",\n                   \"image_path\": \"\",\n                   \"created_at\": 1526799032,\n                   \"deleted_at\": \"\",\n                   \"status\": \"active\",\n                   \"latitude\": 190.343,\n                   \"longitude\": 127.34\n               },\n               \"user_stats\": [\n                   {\n                       \"user_id_fk\": 2,\n                       \"dob\": null,\n                       \"due_date_calc_flag\": 2,\n                       \"first_day_last_period\": null,\n                       \"cycle_length\": null,\n                       \"conceive_date\": 1514764800,\n                       \"created_at\": 1526799032,\n                       \"deleted_at\": null,\n                       \"height\": 0,\n                       \"start_weight\": 0,\n                       \"age\": 0,\n                       \"estimated_due_date\": 153895680\n                   }\n               ]\n           }\n }",
          "type": "json"
        }
      ]
    }
  },
  {
    "version": "1.0.0",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Accept",
            "defaultValue": "application/json",
            "description": "<p>Content-Types that are acceptable for the response</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-CSRF-TOKEN",
            "description": "<p>The CSRF that has been received in <code>system/get-x-csrf</code> Api</p>"
          }
        ]
      }
    },
    "group": "1__Authorization",
    "type": "post",
    "url": "api/register-via-email",
    "title": "Register via Email",
    "name": "RegisterViaEmailsssss",
    "description": "<p>This Api will be used to register users via email on system.</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "full_name",
            "description": "<p>This attribute should define Full name of user, who is trying to create account on system.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>This attribute should define the unique email address, that has not been registered before in this system.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>This attribute should define plain text password, on application side there should be no encryption.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "uuid",
            "description": "<p>This attribute should define application <code>UUID</code>.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "timezone",
            "description": "<p>This attribute should define user current timezone. For example: <code>GMT+3</code></p>"
          }
        ]
      }
    },
    "filename": "app/ApiMocks/Controllers/UserClass.php",
    "groupTitle": "1__Authorization",
    "sampleRequest": [
      {
        "url": "http://52.203.78.55:9980/api/register-via-email"
      }
    ],
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "type",
            "defaultValue": "TokenMismatchException",
            "description": "<p>This will define the type of error</p>"
          },
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>Invalid token has been provided</p>"
          },
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "field",
            "description": "<p>The name of post object</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Invalid Token Exception:",
          "content": "Error 401: Unauthorized\n\nDate: Wed, 16 Nov 2016 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n{\n    \"error\": {\n         \"type\": \"TokenMismatchException\",\n         \"message\": \"Invalid token has been provided\"\n    }\n}",
          "type": "json"
        },
        {
          "title": "Validation Exception:",
          "content": " Error 422: Unprocessable Entity\n\n Date: Wed, 16 Nov 2016 09:33:07 GMT\n Server: Apache/2.4.23 (Ubuntu)\n Cache-Control: no-cache\n Access-Control-Allow-Origin: *\n Vary: Accept-Encoding\n Content-Encoding: gzip\n Content-Length: 228\n Connection: close\n Content-Type: application/json; charset=UTF-8\n X-RateLimit-Limit: 60\n X-RateLimit-Remaining: 59\n\n{\n  \"error\": {\n    \"type\": \"ValidationException\",\n    \"field\": \"full-name\",\n    \"message\": \"The full-name may not be greater than 254 characters.\",\n    \"rule\": \"max\",\n    \"rule_attributes\": [\n      \"254\"\n    ]\n  }\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "type",
            "defaultValue": "VerificationEmailSent",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>A success message, that will generate in case of success login</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success:",
          "content": "   HTTP/1.1 200 OK\n\n   Date: Wed, 16 Nov 2016 09:33:07 GMT\n   Server: Apache/2.4.23 (Ubuntu)\n   Cache-Control: no-cache\n   Access-Control-Allow-Origin: *\n   Vary: Accept-Encoding\n   Content-Encoding: gzip\n   Content-Length: 228\n   Connection: close\n   Content-Type: application/json; charset=UTF-8\n   X-RateLimit-Limit: 60\n   X-RateLimit-Remaining: 59\n\n{\n           \"success\": {\n               \"type\": \"VerificationEmailSent\",\n               \"message\": \"Success! an email has been sent to your mail box, please follow the described process in email to verify your email\"\n           }\n       }",
          "type": "json"
        }
      ]
    }
  },
  {
    "version": "1.0.0",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Accept",
            "defaultValue": "application/json",
            "description": "<p>Content-Types that are acceptable for the response</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-CSRF-TOKEN",
            "description": "<p>The CSRF that has been received in <code>system/get-x-csrf</code> Api</p>"
          }
        ]
      }
    },
    "group": "1__Authorization",
    "type": "patch",
    "url": "api/resend-verification-code",
    "title": "Resend Verification Code",
    "name": "Resend_Verification_Code",
    "description": "<p>This Api will be used to resend verification code via email</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>This attribute should define the unique email address.</p>"
          }
        ]
      }
    },
    "filename": "app/ApiMocks/Controllers/UserClass.php",
    "groupTitle": "1__Authorization",
    "sampleRequest": [
      {
        "url": "http://52.203.78.55:9980/api/resend-verification-code"
      }
    ],
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "type",
            "defaultValue": "TokenMismatchException",
            "description": "<p>This will define the type of error</p>"
          },
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>Invalid token has been provided</p>"
          },
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "field",
            "description": "<p>The name of post object</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Invalid Token Exception:",
          "content": "Error 401: Unauthorized\n\nDate: Wed, 16 Nov 2016 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n{\n    \"error\": {\n         \"type\": \"TokenMismatchException\",\n         \"message\": \"Invalid token has been provided\"\n    }\n}",
          "type": "json"
        },
        {
          "title": "Validation Exception:",
          "content": " Error 422: Unprocessable Entity\n\n Date: Wed, 16 Nov 2016 09:33:07 GMT\n Server: Apache/2.4.23 (Ubuntu)\n Cache-Control: no-cache\n Access-Control-Allow-Origin: *\n Vary: Accept-Encoding\n Content-Encoding: gzip\n Content-Length: 228\n Connection: close\n Content-Type: application/json; charset=UTF-8\n X-RateLimit-Limit: 60\n X-RateLimit-Remaining: 59\n\n{\n  \"error\": {\n    \"type\": \"ValidationException\",\n    \"field\": \"full-name\",\n    \"message\": \"The full-name may not be greater than 254 characters.\",\n    \"rule\": \"max\",\n    \"rule_attributes\": [\n      \"254\"\n    ]\n  }\n}",
          "type": "json"
        },
        {
          "title": "Invalid Account Provided:",
          "content": "Error 404: Not Found\n\nDate: Wed, 16 Nov 2016 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n\n{\n    \"error\": {\n         \"type\": \"InvalidAccountProvided\",\n         \"message\": \"Sorry! system does not recognize your account, please correct your input and re-try\"\n    }\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "type",
            "defaultValue": "VerificationEmailSent",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>A success message, that will generate in case of success login</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success:",
          "content": "   HTTP/1.1 200 OK\n\n   Date: Wed, 16 Nov 2016 09:33:07 GMT\n   Server: Apache/2.4.23 (Ubuntu)\n   Cache-Control: no-cache\n   Access-Control-Allow-Origin: *\n   Vary: Accept-Encoding\n   Content-Encoding: gzip\n   Content-Length: 228\n   Connection: close\n   Content-Type: application/json; charset=UTF-8\n   X-RateLimit-Limit: 60\n   X-RateLimit-Remaining: 59\n\n{\n           \"success\": {\n               \"type\": \"VerificationEmailSent\",\n               \"message\": \"Success! an email has been sent to your mail box, please follow the described process in email to verify your email\"\n           }\n       }",
          "type": "json"
        }
      ]
    }
  },
  {
    "version": "1.0.0",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Accept",
            "defaultValue": "application/json",
            "description": "<p>Content-Types that are acceptable for the response</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-CSRF-TOKEN",
            "description": "<p>The CSRF that has been received in <code>system/get-x-csrf</code> Api</p>"
          }
        ]
      }
    },
    "group": "1__Authorization",
    "type": "patch",
    "url": "api/reset-password",
    "title": "Reset Password",
    "name": "Reset_Password",
    "description": "<p>This Api will be used to update the password</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>This attribute should define the unique email address.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>This attribute should define the new password for user account.</p>"
          }
        ]
      }
    },
    "filename": "app/ApiMocks/Controllers/UserClass.php",
    "groupTitle": "1__Authorization",
    "sampleRequest": [
      {
        "url": "http://52.203.78.55:9980/api/reset-password"
      }
    ],
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "type",
            "defaultValue": "TokenMismatchException",
            "description": "<p>This will define the type of error</p>"
          },
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>Invalid token has been provided</p>"
          },
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "field",
            "description": "<p>The name of post object</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Invalid Token Exception:",
          "content": "Error 401: Unauthorized\n\nDate: Wed, 16 Nov 2016 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n{\n    \"error\": {\n         \"type\": \"TokenMismatchException\",\n         \"message\": \"Invalid token has been provided\"\n    }\n}",
          "type": "json"
        },
        {
          "title": "Validation Exception:",
          "content": " Error 422: Unprocessable Entity\n\n Date: Wed, 16 Nov 2016 09:33:07 GMT\n Server: Apache/2.4.23 (Ubuntu)\n Cache-Control: no-cache\n Access-Control-Allow-Origin: *\n Vary: Accept-Encoding\n Content-Encoding: gzip\n Content-Length: 228\n Connection: close\n Content-Type: application/json; charset=UTF-8\n X-RateLimit-Limit: 60\n X-RateLimit-Remaining: 59\n\n{\n  \"error\": {\n    \"type\": \"ValidationException\",\n    \"field\": \"full-name\",\n    \"message\": \"The full-name may not be greater than 254 characters.\",\n    \"rule\": \"max\",\n    \"rule_attributes\": [\n      \"254\"\n    ]\n  }\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "type",
            "defaultValue": "PasswordUpdated",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>A system generated success message, on success response</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success:",
          "content": "HTTP/1.1 200 OK\n\nDate: Wed, 16 Nov 2016 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n\n        {\n            \"success\": {\n                \"type\": \"PasswordUpdated\",\n                \"message\": \"Congrats! new password has been saved\"\n            }\n        }",
          "type": "json"
        }
      ]
    }
  },
  {
    "version": "1.0.1",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Accept",
            "defaultValue": "application/json",
            "description": "<p>Content-Types that are acceptable for the response</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-CSRF-TOKEN",
            "description": "<p>The CSRF that has been received in <code>system/get-x-csrf</code> Api</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Authorization header will hold the system generated token, that was generated in <code>users/register</code> Api call. e.g. <code>Authorization: Bearer y04Njk3LTA0MjYzIi</code></p>"
          }
        ]
      }
    },
    "group": "1__Authorization",
    "type": "patch",
    "url": "api/set-bmi",
    "title": "BMI",
    "name": "SaveBmiValues",
    "description": "<p>This Api will help to update user stats with height, weight, age which we later can use to calculate BMI.</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>This attribute should define the unique email address.</p>"
          },
          {
            "group": "Parameter",
            "type": "Numeric",
            "optional": false,
            "field": "height",
            "description": "<p>This will define the height of the user</p>"
          },
          {
            "group": "Parameter",
            "type": "NUmeric",
            "optional": false,
            "field": "start_weight",
            "description": "<p>This will define the weight of the user</p>"
          },
          {
            "group": "Parameter",
            "type": "integer",
            "optional": false,
            "field": "age",
            "description": "<p>This will define the user's age</p>"
          }
        ]
      }
    },
    "filename": "app/ApiMocks/Controllers/UserClass.php",
    "groupTitle": "1__Authorization",
    "sampleRequest": [
      {
        "url": "http://52.203.78.55:9980/api/set-bmi"
      }
    ],
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "type",
            "defaultValue": "TokenExpiredException",
            "description": "<p>This will define the expired token exception</p>"
          },
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>This exception will come in case of expired token</p>"
          },
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "field",
            "description": "<p>The name of post object</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Expired Exception:",
          "content": "Error 401: Unauthorized\n\nDate: Wed, 16 Nov 2016 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n\n{\n    \"error\": {\n         \"type\": \"TokenExpiredException\",\n         \"message\": \"Sorry! token has been expired\"\n    }\n}",
          "type": "json"
        },
        {
          "title": "Invalid Exception:",
          "content": "Error 401: Unauthorized\n\nDate: Wed, 16 Nov 2016 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n\n{\n    \"error\": {\n         \"type\": \"TokenInvalidException\",\n         \"message\": \"Sorry! invalid token has been provided\"\n    }\n}",
          "type": "json"
        },
        {
          "title": "Validation Exception:",
          "content": " Error 422: Unprocessable Entity\n\n Date: Wed, 16 Nov 2016 09:33:07 GMT\n Server: Apache/2.4.23 (Ubuntu)\n Cache-Control: no-cache\n Access-Control-Allow-Origin: *\n Vary: Accept-Encoding\n Content-Encoding: gzip\n Content-Length: 228\n Connection: close\n Content-Type: application/json; charset=UTF-8\n X-RateLimit-Limit: 60\n X-RateLimit-Remaining: 59\n\n{\n  \"error\": {\n    \"type\": \"ValidationException\",\n    \"field\": \"full-name\",\n    \"message\": \"The full-name may not be greater than 254 characters.\",\n    \"rule\": \"max\",\n    \"rule_attributes\": [\n      \"254\"\n    ]\n  }\n}",
          "type": "json"
        },
        {
          "title": "Invalid Account Provided:",
          "content": "Error 404: Not Found\n\nDate: Wed, 16 Nov 2016 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n\n{\n    \"error\": {\n         \"type\": \"InvalidAccountProvided\",\n         \"message\": \"Sorry! system does not recognize your account, please correct your input and re-try\"\n    }\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "type",
            "defaultValue": "RecordUpdated",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>A system generated success message, on success response</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success:",
          "content": "HTTP/1.1 200 OK\n\nDate: Wed, 16 Nov 2016 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n\n{\n    \"success\": {\n         \"type\": \"RecordUpdated\",\n         \"message\": \"Success! record has been updated\"\n    }\n}",
          "type": "json"
        }
      ]
    }
  },
  {
    "version": "1.0.0",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Accept",
            "defaultValue": "application/json",
            "description": "<p>Content-Types that are acceptable for the response</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-CSRF-TOKEN",
            "description": "<p>The CSRF that has been received in <code>system/get-x-csrf</code> Api</p>"
          }
        ]
      }
    },
    "group": "1__Authorization",
    "type": "patch",
    "url": "api/login",
    "title": "User login via Email",
    "name": "User_Login",
    "description": "<p>This Api will be used to login in to system via email / password</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>This attribute should define the unique email address.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Password",
            "description": "<p>Logging in account password, this password should be relevant to provided email address.</p>"
          }
        ]
      }
    },
    "filename": "app/ApiMocks/Controllers/UserClass.php",
    "groupTitle": "1__Authorization",
    "sampleRequest": [
      {
        "url": "http://52.203.78.55:9980/api/login"
      }
    ],
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "type",
            "defaultValue": "TokenMismatchException",
            "description": "<p>This will define the type of error</p>"
          },
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>Invalid token has been provided</p>"
          },
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "field",
            "description": "<p>The name of post object</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Invalid Token Exception:",
          "content": "Error 401: Unauthorized\n\nDate: Wed, 16 Nov 2016 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n{\n    \"error\": {\n         \"type\": \"TokenMismatchException\",\n         \"message\": \"Invalid token has been provided\"\n    }\n}",
          "type": "json"
        },
        {
          "title": "Validation Exception:",
          "content": " Error 422: Unprocessable Entity\n\n Date: Wed, 16 Nov 2016 09:33:07 GMT\n Server: Apache/2.4.23 (Ubuntu)\n Cache-Control: no-cache\n Access-Control-Allow-Origin: *\n Vary: Accept-Encoding\n Content-Encoding: gzip\n Content-Length: 228\n Connection: close\n Content-Type: application/json; charset=UTF-8\n X-RateLimit-Limit: 60\n X-RateLimit-Remaining: 59\n\n{\n  \"error\": {\n    \"type\": \"ValidationException\",\n    \"field\": \"full-name\",\n    \"message\": \"The full-name may not be greater than 254 characters.\",\n    \"rule\": \"max\",\n    \"rule_attributes\": [\n      \"254\"\n    ]\n  }\n}",
          "type": "json"
        },
        {
          "title": "Invalid Verification Code:",
          "content": "Error 428: Precondition Required / Error 412: Precondition Failed\n\nDate: Wed, 16 Nov 2016 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n\n{\n            \"error\": {\n                \"type\": \"InvalidVerificationCodeProvided\",\n                \"message\": \"Unable to complete your password reset request, invalid email address.\"\n            }\n       }",
          "type": "json"
        },
        {
          "title": "Email Not Verified Yet:",
          "content": "Error 423: Locked\n\nDate: Wed, 16 Nov 2016 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n\n{\n    \"error\": {\n         \"type\": \"NotVerifiedYet\",\n         \"message\": \"Sorry! you have not verified your email address, please verify it before login\",\n         \"email\" => \"user@email.com\"\n    }\n}",
          "type": "json"
        },
        {
          "title": "Invalid Credentials Provided:",
          "content": "Error 404: Not Found\n\nDate: Wed, 16 Nov 2016 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n\n{\n    \"error\": {\n         \"type\": \"InvalidCredentials\",\n         \"message\": \"Sorry! you have provided invalid credentials (email / password)\"\n    }\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "type",
            "defaultValue": "AccessGranted",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>System generated token, this token will expire with in an hour. Application must call &quot;refresh-access-token&quot; to renew access</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>A success message, that will generate in case of success login</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success:",
          "content": "   HTTP/1.1 200 OK\n\n   Date: Wed, 16 Nov 2016 09:33:07 GMT\n   Server: Apache/2.4.23 (Ubuntu)\n   Cache-Control: no-cache\n   Access-Control-Allow-Origin: *\n   Vary: Accept-Encoding\n   Content-Encoding: gzip\n   Content-Length: 228\n   Connection: close\n   Content-Type: application/json; charset=UTF-8\n   X-RateLimit-Limit: 60\n   X-RateLimit-Remaining: 59\n{\n           \"success\": {\n               \"type\": \"AccessGranted\",\n               \"message\": \"Congrats! your account has been activated.\",\n               \"token\": \"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvb2JzLXNlcnZlci5hcHBcL2FwaVwvYWN0aXZhdGUiLCJpYXQiOjE1MjQ4MzAwMzksImV4cCI6MTUyNDgzMzYzOSwibmJmIjoxNTI0ODMwMDM5LCJqdGkiOiJjTHRNc2JLbVZ3VlNpQ3JCIiwic3ViIjo3NCwicHJ2IjoiMDVkMDA5N2RhZTFlZjc3NzBjYWE5OGMzNDc2NTM2N2Y3OTIyZTBiZiJ9.NYWjLr-NgQvQnXgscuMyXqtrrkpqzX4-jE6NC-BGiGo\",\n               \"user\": {\n                   \"user_id\": 2,\n                   \"full_name\": \"Lopez \",\n                   \"email\": \"lopez@mailinator.com\",\n                   \"phone\": \"+923435481100\",\n                   \"gplus_reference\": \"\",\n                   \"facebook_reference\": \"\",\n                   \"device_token\": \"\",\n                   \"location\": \"\",\n                   \"uuid\": 8238,\n                   \"timezone\": \"GMT+5\",\n                   \"forgot_password_request\": \"\",\n                   \"image_path\": \"\",\n                   \"created_at\": 1526799032,\n                   \"deleted_at\": \"\",\n                   \"status\": \"active\",\n                   \"latitude\": 190.343,\n                   \"longitude\": 127.34\n               },\n               \"user_stats\": [\n                   {\n                       \"user_id_fk\": 2,\n                       \"dob\": null,\n                       \"due_date_calc_flag\": 2,\n                       \"first_day_last_period\": null,\n                       \"cycle_length\": null,\n                       \"conceive_date\": 1514764800,\n                       \"created_at\": 1526799032,\n                       \"deleted_at\": null,\n                       \"height\": 0,\n                       \"start_weight\": 0,\n                       \"age\": 0,\n                       \"estimated_due_date\": 153895680\n                   }\n               ]\n           }\n }",
          "type": "json"
        }
      ]
    }
  },
  {
    "version": "1.0.0",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Accept",
            "defaultValue": "application/json",
            "description": "<p>Content-Types that are acceptable for the response</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-CSRF-TOKEN",
            "description": "<p>The CSRF that has been received in <code>system/get-x-csrf</code> Api</p>"
          }
        ]
      }
    },
    "group": "1__Authorization",
    "type": "patch",
    "url": "api/verify-email",
    "title": "Verify Email for Reset Password",
    "name": "Verify_Email",
    "description": "<p>This Api will be used to verify email for password reset</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>This attribute should define the unique email address.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "verification_code",
            "description": "<p>This attribute should define the verification code provided via email.</p>"
          }
        ]
      }
    },
    "filename": "app/ApiMocks/Controllers/UserClass.php",
    "groupTitle": "1__Authorization",
    "sampleRequest": [
      {
        "url": "http://52.203.78.55:9980/api/verify-email"
      }
    ],
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "type",
            "defaultValue": "TokenMismatchException",
            "description": "<p>This will define the type of error</p>"
          },
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>Invalid token has been provided</p>"
          },
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "field",
            "description": "<p>The name of post object</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Invalid Token Exception:",
          "content": "Error 401: Unauthorized\n\nDate: Wed, 16 Nov 2016 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n{\n    \"error\": {\n         \"type\": \"TokenMismatchException\",\n         \"message\": \"Invalid token has been provided\"\n    }\n}",
          "type": "json"
        },
        {
          "title": "Validation Exception:",
          "content": " Error 422: Unprocessable Entity\n\n Date: Wed, 16 Nov 2016 09:33:07 GMT\n Server: Apache/2.4.23 (Ubuntu)\n Cache-Control: no-cache\n Access-Control-Allow-Origin: *\n Vary: Accept-Encoding\n Content-Encoding: gzip\n Content-Length: 228\n Connection: close\n Content-Type: application/json; charset=UTF-8\n X-RateLimit-Limit: 60\n X-RateLimit-Remaining: 59\n\n{\n  \"error\": {\n    \"type\": \"ValidationException\",\n    \"field\": \"full-name\",\n    \"message\": \"The full-name may not be greater than 254 characters.\",\n    \"rule\": \"max\",\n    \"rule_attributes\": [\n      \"254\"\n    ]\n  }\n}",
          "type": "json"
        },
        {
          "title": "Invalid Verification Code:",
          "content": "Error 428: Precondition Required / Error 412: Precondition Failed\n\nDate: Wed, 16 Nov 2016 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n\n{\n            \"error\": {\n                \"type\": \"InvalidVerificationCodeProvided\",\n                \"message\": \"Unable to complete your password reset request, invalid email address.\"\n            }\n       }",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "type",
            "defaultValue": "VerificationCodeValid",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>A system generated success message, on success response</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success:",
          "content": "HTTP/1.1 200 OK\n\nDate: Wed, 16 Nov 2016 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n\n{\n    \"success\": {\n         \"type\": \"VerificationCodeValid\",\n         \"message\": \"Success! provided verification is valid\"\n    }\n}",
          "type": "json"
        }
      ]
    }
  },
  {
    "version": "1.0.1",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Accept",
            "defaultValue": "application/json",
            "description": "<p>Content-Types that are acceptable for the response</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-CSRF-TOKEN",
            "description": "<p>The CSRF that has been received in <code>system/get-x-csrf</code> Api</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Authorization header will hold the system generated token, that was generated in <code>users/register</code> Api call. e.g. <code>Authorization: Bearer y04Njk3LTA0MjYzIi</code></p>"
          }
        ]
      }
    },
    "group": "2__User_Activities",
    "type": "post",
    "url": "api/update-profile",
    "title": "Update User Profile",
    "name": "UpdateUserProfile",
    "description": "<p>This Api will help to update user profile with phone-no and latitude and longitude alongwith user stats to calculate estimated due date e.g: first-day-last-period, cycle-length OR conceive-date.</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "double",
            "optional": false,
            "field": "latitude",
            "description": "<p>This will latitude of the user's location</p>"
          },
          {
            "group": "Parameter",
            "type": "double",
            "optional": false,
            "field": "longitude",
            "description": "<p>This will define the longitude of the user's location</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "phone-number",
            "description": "<p>Users phone number</p>"
          },
          {
            "group": "Parameter",
            "type": "integer",
            "optional": false,
            "field": "due_date_calc_flag",
            "description": "<p>This flag value define if we have the conceive date or not if due_date_calc_flag = 1, then we will also need first_day_last_period and cycle_length OR if due_date_calc_flag = 2, then we will require conceive_date</p>"
          },
          {
            "group": "Parameter",
            "type": "date",
            "optional": false,
            "field": "first_day_last_period",
            "description": "<p>this date will define the first day of the last period</p>"
          },
          {
            "group": "Parameter",
            "type": "integer",
            "optional": false,
            "field": "cycle_length",
            "description": "<p>this will define the total time of the last periods</p>"
          },
          {
            "group": "Parameter",
            "type": "date",
            "optional": false,
            "field": "conceive_date",
            "description": "<p>this is the conceive date value</p>"
          }
        ]
      }
    },
    "filename": "app/ApiMocks/Controllers/UserClass.php",
    "groupTitle": "2__User_Activities",
    "sampleRequest": [
      {
        "url": "http://52.203.78.55:9980/api/update-profile"
      }
    ],
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "type",
            "defaultValue": "ValidationException",
            "description": "<p>This will define the type of error</p>"
          },
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "field",
            "description": "<p>The name of post object</p>"
          },
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>The error description against relevant field</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Validation Exception:",
          "content": " Error 422: Unprocessable Entity\n\n Date: Wed, 16 Nov 2016 09:33:07 GMT\n Server: Apache/2.4.23 (Ubuntu)\n Cache-Control: no-cache\n Access-Control-Allow-Origin: *\n Vary: Accept-Encoding\n Content-Encoding: gzip\n Content-Length: 228\n Connection: close\n Content-Type: application/json; charset=UTF-8\n X-RateLimit-Limit: 60\n X-RateLimit-Remaining: 59\n\n{\n  \"error\": {\n    \"type\": \"ValidationException\",\n    \"field\": \"full-name\",\n    \"message\": \"The full-name may not be greater than 254 characters.\",\n    \"rule\": \"max\",\n    \"rule_attributes\": [\n      \"254\"\n    ]\n  }\n}",
          "type": "json"
        },
        {
          "title": "Invalid Account Provided:",
          "content": "Error 404: Not Found\n\nDate: Wed, 16 Nov 2016 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n\n{\n    \"error\": {\n         \"type\": \"InvalidAccountProvided\",\n         \"message\": \"Sorry! system does not recognize your account, please correct your input and re-try\"\n    }\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "type",
            "defaultValue": "RecordUpdated",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>A system generated success message, on success response</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success:",
          "content": "HTTP/1.1 200 OK\n\nDate: Wed, 16 Nov 2016 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n\n{\n    \"success\": {\n         \"type\": \"RecordUpdated\",\n         \"message\": \"Success! record has been updated\"\n    }\n}",
          "type": "json"
        }
      ]
    }
  },
  {
    "version": "1.0.1",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Accept",
            "defaultValue": "application/json",
            "description": "<p>Content-Types that are acceptable for the response</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-CSRF-TOKEN",
            "description": "<p>The CSRF that has been received in <code>system/get-x-csrf</code> Api</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Authorization header will hold the system generated token, that was generated in <code>users/register</code> Api call. e.g. <code>Authorization: Bearer y04Njk3LTA0MjYzIi</code></p>"
          }
        ]
      }
    },
    "group": "2__User_Activities",
    "type": "post",
    "url": "api/profile-picture",
    "title": "upload profile picture",
    "name": "uploadProfilePicture",
    "description": "<p>This Api will help user to upload his profile picture</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Image",
            "optional": false,
            "field": "picture",
            "description": "<p>This is user ptofile picture</p>"
          }
        ]
      }
    },
    "filename": "app/ApiMocks/Controllers/UserClass.php",
    "groupTitle": "2__User_Activities",
    "sampleRequest": [
      {
        "url": "http://52.203.78.55:9980/api/profile-picture"
      }
    ],
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "type",
            "defaultValue": "ValidationException",
            "description": "<p>This will define the type of error</p>"
          },
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "field",
            "description": "<p>The name of post object</p>"
          },
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>The error description against relevant field</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Validation Exception:",
          "content": " Error 422: Unprocessable Entity\n\n Date: Wed, 16 Nov 2016 09:33:07 GMT\n Server: Apache/2.4.23 (Ubuntu)\n Cache-Control: no-cache\n Access-Control-Allow-Origin: *\n Vary: Accept-Encoding\n Content-Encoding: gzip\n Content-Length: 228\n Connection: close\n Content-Type: application/json; charset=UTF-8\n X-RateLimit-Limit: 60\n X-RateLimit-Remaining: 59\n\n{\n  \"error\": {\n    \"type\": \"ValidationException\",\n    \"field\": \"full-name\",\n    \"message\": \"The full-name may not be greater than 254 characters.\",\n    \"rule\": \"max\",\n    \"rule_attributes\": [\n      \"254\"\n    ]\n  }\n}",
          "type": "json"
        },
        {
          "title": "Invalid Account Provided:",
          "content": "Error 404: Not Found\n\nDate: Wed, 16 Nov 2016 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n\n{\n    \"error\": {\n         \"type\": \"InvalidAccountProvided\",\n         \"message\": \"Sorry! system does not recognize your account, please correct your input and re-try\"\n    }\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "type",
            "defaultValue": "PictureUploaded",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>A system generated success message, on success response</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Picture Uploaded:",
          "content": "HTTP/1.1 200 OK\n\nDate: Wed, 16 Nov 2016 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n\n{\n    \"success\": {\n         \"type\": \"PictureUploaded\",\n         \"message\": \"User profile picture uploaded\",\n         \"image_path\": \"storage/profile_pictures/user_120.jpeg\"\n    }\n}",
          "type": "json"
        }
      ]
    }
  },
  {
    "version": "1.0.1",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Accept",
            "defaultValue": "application/json",
            "description": "<p>Content-Types that are acceptable for the response</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-CSRF-TOKEN",
            "description": "<p>The CSRF that has been received in <code>system/get-x-csrf</code> Api</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Authorization header will hold the system generated token, that was generated in <code>users/register</code> Api call. e.g. <code>Authorization: Bearer y04Njk3LTA0MjYzIi</code></p>"
          }
        ]
      }
    },
    "group": "3__Appointments",
    "type": "post",
    "url": "api/delete-appointment",
    "title": "Delete Appointment",
    "name": "Delete_Appointment",
    "description": "<p>This Api will help the user to delete the appointment</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "int",
            "optional": false,
            "field": "appointment_id",
            "description": "<p>id of the appointment to edit</p>"
          }
        ]
      }
    },
    "filename": "app/ApiMocks/Controllers/AppointmentClass.php",
    "groupTitle": "3__Appointments",
    "sampleRequest": [
      {
        "url": "http://52.203.78.55:9980/api/delete-appointment"
      }
    ],
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "type",
            "defaultValue": "ValidationException",
            "description": "<p>This will define the type of error</p>"
          },
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "field",
            "description": "<p>The name of post object</p>"
          },
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>The error description against relevant field</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Validation Exception:",
          "content": " Error 422: Unprocessable Entity\n\n Date: Wed, 16 Nov 2016 09:33:07 GMT\n Server: Apache/2.4.23 (Ubuntu)\n Cache-Control: no-cache\n Access-Control-Allow-Origin: *\n Vary: Accept-Encoding\n Content-Encoding: gzip\n Content-Length: 228\n Connection: close\n Content-Type: application/json; charset=UTF-8\n X-RateLimit-Limit: 60\n X-RateLimit-Remaining: 59\n\n{\n  \"error\": {\n    \"type\": \"ValidationException\",\n    \"field\": \"full-name\",\n    \"message\": \"The full-name may not be greater than 254 characters.\",\n    \"rule\": \"max\",\n    \"rule_attributes\": [\n      \"254\"\n    ]\n  }\n}",
          "type": "json"
        },
        {
          "title": "Invalid Account Provided:",
          "content": "Error 404: Not Found\n\nDate: Wed, 16 Nov 2016 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n\n{\n    \"error\": {\n         \"type\": \"InvalidAccountProvided\",\n         \"message\": \"Sorry! system does not recognize your account, please correct your input and re-try\"\n    }\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "type",
            "defaultValue": "AppointmentDeleted",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>A system generated success message, on success response</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Appointment deleted successfully",
          "content": "HTTP/1.1 200 OK\n\nDate: Wed, 16 Nov 2018 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n\n{\n    'success' => {\n        'type' => 'AppointmentDeleted',\n         'message' => 'Appointment deleted successfully',\n     }\n}",
          "type": "json"
        }
      ]
    }
  },
  {
    "version": "1.0.1",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Accept",
            "defaultValue": "application/json",
            "description": "<p>Content-Types that are acceptable for the response</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-CSRF-TOKEN",
            "description": "<p>The CSRF that has been received in <code>system/get-x-csrf</code> Api</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Authorization header will hold the system generated token, that was generated in <code>users/register</code> Api call. e.g. <code>Authorization: Bearer y04Njk3LTA0MjYzIi</code></p>"
          }
        ]
      }
    },
    "group": "3__Appointments",
    "type": "post",
    "url": "api/edit-appointment",
    "title": "Edit Appointment",
    "name": "Edit_Appointment",
    "description": "<p>This Api will help the user to edit the appointment</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "int",
            "optional": false,
            "field": "appointment_id",
            "description": "<p>id of the appointment to edit</p>"
          },
          {
            "group": "Parameter",
            "type": "date",
            "optional": false,
            "field": "appointment_datetime",
            "description": "<p>new date and time of the appointment</p>"
          }
        ]
      }
    },
    "filename": "app/ApiMocks/Controllers/AppointmentClass.php",
    "groupTitle": "3__Appointments",
    "sampleRequest": [
      {
        "url": "http://52.203.78.55:9980/api/edit-appointment"
      }
    ],
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "type",
            "defaultValue": "ValidationException",
            "description": "<p>This will define the type of error</p>"
          },
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "field",
            "description": "<p>The name of post object</p>"
          },
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>The error description against relevant field</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Validation Exception:",
          "content": " Error 422: Unprocessable Entity\n\n Date: Wed, 16 Nov 2016 09:33:07 GMT\n Server: Apache/2.4.23 (Ubuntu)\n Cache-Control: no-cache\n Access-Control-Allow-Origin: *\n Vary: Accept-Encoding\n Content-Encoding: gzip\n Content-Length: 228\n Connection: close\n Content-Type: application/json; charset=UTF-8\n X-RateLimit-Limit: 60\n X-RateLimit-Remaining: 59\n\n{\n  \"error\": {\n    \"type\": \"ValidationException\",\n    \"field\": \"full-name\",\n    \"message\": \"The full-name may not be greater than 254 characters.\",\n    \"rule\": \"max\",\n    \"rule_attributes\": [\n      \"254\"\n    ]\n  }\n}",
          "type": "json"
        },
        {
          "title": "Invalid Account Provided:",
          "content": "Error 404: Not Found\n\nDate: Wed, 16 Nov 2016 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n\n{\n    \"error\": {\n         \"type\": \"InvalidAccountProvided\",\n         \"message\": \"Sorry! system does not recognize your account, please correct your input and re-try\"\n    }\n}",
          "type": "json"
        },
        {
          "title": "Invalid Appointment id Provided:",
          "content": "Error 404: HTTP NOT FOUND\n\nDate: Wed, 16 Nov 2016 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n\n{\n    \"error\": {\n         \"type\": \"InvalidAppointmentRecord\",\n         \"message\": \"Sorry! requested appointment does not exist\"\n    }\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "type",
            "defaultValue": "AppointmentUpdated",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>A system generated success message, on success response</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "User appointment is updated successfully",
          "content": "HTTP/1.1 200 OK\n\nDate: Wed, 16 Nov 2018 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n\n{\n    'success' => {\n         'type' => 'AppointmentUpdated',\n         'message' => 'User appointment is updated successfully',\n         'appointment_datetime' => '2018-09-01 12:00:00,\n     }\n}",
          "type": "json"
        }
      ]
    }
  },
  {
    "version": "1.0.1",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Accept",
            "defaultValue": "application/json",
            "description": "<p>Content-Types that are acceptable for the response</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-CSRF-TOKEN",
            "description": "<p>The CSRF that has been received in <code>system/get-x-csrf</code> Api</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Authorization header will hold the system generated token, that was generated in <code>users/register</code> Api call. e.g. <code>Authorization: Bearer y04Njk3LTA0MjYzIi</code></p>"
          }
        ]
      }
    },
    "group": "3__Appointments",
    "type": "post",
    "url": "api/add-appointment-notes",
    "title": "Add Appointment Notes",
    "name": "addAppointmentNotes",
    "description": "<p>This Api will help the user to add notes against his appointment</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "int",
            "optional": false,
            "field": "appointment_id",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "text",
            "optional": false,
            "field": "Notes",
            "description": "<p>text up to 500 characters</p>"
          }
        ]
      }
    },
    "filename": "app/ApiMocks/Controllers/AppointmentClass.php",
    "groupTitle": "3__Appointments",
    "sampleRequest": [
      {
        "url": "http://52.203.78.55:9980/api/add-appointment-notes"
      }
    ],
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "type",
            "defaultValue": "ValidationException",
            "description": "<p>This will define the type of error</p>"
          },
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "field",
            "description": "<p>The name of post object</p>"
          },
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>The error description against relevant field</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Validation Exception:",
          "content": " Error 422: Unprocessable Entity\n\n Date: Wed, 16 Nov 2016 09:33:07 GMT\n Server: Apache/2.4.23 (Ubuntu)\n Cache-Control: no-cache\n Access-Control-Allow-Origin: *\n Vary: Accept-Encoding\n Content-Encoding: gzip\n Content-Length: 228\n Connection: close\n Content-Type: application/json; charset=UTF-8\n X-RateLimit-Limit: 60\n X-RateLimit-Remaining: 59\n\n{\n  \"error\": {\n    \"type\": \"ValidationException\",\n    \"field\": \"full-name\",\n    \"message\": \"The full-name may not be greater than 254 characters.\",\n    \"rule\": \"max\",\n    \"rule_attributes\": [\n      \"254\"\n    ]\n  }\n}",
          "type": "json"
        },
        {
          "title": "Invalid Account Provided:",
          "content": "Error 404: Not Found\n\nDate: Wed, 16 Nov 2016 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n\n{\n    \"error\": {\n         \"type\": \"InvalidAccountProvided\",\n         \"message\": \"Sorry! system does not recognize your account, please correct your input and re-try\"\n    }\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "type",
            "defaultValue": "PictureUploaded",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>A system generated success message, on success response</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "User notes added for the appointment:",
          "content": "HTTP/1.1 200 OK\n\nDate: Wed, 16 Nov 2018 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n\n{\n    \"success\": {\n         \"type\": \"NotesAdded\",\n         \"message\": \"User notes added for the appointment\",\n         \"notes\": \"Any notes about the appointment\"\n    }\n}",
          "type": "json"
        }
      ]
    }
  },
  {
    "version": "1.0.1",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Accept",
            "defaultValue": "application/json",
            "description": "<p>Content-Types that are acceptable for the response</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-CSRF-TOKEN",
            "description": "<p>The CSRF that has been received in <code>system/get-x-csrf</code> Api</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Authorization header will hold the system generated token, that was generated in <code>users/register</code> Api call. e.g. <code>Authorization: Bearer y04Njk3LTA0MjYzIi</code></p>"
          }
        ]
      }
    },
    "group": "3__Appointments",
    "type": "post",
    "url": "api/book-appointment",
    "title": "Book user appointment",
    "name": "bookAppointment",
    "description": "<p>This Api will help the user to book appointment for user either appointment of hospital or Lab or doctor</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "appointment_datetime",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "int",
            "optional": false,
            "field": "appointment_type",
            "description": "<p>This will define if it is a hospital / lab / gp appointment</p>"
          }
        ]
      }
    },
    "filename": "app/ApiMocks/Controllers/AppointmentClass.php",
    "groupTitle": "3__Appointments",
    "sampleRequest": [
      {
        "url": "http://52.203.78.55:9980/api/book-appointment"
      }
    ],
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "type",
            "defaultValue": "ValidationException",
            "description": "<p>This will define the type of error</p>"
          },
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "field",
            "description": "<p>The name of post object</p>"
          },
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>The error description against relevant field</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Validation Exception:",
          "content": " Error 422: Unprocessable Entity\n\n Date: Wed, 16 Nov 2016 09:33:07 GMT\n Server: Apache/2.4.23 (Ubuntu)\n Cache-Control: no-cache\n Access-Control-Allow-Origin: *\n Vary: Accept-Encoding\n Content-Encoding: gzip\n Content-Length: 228\n Connection: close\n Content-Type: application/json; charset=UTF-8\n X-RateLimit-Limit: 60\n X-RateLimit-Remaining: 59\n\n{\n  \"error\": {\n    \"type\": \"ValidationException\",\n    \"field\": \"full-name\",\n    \"message\": \"The full-name may not be greater than 254 characters.\",\n    \"rule\": \"max\",\n    \"rule_attributes\": [\n      \"254\"\n    ]\n  }\n}",
          "type": "json"
        },
        {
          "title": "Invalid Account Provided:",
          "content": "Error 404: Not Found\n\nDate: Wed, 16 Nov 2016 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n\n{\n    \"error\": {\n         \"type\": \"InvalidAccountProvided\",\n         \"message\": \"Sorry! system does not recognize your account, please correct your input and re-try\"\n    }\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "type",
            "defaultValue": "AppointmentBooked",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>A system generated success message, on success response</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Appointment data saved",
          "content": "HTTP/1.1 200 OK\n\nDate: Wed, 16 Nov 2018 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n\n{\n    \"success\": {\n         \"type\": \"AppointmentBooked\",\n         \"message\": \"Appointment data saved\",\n         \"appointment_time\": \"2018-09-02 16:10:00\"\n    }\n}",
          "type": "json"
        }
      ]
    }
  },
  {
    "version": "1.0.1",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Accept",
            "defaultValue": "application/json",
            "description": "<p>Content-Types that are acceptable for the response</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-CSRF-TOKEN",
            "description": "<p>The CSRF that has been received in <code>system/get-x-csrf</code> Api</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Authorization header will hold the system generated token, that was generated in <code>users/register</code> Api call. e.g. <code>Authorization: Bearer y04Njk3LTA0MjYzIi</code></p>"
          }
        ]
      }
    },
    "group": "3__Appointments",
    "type": "post",
    "url": "api/get-appointment-list",
    "title": "Get Appointment List",
    "name": "getAppointments",
    "description": "<p>This Api will help the user to list all the booked and missed appontments</p>",
    "filename": "app/ApiMocks/Controllers/AppointmentClass.php",
    "groupTitle": "3__Appointments",
    "sampleRequest": [
      {
        "url": "http://52.203.78.55:9980/api/get-appointment-list"
      }
    ],
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "type",
            "defaultValue": "ValidationException",
            "description": "<p>This will define the type of error</p>"
          },
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "field",
            "description": "<p>The name of post object</p>"
          },
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>The error description against relevant field</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Validation Exception:",
          "content": " Error 422: Unprocessable Entity\n\n Date: Wed, 16 Nov 2016 09:33:07 GMT\n Server: Apache/2.4.23 (Ubuntu)\n Cache-Control: no-cache\n Access-Control-Allow-Origin: *\n Vary: Accept-Encoding\n Content-Encoding: gzip\n Content-Length: 228\n Connection: close\n Content-Type: application/json; charset=UTF-8\n X-RateLimit-Limit: 60\n X-RateLimit-Remaining: 59\n\n{\n  \"error\": {\n    \"type\": \"ValidationException\",\n    \"field\": \"full-name\",\n    \"message\": \"The full-name may not be greater than 254 characters.\",\n    \"rule\": \"max\",\n    \"rule_attributes\": [\n      \"254\"\n    ]\n  }\n}",
          "type": "json"
        },
        {
          "title": "Invalid Account Provided:",
          "content": "Error 404: Not Found\n\nDate: Wed, 16 Nov 2016 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n\n{\n    \"error\": {\n         \"type\": \"InvalidAccountProvided\",\n         \"message\": \"Sorry! system does not recognize your account, please correct your input and re-try\"\n    }\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "type",
            "defaultValue": "GetAppointmentList",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>A system generated success message, on success response</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Appointments list",
          "content": "HTTP/1.1 200 OK\n\nDate: Wed, 16 Nov 2018 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n\n{\n    \"success\": {\n         \"type\": \"GetAppointmentList\",\n         \"message\": \"Appointments list\",\n         \"appointment_list\": [\n              {\n                 \"appointment_id\": 1,\n                 \"appointment_time\": \"2018-07-01 11:15:00\",\n                 \"doctor_id\": 1,\n                 \"patient_id\": 2,\n                 \"location\": \"WEST BEACH SA 5024\",\n                 \"pregnancy_week\": 23,\n                 \"appointment_type\": \"hospital\",\n                 \"created_at\": \"2018-06-11 09:44:40\",\n                 \"updated_at\": \"2018-06-11 09:44:40\",\n                 \"status\": 0,\n                 \"notes\": null,\n                 \"doctor_detail\": {\n                     \"doctor_id\": 1,\n                         \"first_name\": \"Daniel\",\n                         \"last_name\": \"Mark\",\n                         \"title\": \"Gynaecologist\",\n                         \"qualifications\": \"MBBS FCPS\",\n                         \"gender\": \"Male\",\n                          \"langauges\": \"French, English\",\n                          \"created_at\": null,\n                          \"updated_at\": null\n                     }\n                 }\n         ]\n    }\n}",
          "type": "json"
        },
        {
          "title": "user does not have a gp assigned",
          "content": "HTTP/1.1 200 OK\n\nDate: Wed, 16 Nov 2018 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n\n{\n    \"success\": {\n         \"type\": \"GpNotSelected\",\n         \"message\": \"Select gp before appointment booking\",\n    }\n}",
          "type": "json"
        }
      ]
    }
  },
  {
    "version": "1.0.1",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Accept",
            "defaultValue": "application/json",
            "description": "<p>Content-Types that are acceptable for the response</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-CSRF-TOKEN",
            "description": "<p>The CSRF that has been received in <code>system/get-x-csrf</code> Api</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Authorization header will hold the system generated token, that was generated in <code>users/register</code> Api call. e.g. <code>Authorization: Bearer y04Njk3LTA0MjYzIi</code></p>"
          }
        ]
      }
    },
    "group": "4__GP",
    "type": "post",
    "url": "api/get-gps-list",
    "title": "Get GPs list",
    "name": "Get_Gps_List",
    "description": "<p>This Api will help user to get the list of all the near by GPs</p>",
    "filename": "app/ApiMocks/Controllers/GpClass.php",
    "groupTitle": "4__GP",
    "sampleRequest": [
      {
        "url": "http://52.203.78.55:9980/api/get-gps-list"
      }
    ],
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "type",
            "defaultValue": "ValidationException",
            "description": "<p>This will define the type of error</p>"
          },
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "field",
            "description": "<p>The name of post object</p>"
          },
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>The error description against relevant field</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Validation Exception:",
          "content": " Error 422: Unprocessable Entity\n\n Date: Wed, 16 Nov 2016 09:33:07 GMT\n Server: Apache/2.4.23 (Ubuntu)\n Cache-Control: no-cache\n Access-Control-Allow-Origin: *\n Vary: Accept-Encoding\n Content-Encoding: gzip\n Content-Length: 228\n Connection: close\n Content-Type: application/json; charset=UTF-8\n X-RateLimit-Limit: 60\n X-RateLimit-Remaining: 59\n\n{\n  \"error\": {\n    \"type\": \"ValidationException\",\n    \"field\": \"full-name\",\n    \"message\": \"The full-name may not be greater than 254 characters.\",\n    \"rule\": \"max\",\n    \"rule_attributes\": [\n      \"254\"\n    ]\n  }\n}",
          "type": "json"
        },
        {
          "title": "Invalid Account Provided:",
          "content": "Error 404: Not Found\n\nDate: Wed, 16 Nov 2016 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n\n{\n    \"error\": {\n         \"type\": \"InvalidAccountProvided\",\n         \"message\": \"Sorry! system does not recognize your account, please correct your input and re-try\"\n    }\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "type",
            "defaultValue": "GetGpList",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>A system generated success message, on success response</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Get gps list with schedules",
          "content": "HTTP/1.1 200 OK\n\nDate: Wed, 16 Nov 2018 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n\n{\n    'success' => {\n         'type' => 'GetGpList',\n         'message' => 'Get gps list with schedules',\n         \"gps\": [\n                  {\n                      \"doctor_id\": 1,\n                      \"first_name\": \"Brig Waqar\",\n                      \"last_name\": \"Ahmed\",\n                       \"title\": \"Gynaecologist\",\n                       \"qualifications\": \"MBBS FCPS\",\n                       \"gender\": \"Male\",\n                       \"langauges\": \"English, Urdu\",\n                       \"created_at\": null,\n                       \"updated_at\": null,\n                       \"schedules\": [\n                         {\n                                 \"schedule_id\": 1,\n                                 \"doctor_id\": 1,\n                                 \"location\": \"Civil Lines, Rawalpindi,Pakistan\",\n                                 \"phone_no\": \"5146528\",\n                                 \"postal_code\": \"46000\",\n                                 \"time\": \"11:00-16:00\",\n                                     \"created_at\": null,\n                                 \"updated_at\": null,\n                                 \"latitude\": 33.5917,\n                                 \"longitude\": 73.0663\n                          }\n                         ]\n                     },\n                      {\n                          \"doctor_id\": 2,\n                              \"first_name\": \"Muhammad\",\n                              \"last_name\": \"Ali\",\n                              \"title\": \"Gynaecologist\",\n                              \"qualifications\": \"MBBS FCPS\",\n                              \"gender\": \"Male\",\n                              \"langauges\": \"English, Urdu\",\n                              \"created_at\": null,\n                              \"updated_at\": null,\n                              \"schedules\": [\n                                  {\n                                      \"schedule_id\": 2,\n                                      \"doctor_id\": 2,\n                                      \"location\": \"Civil Lines, Rawalpindi,Pakistan\",\n                                      \"phone_no\": \"5394285\",\n                                      \"postal_code\": \"46000\",\n                                      \"time\": \"11:00-16:00\",\n                                      \"created_at\": null,\n                                      \"updated_at\": null,\n                                      \"latitude\": 33.5306,\n                                      \"longitude\": 73.0612\n                                  }\n                              ]\n                          }\n                         .\n                         .\n                         .\n                         .\n                         .\n             }\n         }",
          "type": "json"
        }
      ]
    }
  },
  {
    "version": "1.0.1",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Accept",
            "defaultValue": "application/json",
            "description": "<p>Content-Types that are acceptable for the response</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "X-CSRF-TOKEN",
            "description": "<p>The CSRF that has been received in <code>system/get-x-csrf</code> Api</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Authorization header will hold the system generated token, that was generated in <code>users/register</code> Api call. e.g. <code>Authorization: Bearer y04Njk3LTA0MjYzIi</code></p>"
          }
        ]
      }
    },
    "group": "4__GP",
    "type": "post",
    "url": "api/select-gp",
    "title": "Select GP",
    "name": "Select_GP",
    "description": "<p>This Api will help user to assign a gp against logged in user</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "int",
            "optional": false,
            "field": "doctor_id",
            "description": "<p>id of the doctor</p>"
          }
        ]
      }
    },
    "filename": "app/ApiMocks/Controllers/GpClass.php",
    "groupTitle": "4__GP",
    "sampleRequest": [
      {
        "url": "http://52.203.78.55:9980/api/select-gp"
      }
    ],
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "type",
            "defaultValue": "ValidationException",
            "description": "<p>This will define the type of error</p>"
          },
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "field",
            "description": "<p>The name of post object</p>"
          },
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>The error description against relevant field</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Validation Exception:",
          "content": " Error 422: Unprocessable Entity\n\n Date: Wed, 16 Nov 2016 09:33:07 GMT\n Server: Apache/2.4.23 (Ubuntu)\n Cache-Control: no-cache\n Access-Control-Allow-Origin: *\n Vary: Accept-Encoding\n Content-Encoding: gzip\n Content-Length: 228\n Connection: close\n Content-Type: application/json; charset=UTF-8\n X-RateLimit-Limit: 60\n X-RateLimit-Remaining: 59\n\n{\n  \"error\": {\n    \"type\": \"ValidationException\",\n    \"field\": \"full-name\",\n    \"message\": \"The full-name may not be greater than 254 characters.\",\n    \"rule\": \"max\",\n    \"rule_attributes\": [\n      \"254\"\n    ]\n  }\n}",
          "type": "json"
        },
        {
          "title": "Invalid Account Provided:",
          "content": "Error 404: Not Found\n\nDate: Wed, 16 Nov 2016 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n\n{\n    \"error\": {\n         \"type\": \"InvalidAccountProvided\",\n         \"message\": \"Sorry! system does not recognize your account, please correct your input and re-try\"\n    }\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "type",
            "defaultValue": "GpSelectedSuccessfully",
            "description": ""
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>A system generated success message, on success response</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "User has selected the gp successfully",
          "content": "HTTP/1.1 200 OK\n\nDate: Wed, 16 Nov 2018 09:33:07 GMT\nServer: Apache/2.4.23 (Ubuntu)\nCache-Control: no-cache\nAccess-Control-Allow-Origin: *\nVary: Accept-Encoding\nContent-Encoding: gzip\nContent-Length: 228\nConnection: close\nContent-Type: application/json; charset=UTF-8\nX-RateLimit-Limit: 60\nX-RateLimit-Remaining: 59\n\n{\n    'success' => {\n         'type' => 'GpSelectedSuccessfully',\n         'message' => 'User has selected the gp successfully',\n         'user_id_fk' => 3,\n     }\n}",
          "type": "json"
        }
      ]
    }
  }
] });
