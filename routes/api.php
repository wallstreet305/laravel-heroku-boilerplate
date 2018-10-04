<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * Method to add cross domain api call resolving headers
 *
 * @param \Illuminate\Http\Request $request
 * @param \Illuminate\Http\Response $response
 * @return \Illuminate\Http\Response
 */
Route::options('/{all}', function (\Illuminate\Http\Request $request, \Illuminate\Http\Response $response) {
    $origin = $request->header('origin') ?: $request->url();
    $response->header('Access-Control-Allow-Origin', '*');
    $response->header('Access-Control-Allow-Headers', 'origin, content-type, accept, X-CSRF-TOKEN, Authorization');
    $response->header('Access-Control-Allow-Methods', 'GET, HEAD, OPTIONS, POST, PATCH, DELETE, PUT');
    return $response;
})->where('all', '.*');

/**
 * API url bindings
 */
{
    Route::get('/', function() {
        return redirect('api/get-x-csrf');
    });

    # System controller routes
    Route::get('get-x-csrf', 'Api\SystemController@getXCsrf');
}

/**
 * User Routes
 */
{
    Route::post('login', 'Api\UserController@userSignIn');
    Route::post('register-via-email', 'Api\UserController@registerViaEmail');
    Route::post('forgot-password', 'Api\UserController@forgotPassword');
    Route::patch('resend-verification-code', 'Api\UserController@resendVerificationCode');
    Route::post('login-via-social-app', 'Api\UserController@loginViaSocialApp');
    Route::patch('reset-password', 'Api\UserController@resetPassword');
    Route::post('/user-logout', 'Api\UserController@userLogout');
    Route::patch('/activate', 'Api\UserController@accountActivation');
    Route::patch('/verify-email', 'Api\UserController@verifyActivationCode');
    Route::patch('/set-bmi', 'Api\UserController@saveBmiValues');
    Route::post('/update-profile', 'Api\UserController@updateUserProfile');
    Route::post('/profile-picture', 'Api\UserController@uploadProfilePicture');
    Route::get('/refresh-auth-token', 'Api\UserController@refreshAuthToken');
}

/**
 * Appointment routes
 */
{
    Route::post('book-appointment', 'Api\AppointmentController@bookAppointment');
    Route::get('get-appointment-list', 'Api\AppointmentController@getAppointments');
    Route::patch('add-appointment-notes', 'Api\AppointmentController@addAppointmentNotes');
    Route::patch('edit-appointment', 'Api\AppointmentController@editAppointment');
    Route::delete('delete-appointment', 'Api\AppointmentController@deleteAppointment');
    Route::get('get-appointment-detail', 'Api\AppointmentController@getAppointmentDetail');
    Route::post('update-appointment-status', 'Api\AppointmentController@updateAppointmentStatus');
    /// CRUD for Emergency contacts
    Route::post('save-contact', 'Api\AppointmentController@saveContact');
    Route::get('contact-list', 'Api\AppointmentController@getContactList');
    Route::get('/get-all-appointments', 'Api\AppointmentController@getWeeklyAppointments');

    /// FAQS
    Route::get('get-faqs','Api\AppointmentController@getAllFaqs');

    Route::get('get-checklist-items','Api\AppointmentController@getChecklist');
    Route::post('update-checklist-item','Api\AppointmentController@updateChecklistItem');
}

/**
 * General Routes
 */
{
    Route::get('check-status', 'Api\AppointmentController@getStatus');

}

/**
 * Search Routes
 */
{
    Route::get('get-gps-hospitals-labs-list', 'Api\GpController@getGpsHospitalLabList');
    Route::post('select-gp-hospital-lab', 'Api\GpController@selectUserGpHospitalLab');
}

/**
 * FAQs
 */
{

}


/**
 * Messages Routes
 */
{

}

/**
 * Info Routes
 */
{
//    Route::post('contact-us', 'SystemController@contactUs');
}

{
//    Route::any('hospitals', 'Api\AppointmentController@insertHospitals');
//    Route::any('labs', 'Api\AppointmentController@insertLabs');
}