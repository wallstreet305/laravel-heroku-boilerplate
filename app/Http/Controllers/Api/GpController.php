<?php

namespace OBS\Http\Controllers\Api;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use JWTAuth;
use OBS\Doctors;
use OBS\Hospitals;
use OBS\Http\Middleware\ServiceAccess;
use OBS\UserDoctors;
use Tymon\JWTAuth\Exceptions\JWTException;
use Exception;
use Log;
use OBS\Http\Controllers\MainController;
use Schnittstabil\Csrf\TokenService\TokenService;
use OBS\Http\Middleware\AuthJWT;
use OBS\DoctorSchedules;
use OBS\Labs;
use OBS\Http\Requests\Gps\GPSRequest;
use DB;
use Config;


class GpController extends MainController
{
    //
    public function __construct()
    {
        $this->middleware(ServiceAccess::class);
    }

    public function getGpsHospitalLabList(Request $request) {
        try {
            $doctor_schedule = new DoctorSchedules;
            $doctors = Doctors::all();
            $labs = Labs::all();
            $hospitals = Hospitals::all();

            $user = JWTAuth::user();
            if (!empty($user) && $user->count() > 0) {
                if ($doctors->isNotEmpty()) {
                    foreach ($doctors as $gp) {
                        $gp_schedules = $doctor_schedule->getDoctorSchedules($gp->doctor_id);
                        $gp['schedules'] = $gp_schedules;
                    }
                }
                return $this->displayResponseToUser($request, [
                    'success' => [
                        'type' => 'GetGpHospitalLabList',
                        'message' => 'Get gps, hospitals and labs list',
                        'gps' => $doctors,
                        'hospitals' => $hospitals,
                        'labs' => $labs
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

        } catch(Exception $e) {
            Log::error(
                'Get Gps list method exception (getGpsList()):' . PHP_EOL .
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

    public function selectUserGpHospitalLab(GPSRequest $request) {
        try {
            $input = $request->all();
            $type = $input['type'];

            $user = JWTAuth::user();
            $user_id = $user['user_id'];
            if (!empty($user) && $user->count() > 0) {
                if ($type==3) {
                    $doctor_id = $input['selected_id'];
                    UserDoctors::updateOrCreate(
                        ['user_id_fk' => $user_id],
                        ['doctor_id_fk' => $doctor_id]
                    );
                } else if ($type==2) {
                    $lab_id = $input['selected_id'];
                    UserDoctors::updateOrCreate(
                        ['user_id_fk' => $user_id],
                        ['lab_id_fk' => $lab_id]
                    );
                } else if ($type ==1) {
                    $hospital_id = $input['selected_id'];
                    UserDoctors::updateOrCreate(
                        ['user_id_fk' => $user_id],
                        ['hospital_id_fk' => $hospital_id]
                    );
                }

                return $this->displayResponseToUser($request, [
                    'success' => [
                        'type' => 'SelectedSuccessfully',
                        'message' => 'User has selected the gp/ hospital/ lab successfully',
                        'user_id_fk' =>$user_id
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
           //UserDoctors::updateOrCreate([''])

        } catch(Exception $e) {
            Log::error(
                'Select GP method exception (selectUserGp()):' . PHP_EOL .
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
}
