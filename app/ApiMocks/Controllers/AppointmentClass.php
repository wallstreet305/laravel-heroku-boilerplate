<?php
/**
 * Created by Developer.
 * User: Muhammad Nadem
 * Date: 22/07/18
 * Time: 10:36 AM
 */

namespace OBS\ApiMocks\Controllers;
use Illuminate\Http\Request;
use OBS\ApiMocks\BaseSkeleton;
use OBS\Http\Requests\Appointments\AANRequest;
use OBS\Http\Requests\Appointments\EARequest;
use OBS\Http\Requests\Appointments\BGARequest;
use OBS\Http\Requests\Appointments\SCRequest;
use OBS\Http\Requests\Appointments\UASRequest;

interface AppointmentClass extends BaseSkeleton
{

    /**
     * @apiVersion 1.0.1
     * @apiHeader {String} Accept=application/json Content-Types that are acceptable for the response
     * @apiHeader {String} X-CSRF-TOKEN The CSRF that has been received in <code>system/get-x-csrf</code> Api
     * @apiGroup 3. Appointments
     * @api {post} api/book-appointment Book user appointment
     * @apiName bookAppointment
     * @apiDescription This Api will help the user to book appointment for user either appointment of hospital or Lab or doctor
     * @apiParam {string} appointment_datetime
     * @apiParam {int} appointment_type This will define appointment (1 = hospital, 2 = lab, 3 = gp)
     * @apiUse ValidationException
     * @apiUse InvalidAccountProvided
     * @apiUse AppointmentBooked
     * @param \OBS\Http\Requests\Users\BGARequest $request
     * @return \Illuminate\Http\Response
     */
    public function bookAppointment(BGARequest $request);

    /**
     * @apiVersion 1.0.1
     * @apiHeader {String} Accept=application/json Content-Types that are acceptable for the response
     * @apiHeader {String} X-CSRF-TOKEN The CSRF that has been received in <code>system/get-x-csrf</code> Api
     * @apiHeader {String} Authorization Authorization header will hold the system generated token, that
     * was generated in <code>users/register</code> Api call. e.g. <code>Authorization: Bearer y04Njk3LTA0MjYzIi</code>
     * @apiGroup 3. Appointments
     * @api {get} api/get-appointment-list Get Appointment List
     * @apiName getAppointments
     * @apiDescription This Api will help the user to list all the booked and missed appontments
     * @apiUse ValidationException
     * @apiUse InvalidAccountProvided
     * @apiUse GetAppointmentList
     * @apiUse GpNotSelected
     * @param \OBS\Http\Requests\Users\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getAppointments(Request $request);
    /**
     * @apiVersion 1.0.1
     * @apiHeader {String} Accept=application/json Content-Types that are acceptable for the response
     * @apiHeader {String} X-CSRF-TOKEN The CSRF that has been received in <code>system/get-x-csrf</code> Api
     * @apiHeader {String} Authorization Authorization header will hold the system generated token, that
     * was generated in <code>users/register</code> Api call. e.g. <code>Authorization: Bearer y04Njk3LTA0MjYzIi</code>
     * @apiGroup 3. Appointments
     * @api {patch} api/add-appointment-notes Add Appointment Notes
     * @apiName addAppointmentNotes
     * @apiDescription This Api will help the user to add notes against his appointment
     * @apiParam {int} appointment_id
     * @apiParam {text} Notes text up to 500 characters
     * @apiUse ValidationException
     * @apiUse InvalidAccountProvided
     * @apiUse NotesAdded
     * @param \OBS\Http\Requests\Users\AANRequest $request
     * @return \Illuminate\Http\Response
     */
    public function addAppointmentNotes(AANRequest $request);
    /**
     * @apiVersion 1.0.1
     * @apiHeader {String} Accept=application/json Content-Types that are acceptable for the response
     * @apiHeader {String} X-CSRF-TOKEN The CSRF that has been received in <code>system/get-x-csrf</code> Api
     * @apiHeader {String} Authorization Authorization header will hold the system generated token, that
     * was generated in <code>users/register</code> Api call. e.g. <code>Authorization: Bearer y04Njk3LTA0MjYzIi</code>
     * @apiGroup 3. Appointments
     * @api {patch} api/edit-appointment Edit Appointment
     * @apiName Edit Appointment
     * @apiDescription This Api will help the user to edit the appointment
     * @apiParam {int} appointment_id id of the appointment to edit
     * @apiParam {date} appointment_datetime new date and time of the appointment
     * @apiUse ValidationException
     * @apiUse InvalidAccountProvided
     * @apiUse AppointmentUpdated
     * @apiUse InvalidAppointmentRecord
     * @param \OBS\Http\Requests\Users\EARequest $request
     * @return \Illuminate\Http\Response
     */
    public function editAppointment(EARequest $request);
    /**
     * @apiVersion 1.0.1
     * @apiHeader {String} Accept=application/json Content-Types that are acceptable for the response
     * @apiHeader {String} X-CSRF-TOKEN The CSRF that has been received in <code>system/get-x-csrf</code> Api
     * @apiHeader {String} Authorization Authorization header will hold the system generated token, that
     * was generated in <code>users/register</code> Api call. e.g. <code>Authorization: Bearer y04Njk3LTA0MjYzIi</code>
     * @apiGroup 3. Appointments
     * @api {delete} api/delete-appointment Delete Appointment
     * @apiName Delete Appointment
     * @apiDescription This Api will help the user to delete the appointment
     * @apiParam {int} appointment_id id of the appointment to delete
     * @apiUse ValidationException
     * @apiUse InvalidAccountProvided
     * @apiUse AppointmentDeleted
     * @param \OBS\Http\Requests\Users\Request $request
     * @return \Illuminate\Http\Response
     */
    public function deleteAppointment(Request $request);
    /**
     * @apiVersion 1.0.1
     * @apiHeader {String} Accept=application/json Content-Types that are acceptable for the response
     * @apiHeader {String} X-CSRF-TOKEN The CSRF that has been received in <code>system/get-x-csrf</code> Api
     * @apiHeader {String} Authorization Authorization header will hold the system generated token, that
     * was generated in <code>users/register</code> Api call. e.g. <code>Authorization: Bearer y04Njk3LTA0MjYzIi</code>
     * @apiGroup 3. Appointments
     * @api {get} api/get-appointment-detail Appointment Details
     * @apiName Get Appointment Details
     * @apiDescription This Api will help the user to get the details of Appointment
     * @apiParam {int} appointment_id id of the appointment
     * @apiUse ValidationException
     * @apiUse InvalidAccountProvided
     * @apiUse AppointmentAvailable
     * @apiUse NoAppointmentAvailable
     * @param \OBS\Http\Requests\Users\GADRequest $request
     * @return \Illuminate\Http\Response
     */
    public function getAppointmentDetail(GADRequest $request);

    /**
     * @apiVersion 1.0.1
     * @apiHeader {String} Accept=application/json Content-Types that are acceptable for the response
     * @apiHeader {String} X-CSRF-TOKEN The CSRF that has been received in <code>system/get-x-csrf</code> Api
     * @apiHeader {String} Authorization Authorization header will hold the system generated token, that
     * was generated in <code>users/register</code> Api call. e.g. <code>Authorization: Bearer y04Njk3LTA0MjYzIi</code>
     * @apiGroup 3. Appointments
     * @api {get} api/get-all-appointments Appointments throughout pregnancy
     * @apiName Get All Appointment
     * @apiDescription This Api will help to get the all the user planned appointments throughout the pregnancy time
     * @apiUse InvalidAccountProvided
     * @apiUse WeeklyAppointments
     * @apiUse NoAppointmentAvailable
     * @param \OBS\Http\Requests\Users\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getWeeklyAppointments(Request $request);

    /**
     * @apiVersion 1.0.1
     * @apiHeader {String} Accept=application/json Content-Types that are acceptable for the response
     * @apiHeader {String} X-CSRF-TOKEN The CSRF that has been received in <code>system/get-x-csrf</code> Api
     * @apiHeader {String} Authorization Authorization header will hold the system generated token, that
     * was generated in <code>users/register</code> Api call. e.g. <code>Authorization: Bearer y04Njk3LTA0MjYzIi</code>
     * @apiGroup 3. Appointments
     * @api {get} api/check-status Check Lab, hospital And GP status
     * @apiName Get User Lab Hospital and Gp status
     * @apiDescription This Api will help to get the User Hospital, lab and Gp status
     * @apiUse GetUserDoctorHospitalLabStatus
     * @param \OBS\Http\Requests\Users\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getStatus(Request $request);

    /**
     * @apiVersion 1.0.1
     * @apiHeader {String} Accept=application/json Content-Types that are acceptable for the response
     * @apiHeader {String} X-CSRF-TOKEN The CSRF that has been received in <code>system/get-x-csrf</code> Api
     * @apiHeader {String} Authorization Authorization header will hold the system generated token, that
     * was generated in <code>users/register</code> Api call. e.g. <code>Authorization: Bearer y04Njk3LTA0MjYzIi</code>
     * @apiGroup 5. FAQs
     * @api {get} api/get-faqs Faqs
     * @apiName FAQs
     * @apiDescription This Api will help to get list of FAQs
     * @apiUse ListOfFaqQuestions
     * @apiUse DoctorAndHospitalNotSelected
     * @param \OBS\Http\Requests\Users\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getAllFaqs(Request $request);

    /**
     * @apiVersion 1.0.1
     * @apiHeader {String} Accept=application/json Content-Types that are acceptable for the response
     * @apiHeader {String} X-CSRF-TOKEN The CSRF that has been received in <code>system/get-x-csrf</code> Api
     * @apiHeader {String} Authorization Authorization header will hold the system generated token, that
     * was generated in <code>users/register</code> Api call. e.g. <code>Authorization: Bearer y04Njk3LTA0MjYzIi</code>
     * @apiGroup 6. Tools and Settings
     * @api {post} api/save-contact Save Emergency Contacts
     * @apiName Save Emergency Contacts
     * @apiDescription This api will help to save the emergency contacts
     * @apiParam {string} title title of the contact
     * @apiParam {string} contact_number phone number of the contact
     * @apiUse ContactSaved
     * @param \OBS\Http\Requests\Users\SCRequest $request
     * @return \Illuminate\Http\Response
     */
    public function saveContact(SCRequest $request);

    /**
     * @apiVersion 1.0.1
     * @apiHeader {String} Accept=application/json Content-Types that are acceptable for the response
     * @apiHeader {String} X-CSRF-TOKEN The CSRF that has been received in <code>system/get-x-csrf</code> Api
     * @apiHeader {String} Authorization Authorization header will hold the system generated token, that
     * was generated in <code>users/register</code> Api call. e.g. <code>Authorization: Bearer y04Njk3LTA0MjYzIi</code>
     * @apiGroup 6. Tools and Settings
     * @api {post} api/contact-list Listing Emergency Contacts
     * @apiName Get all emergency contacts
     * @apiDescription This api will help to get the list of all emergency contacts
     * @apiUse ContactList
     * @param \OBS\Http\Requests\Users\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getContactList(Request $request);

    /**
     * @apiVersion 1.0.1
     * @apiHeader {String} Accept=application/json Content-Types that are acceptable for the response
     * @apiHeader {String} X-CSRF-TOKEN The CSRF that has been received in <code>system/get-x-csrf</code> Api
     * @apiHeader {String} Authorization Authorization header will hold the system generated token, that
     * was generated in <code>users/register</code> Api call. e.g. <code>Authorization: Bearer y04Njk3LTA0MjYzIi</code>
     * @apiGroup 3. Appointments
     * @api {post} api/update-appointment-status Update an appointment status
     * @apiName Update Appointment Status
     * @apiDescription This api will help to update the appointment status.
     * @apiParam {Integer} appointment-id Appointment ID
     * @apiParam {Integer} status Status of the appointment, i.e <code> 0 </code> or <code> 1 </code>
     * @apiUse AppointmentUpdated
     * @param \OBS\Http\Requests\Users\Request $request
     * @return \Illuminate\Http\Response
     */
    public function updateAppointmentStatus(UASRequest $request);

    /**
     * @apiVersion 1.0.1
     * @apiHeader {String} Accept=application/json Content-Types that are acceptable for the response
     * @apiHeader {String} X-CSRF-TOKEN The CSRF that has been received in <code>system/get-x-csrf</code> Api
     * @apiGroup 3. Appointments
     * @api {get} api/get-checklist-items Get checklist item
     * @apiName Get Checklist items
     * @apiDescription This api will list the checklist items.
     * @apiUse GetChecklist
     * @param \OBS\Http\Requests\Users\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getChecklist(UASRequest $request);

    /**
     * @apiVersion 1.0.1
     * @apiHeader {String} Accept=application/json Content-Types that are acceptable for the response
     * @apiHeader {String} X-CSRF-TOKEN The CSRF that has been received in <code>system/get-x-csrf</code> Api
     * @apiHeader {String} Authorization Authorization header will hold the system generated token, that
     * was generated in <code>users/register</code> Api call. e.g. <code>Authorization: Bearer y04Njk3LTA0MjYzIi</code>
     * @apiGroup 3. Appointments
     * @api {post} api/update-checklist-item Update checklist item status
     * @apiName Update Checklist Item Status
     * @apiDescription This api will help to update the checklist item status.
     * @apiParam {Object} checklist-items
     * @apiParam {Integer} status Status of the checklist item, i.e <code> 0 </code> or <code> 1 </code>
     * @apiUse UpdateChecklistItem
     * @param \OBS\Http\Requests\Users\Request $request
     * @return \Illuminate\Http\Response
     */
    public function updateChecklistItem(UASRequest $request);

}