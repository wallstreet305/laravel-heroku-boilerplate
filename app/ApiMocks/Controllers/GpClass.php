<?php

namespace OBS\ApiMocks\Controllers;

use OBS\ApiMocks\BaseSkeleton;
use Illuminate\Http\Request;
use OBS\Http\Requests\Gps\GPSRequest;

interface GpClass extends BaseSkeleton
{
    /**
     * @apiVersion 1.0.1
     * @apiHeader {String} Accept=application/json Content-Types that are acceptable for the response
     * @apiHeader {String} X-CSRF-TOKEN The CSRF that has been received in <code>system/get-x-csrf</code> Api
     * @apiHeader {String} Authorization Authorization header will hold the system generated token, that
     * was generated in <code>users/register</code> Api call. e.g. <code>Authorization: Bearer y04Njk3LTA0MjYzIi</code>
     * @apiGroup 4. GP
     * @api {get} api/get-gps-hospitals-labs-list Get GpHospitalLab list
     * @apiName Get Gps List
     * @apiDescription This Api will help user to get the list of all the near by GPs, Hospital and Lab list
     * @apiUse ValidationException
     * @apiUse InvalidAccountProvided
     * @apiUse GetGpHospitalLabList
     * @param \OBS\Http\Requests\Users\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getGpsHospitalLabList(Request $request);
    /**
     * @apiVersion 1.0.1
     * @apiHeader {String} Accept=application/json Content-Types that are acceptable for the response
     * @apiHeader {String} X-CSRF-TOKEN The CSRF that has been received in <code>system/get-x-csrf</code> Api
     * @apiHeader {String} Authorization Authorization header will hold the system generated token, that
     * was generated in <code>users/register</code> Api call. e.g. <code>Authorization: Bearer y04Njk3LTA0MjYzIi</code>
     * @apiGroup 4. GP
     * @api {post} api/select-gp-hospital-lab Select GP, Hospital, Lab
     * @apiName Select GP/ Hospital/ Lab
     * @apiDescription This Api will help user to assign a gp, hospital or lab against logged in user
     * @apiParam {int} selected_id This is the id of the Either Hospital ,Gp OR Lab
     * @apiParam {int} type This will define the user selection either Gp, Hospital Or Lab (1 = hospital, 2 = lab, 3 = gp)
     * @apiUse ValidationException
     * @apiUse InvalidAccountProvided
     * @apiUse SelectedSuccessfully
     * @param \OBS\Http\Requests\Users\GPSRequest $request
     * @return \Illuminate\Http\Response
     */
    public function selectUserGpHospitalLab(GPSRequest $request);
}