<?php
namespace OBS\Http\Controllers\Api;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use JWTAuth;
use OBS\CheckList;
use OBS\DoctorSchedules;
use OBS\FaqCategories;
use OBS\FaqQuestions;
use OBS\Http\Middleware\ServiceAccess;
use OBS\Http\Requests\Appointments\UASRequest;
use OBS\Http\Requests\Appointments\UCSRequest;
use OBS\Jobs\SendBackgroundEmail;
use OBS\UserCheckList;
use Symfony\Component\Console\Question\Question;
use Tymon\JWTAuth\Exceptions\JWTException;
use Exception;
use Log;
use OBS\Http\Controllers\MainController;
use OBS\Http\Requests\Appointments\BGARequest;
use OBS\Http\Requests\Appointments\AANRequest;
use OBS\Http\Requests\Appointments\EARequest;
use OBS\Http\Requests\Appointments\SCRequest;
use OBS\Http\Requests\Appointments\GADRequest;
use Schnittstabil\Csrf\TokenService\TokenService;
use OBS\Http\Middleware\AuthJWT;
use OBS\UserDoctors;
use OBS\Doctors;
use OBS\UserStats;
use OBS\Appointments;
use OBS\EmergencyContacts;
use OBS\Questions;
use OBS\WeeklyAppointments;
use OBS\Labs;
use OBS\Hospitals;
use DB;
use Config;

class AppointmentController extends MainController
{
    //
    public function __construct()
    {
        $this->middleware(ServiceAccess::class,[
            'except' => ['getWeeklyAppointments','getAllFaqs', 'insertHospitals', 'insertLabs']
        ]);
    }

    public function bookAppointment(BGARequest $request) {

        try {
            $userDoctorObj = new UserDoctors;
            $doctorObj = new Doctors;
            $doctorScheduleObj = new DoctorSchedules;
            $labObj = new Labs;
            $hospitalObj = new Hospitals;
            $weeklyAppointmentObj = new WeeklyAppointments;

            $doctor_id = '';
            $hospital_id = '';
            $lab_id = '';
            $location = '';
            $lab_detail = '';
            $hospital_detail = '';
            $appointment_type = 0;
            $overview = '';

            DB::beginTransaction();

            $input = $request->all();
            $appointment_flag = (int)$input['appointment_type'];

            $user = JWTAuth::user();
            /// logged-in user id
            $user_id = $user['user_id'];
            $user_status = $userDoctorObj->getUserStatus($user_id);

            $user_stats = UserStats::where('user_id_fk','=', $user_id)
                ->first();
            $conceive_date = $user_stats->conceive_date;
            $conceive_date = Carbon::createFromTimestamp($conceive_date);
            $today = Carbon::now();
            $week_no = $conceive_date->diffInWeeks($today);
            Log::info(json_encode(['user_stats' => $user_stats, 'today' => $today], JSON_PRETTY_PRINT));

            if($appointment_flag == 3) {
                $doctor_id = $userDoctorObj->getDoctorId($user_id);
                if($doctor_id === false) {
                    return $this->displayResponseToUser($request, [
                        'error' => [
                            'type' => 'GpNotSelected',
                            'message' => 'Select gp before appointment booking'
                        ]
                    ], Response::HTTP_NOT_FOUND);
                }
                $doctor_schedule = $doctorScheduleObj->getDoctorSchedules($doctor_id);
                $appointment_type = Config::get('custom.appointment_types.a3');
                $location = $doctor_schedule[0]->location;

            } else if ($appointment_flag == 2) {
                $lab_id = $user_status->lab_id_fk;
                if ($lab_id != null and !empty($lab_id)) {
                    $lab_detail = $labObj->getLabDetail($lab_id);
                    $appointment_type = Config::get('custom.appointment_types.a2');
                }
            } else if($appointment_flag == 1) {
                $hospital_id = $user_status->hospital_id_fk;
                if ($hospital_id != null and !empty($hospital_id)) {
                    $hospital_detail = $hospitalObj->getHospitalDetail($hospital_id);
                    $appointment_type = Config::get('custom.appointment_types.a1');
                }
            }

            $appointment = Appointments::create([
                'appointment_time' => $input['appointment_datetime'],
                'doctor_id' => $doctor_id,
                'hospital_id' => $hospital_id,
                'lab_id' => $lab_id,
                'patient_id' => $user_id,
                'location' => $location,
                'pregnancy_week' => $week_no,
                'appointment_type' => $appointment_type,
                'status' => 0
            ]);

            DB::commit();
            if (!empty($appointment)) {

                $appointment = Appointments::where('patient_id', $appointment->patient_id)
                    ->where('appointment_id', $appointment->appointment_id)
                    ->first();

                if($appointment_flag == 3) {
                    $doctor_id = $appointment->doctor_id;
                    $doctor = $doctorObj->getDoctorDetail($doctor_id);
                    $appointment_type = 'gp';
                    $weeklyAppointmentData = $weeklyAppointmentObj->getAppointmentOverview($week_no, $appointment_type);
                    Log::info(json_encode($weeklyAppointmentData));
                    Log::info(json_encode(['week_no' => $week_no, 'appointment_type' => $appointment_type], JSON_PRETTY_PRINT));

                    if(!empty($weeklyAppointmentData))
                        $overview = $weeklyAppointmentData->overview;
                    else
                        $overview = "";

                    $appointment['overview'] = $overview;
                    $appointment['labs'] = "";
                    $appointment['lab_detail'] = null;
                    $appointment['hospital_detail'] = null;
                    $appointment['doctor_detail'] = $doctor;
                    $appointment['doctor_detail']['schedules'] = $doctor_schedule;

                } else if($appointment_flag == 2) {
                    $appointment_type = 'lab';
                    $weeklyAppointmentData = $weeklyAppointmentObj->getAppointmentOverview($week_no, $appointment_type);
                    $labs = $weeklyAppointmentData->title;

                    $appointment['overview'] = "";
                    $appointment['labs'] = $labs;
                    $appointment['doctor_detail'] = null;
                    $appointment['hospital_detail'] = null;
                    $appointment['lab_detail'] = $lab_detail;
                } else if($appointment_flag == 1) {
                    $appointment['overview'] = "";
                    $appointment['labs'] = "";
                    $appointment['doctor_detail'] = null;
                    $appointment['lab_detail'] = null;
                    $appointment['hospital_detail'] = $hospital_detail;
                }
            }

            return $this->displayResponseToUser($request, [
                'success' => [
                    'type' => 'AppointmentBooked',
                    'message' => 'Appointment data saved',
                    'appointment' => $appointment
                ]
            ], Response::HTTP_OK);

        } catch (JWTException $e) {
            DB::rollBack();
            Log::error(
                'Book GP Appointment method exception (bookGpAppointment()):' . PHP_EOL .
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
    public function getAppointments(Request $request) {
        try {
            $doctorObj = new Doctors;
            $user = JWTAuth::user();
            $weeklyAppointmentObj = new WeeklyAppointments;
            $labObj = new Labs;
            $hospitalObj = new Hospitals;
            /// logged-in user id
            if (!empty($user) && $user->count() > 0) {
                $user_id = $user['user_id'];

                $user_stats = UserStats::where('user_id_fk','=', $user_id)
                    ->first();
                $conceive_date = $user_stats->conceive_date;
                $conceive_date = Carbon::createFromTimestamp($conceive_date);
                $today = Carbon::now();
                $week_no = $conceive_date->diffInWeeks($today);

                $appointments = Appointments::where('patient_id', $user_id)
                    ->latest('appointment_id')
                    ->limit(4)
                    ->get();

                foreach ($appointments as $appointment) {

                    $appointment_type = $appointment->appointment_type;

                    if($appointment_type === 'doctor') {

                        $doctor_id = $appointment->doctor_id;
                        $doctor = $doctorObj->getDoctorDetail($doctor_id);

                        $weeklyAppointmentData = $weeklyAppointmentObj->getAppointmentOverview($week_no, 'gp');
                        $overview = $weeklyAppointmentData->overview;

                        $appointment['overview'] = $overview;
                        $appointment['labs'] = "";
                        $appointment['lab_detail'] = null;
                        $appointment['hospital_detail'] = null;
                        $appointment['appointment_time'] = Carbon::createFromTimestamp($appointment->appointment_time);
                        $appointment['doctor_detail'] = $doctor;
                    } else if($appointment_type === "lab") {

                        $lab_id = $appointment->lab_id;
                        $lab_detail = $labObj->getLabDetail($lab_id);

                        $weeklyAppointmentData = $weeklyAppointmentObj->getAppointmentOverview($week_no, $appointment_type);
                        $labs = $weeklyAppointmentData->title;

                        $appointment['overview'] = "";
                        $appointment['labs'] = $labs;
                        $appointment['doctor_detail'] = null;
                        $appointment['hospital_detail'] = null;
                        $appointment['lab_detail'] = $lab_detail;
                    } else if($appointment_type === "hospital") {

                        $hospital_id = $appointment->hospital_id;
                        $hospital_detail = $hospitalObj->getHospitalDetail($hospital_id);
                        $appointment['overview'] = "";
                        $appointment['labs'] = "";
                        $appointment['doctor_detail'] = null;
                        $appointment['lab_detail'] = null;
                        $appointment['hospital_detail'] = $hospital_detail;
                    }

                }

                return $this->displayResponseToUser($request, [
                    'success' => [
                        'type' => 'GetAppointmentList',
                        'message' => 'Appointments list',
                        'appointment_list' => $appointments,
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

            Log::error(
                'Get Appointment method exception (getAppointments()):' . PHP_EOL .
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
    public function getAppointmentDetail(GADRequest $request) {
        try {
            $weeklyAppointmentObj = new WeeklyAppointments;
            $questionObj = new Questions;
            $doctorObj = new Doctors;
            $input = $request->all();
            $user = JWTAuth::user();
            $user_id = $user['user_id'];

        /** @var  Appointment with Detail */

            $appointment = Appointments::where('patient_id', $user_id)
                                ->where('appointment_id', $input['appointment_id'])
                                ->first();
            if (empty($appointment)) {
                return $this->displayResponseToUser($request, [
                    'success' => [
                        'type' => 'NoAppointmentAvailable',
                        'message' => 'User does not have any appointment',
                    ]
                ], Response::HTTP_OK);
            }
            $week_no = $appointment->pregnancy_week;
            $appointment_type = $appointment->appointment_type;
            $doctor_id = $appointment->doctor_id;
            $doctor = $doctorObj->getDoctorDetail($doctor_id);
            $appointment['doctor_detail'] = $doctor;
        /** Weekly Appointment Record */

            return $this->displayResponseToUser($request, [
                'success' => [
                    'type' => 'AppointmentAvailable',
                    'message' => 'User appointment detail',
                    'appointment' => $appointment,
                ]
            ], Response::HTTP_OK);


        } catch (Exception $e) {
            Log::error(
                'Get Appointment Detail method exception (getAppointmentDetail()):' . PHP_EOL .
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

    public function addAppointmentNotes(AANRequest $request) {
        try {
            $input = $request->all();
            $notes = $input['notes'];
            $appointment_id = $input['appointment_id'];
            $user = JWTAuth::user(); /// logged-in user id
            if (!empty($user) && $user->count() > 0) {
                if(!empty($notes))
                {
                    $appointment_id = (int)$appointment_id;
                    $res = Appointments::where('patient_id', $user['user_id'])
                            ->where('appointment_id', $appointment_id)
                            ->update(['notes' => $notes]);
                    if ($res) {
                        return $this->displayResponseToUser($request, [
                            'success' => [
                                'type' => 'NotesAdded',
                                'message' => 'User notes added for the appointment',
                                'notes' => $notes
                            ]
                        ], Response::HTTP_OK);
                    } else {
                        return $this->displayResponseToUser($request, [
                            'error' => [
                                'type' => 'InvalidAppointment',
                                'message' => 'User not allowed to update this appoinment',
                            ]
                        ], Response::HTTP_UNAUTHORIZED);
                    }

                }
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
                'Notes added against the appointment exception (addAppointmentNotes):' . PHP_EOL .
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
    public function editAppointment(EARequest $request) {
        try {
            $input = $request->all();
            $user = JWTAuth::user();

            if (!empty($user) && $user->count() > 0) {
                $user_id = $user['user_id'];
                $appointment_id = $input['appointment_id'];
                $appointment_time = $input['appointment_datetime'];

                $appointment_data = Appointments::where('appointment_id', $appointment_id)
                    ->where('patient_id', $user_id)
                    ->get();
                if ($appointment_data->isNotEmpty() && $appointment_data->count() > 0) {
                    $data = [
                        'appointment_time' => $appointment_time,
                    ];

                    //Appointments::find($appointment_id)->update($data);
                Appointments::where('patient_id', $user_id)
                            ->where('appointment_id', $appointment_id)
                            ->update($data);

                $appointment_time = strtotime(Carbon::parse($appointment_time)->toDateTimeString());

                    return $this->displayResponseToUser($request, [
                        'success' => [
                            'type' => 'AppointmentUpdated',
                            'message' => 'User appointment is updated successfully',
                            'appointment_datetime' => $appointment_time
                        ]
                    ], Response::HTTP_OK);
                } else {
                    return $this->displayResponseToUser($request, [
                        'error' => [
                            'type' => 'InvalidAppointmentRecord',
                            'message' => 'Sorry! requested appointment does not exist'
                        ]
                    ], Response::HTTP_NOT_FOUND);
                }
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
                'Edit appointment exception (editAppointment):' . PHP_EOL .
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

    public function saveContact(SCRequest $request) {

       try {
           $input = $request->all();
           $user = JWTAuth::user();

           DB::beginTransaction();

           if (!empty($user) && $user->count() > 0) {

                $user_id = $user['user_id'];
                $contact = [
                    "title" => $input['title'],
                    "phone_number" => $input['contact_number'],
                    "user_id_fk" => $user_id
                ];
                $res = EmergencyContacts::create($contact);

           DB::commit();

                return $this->displayResponseToUser($request, [
                   'success' => [
                       'type' => 'ContactSaved',
                       'message' => 'User contact is saved successfully',
                       'new_contact' => $contact
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
            DB::rollBack();
           Log::error(
               'Save contact method exception (saveContact()):' . PHP_EOL .
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

    public function getContactList(Request $request) {
        try {
            $user = JWTAuth::user();
            if (!empty($user) && $user->count() > 0) {
//                $contacts = EmergencyContacts::where('user_id_fk', $user['user_id'])->get();
                $contacts = EmergencyContacts::all();
                return $this->displayResponseToUser($request, [
                    'success' => [
                        'type' => 'ContactList',
                        'message' => 'User contacts list',
                        'new_contact' => $contacts
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
                'Get list of contacts, method exception (getContactList()):' . PHP_EOL .
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
    public function deleteAppointment(Request $request) {
        try {
            $input = $request->all();
            $user = JWTAuth::user();
            if (!empty($user) && $user->count() > 0) {
                Appointments::where('appointment_id','=', $input['appointment_id'])
                                ->where('patient_id', $user['user_id'])
                                ->delete();
                return $this->displayResponseToUser($request, [
                    'success' => [
                        'type' => 'AppointmentDeleted',
                        'message' => 'Appointment deleted successfully',
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
                'delete appointment, method exception (deleteAppointment()):' . PHP_EOL .
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

    public function getWeeklyAppointments(Request $request) {
        try {
            $appointments = WeeklyAppointments::select([
                                'weekly_appointment_id',
                                'title',
                                'overview',
                                'week_no',
                                'appointment_type'
                            ])
                            ->get();

            return $this->displayResponseToUser($request, [
                'success' => [
                    'type' => 'WeeklyAppointments',
                    'message' => 'User future weekly appointments',
                    'weekly_appointments' => $appointments
                ]
            ], Response::HTTP_OK);
        } catch(Exception $e) {
            Log::error(
                'Get Weekly appointments, method exception (getWeeklyAppointments()):' . PHP_EOL .
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

    public function getStatus(Request $request) {
        try {
            $userDoctorObj = new UserDoctors;
            $doctorObj = new Doctors;
            $hospitalObj = new Hospitals;
            $labObj = new Labs;
            $doctorScheduleObj = new DoctorSchedules;

            $user = JWTAuth::user();
            $user_id = $user['user_id'];

            $user_status = $userDoctorObj->getUserStatus($user_id);

            if ($user_status) {
                $doctor_id = $user_status->doctor_id_fk;
                $hospital_id = $user_status->hospital_id_fk;
                $lab_id = $user_status->lab_id_fk;

                $doctor_details = $doctorObj->getDoctorDetail($doctor_id);
                $doctor_schedule = $doctorScheduleObj->getDoctorSchedules($doctor_id);
                $doctor_details['schedules'] = $doctor_schedule;
                $hospital_details = $hospitalObj->getHospitalDetail($hospital_id);
                $lab_details = $labObj->getLabDetail($lab_id);

                return response()->json([
                    'success' => [
                        'type' => 'GetUserDoctorHospitalLabStatus',
                        'message' => 'Get user doctor hospital lab status',
                        'doctor_details' => $doctor_details,
                        'hospital_details' => $hospital_details,
                        'lab_details' => $lab_details ]
                ])->setStatusCode(Response::HTTP_OK);
            } else {
                return response()->json([
                    'success' => [
                        'type' => 'DoctorAndHospitalNotSelected',
                        'message' => 'Doctor and Hospital are not yet selected',
                        'doctor_details' => null,
                        'hospital_details' => null,
                        'lab_details' => null
                    ]
                ])->setStatusCode(Response::HTTP_UNAUTHORIZED);
            }


        } catch(Exception $e) {
            Log::error(
                'Get User Gp, Hospital, Lab status, method exception (getStatus()):' . PHP_EOL .
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

    public function getAllFaqs(Request $request) {
        try {

                $faq_categories = FaqCategories::all('category_id','category_name');

                foreach ($faq_categories as $category) {
                    $category_id = $category->category_id;
                    $questions = FaqQuestions::select('question_text','answer_text')
                                    ->where('category_id_fk', $category_id)
                                    ->get();
                    $category['questions'] = $questions;
                }

                return $this->displayResponseToUser($request, [
                    'success' => [
                        'type' => 'ListOfFaqQuestions',
                        'message' => 'Get list of faqs',
                        'faq' => $faq_categories,
                    ]
                ], Response::HTTP_OK);

        } catch(Exception $e) {
            Log::error(
                'Get Faqs, method exception (getAllFaqs()):' . PHP_EOL .
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

    public function updateAppointmentStatus(UASRequest $request)
    {
        try {
            $appointment = Appointments::where('appointment_id', $request->input('appointment-id'))
                ->update(['status' => $request->input('status')]);

            return $this->displayResponseToUser($request, [
                'success' => [
                    'type' => 'AppointmentUpdated',
                    'message' => 'Appointment Status Updated!',
                    'appointment' => Appointments::where('appointment_id', $request->input('appointment-id'))->first()
                ]
            ], Response::HTTP_OK);

        } catch(Exception $e) {
            Log::error(
                'Update appointment status, method exception (updateAppointmentStatus()):' . PHP_EOL .
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

    public function getChecklist(Request $request)
    {
        try {
            $user = JWTAuth::user();
            $checklist = CheckList::select([
                'checklist.checklist_id',
                'checklist.title'
            ])->get()
            ->toArray();

            $user_checklist = UserCheckList::where('user_id', '=', $user->user_id)
                ->get()
                ->toArray();

            $checklistItems = array_map(function($item) {
                return [
                    'checklist_id' => $item['checklist_id'],
                    'title' => $item['title'],
                    'status' => 0
                ];
            }, $checklist);

            foreach($user_checklist as $uc)
            {
                foreach ($checklistItems as $i => $ci)
                {
                    if($ci['checklist_id'] == $uc['checklist_id'])
                        $checklistItems[$i]['status'] = 1;
                    else
                        $checklistItems[$i]['status'] = 0;
                }
            }

            return $this->displayResponseToUser($request, [
                'success' => [
                    'type' => 'GetChecklist',
                    'message' => 'Success! Checklist items retrieved successfully!',
                    'checklist' => $checklistItems
                ]
            ], Response::HTTP_OK);

        } catch(Exception $e) {
            Log::error(
                'Get checklist method exception (getAppointementStatus()):' . PHP_EOL .
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

    public function updateChecklistItem(Request $request)
    {
        try {
            $user = JWTAuth::user();
            $checklist_items = $request->input('checklist-items');

            Log::info(json_encode($request->all()));

            if(empty($checklist_items))
                return $this->displayResponseToUser($request, [
                    'error' => [
                        'type' => 'NotAvailable',
                        'message' => 'Invalid Checklist items provided!'
                    ]
                ], Response::HTTP_UNPROCESSABLE_ENTITY);

            $items = [];
            foreach($checklist_items as $checklist_item) {
                $checklistItem = UserCheckList::where('checklist_id', '=', $checklist_item['checklist_id'])
                    ->where('user_id', '=', $user->user_id)
                    ->first();
                if (empty($checklistItem)) {
                    $checklistItem = UserCheckList::create([
                        'user_id' => $user->user_id,
                        'checklist_id' =>  $checklist_item['checklist_id'],
                        'checklist_status' =>  $checklist_item['checklist_status']
                    ]);
                } else {
                    $checklistItem->update(['checklist_status' => $checklist_item['checklist_status']]);
                }
                $items[] = [
                    'checklist_id' => $checklistItem['checklist_id'],
                    'title' => $checklist_item['title'],
                    'checklist_status' => $checklistItem['checklist_status'],
                ];
            }
            return $this->displayResponseToUser($request, [
                'success' => [
                    'type' => 'UpdateChecklistItem',
                    'message' => 'Success! checklist item updated successfully!',
                    'checklist' => $items
                ]
            ], Response::HTTP_OK);

        } catch(Exception $e) {
            Log::error(
                'Get checklist method exception (updateAppointmentStatus()):' . PHP_EOL .
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

   /* public function insertHospitals()
    {
        $file = storage_path('app/hospitals.csv');
        $file_handle = fopen($file, 'r');
        while (!feof($file_handle) ) {
            $line = fgetcsv($file_handle, 1024);
            if(empty($line[0]))
                continue;
            $data_to_insert = [
                'dhs_id' => $line[0],
                'name' => $line[1],
                'address' => $line[2],
                'suburb' => $line[3],
                'postcode' => $line[4],
                'phone' => $line[5],
                'subtype' => $line[6],
                'lat' => $line[7],
                'lng' => $line[8],
            ];
            Hospitals::create($data_to_insert);
        }
        fclose($file_handle);
        return 'inserted!';
    }*/

//    public function insertLabs()
//    {
//        $file = storage_path('app/SA-PATHOLOGY.csv');
//        $file_handle = fopen($file, 'r');
//        while (!feof($file_handle) ) {
//            $line = fgetcsv($file_handle, 1024);
//            if(empty($line[0]))
//                continue;
//            $data_to_insert = [
//                'area' => $line[0],
//                'suburb' => $line[1],
//                'location' => $line[2],
//                'timings' => $line[3],
//                'phone' => $line[4],
//                'lat' => $line[5],
//                'lng' => $line[6],
//            ];
//            Labs::create($data_to_insert);
//        }
//        fclose($file_handle);
//        return 'inserted!';
//    }

}
