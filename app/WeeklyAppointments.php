<?php

namespace OBS;

use Illuminate\Database\Eloquent\Model;

class WeeklyAppointments extends Model
{
    /*
     * Table associated with model
     */

    protected $table = 'weekly_appointments';

    /**
     * Primary key for the table
     */

    protected $primary_key = 'weekly_appointment_id';

    /*
     * Following attributes are mass assingable
     */

    public function getWeeklyAppointmentsData($week_no, $appointment_type) {

        $weekly_appointment = WeeklyAppointments::where('week_no', $week_no)
                                ->where('appointment_type', $appointment_type)
                                ->get();

        return $weekly_appointment;
    }

    public function getAppointmentOverview($week_no, $appointment_type) {
        $weekly_appointment = WeeklyAppointments::where('week_no','>=', $week_no)
            ->where('appointment_type', $appointment_type)
            ->orderBy('weekly_appointment_id', 'asc')
            ->limit(1)
            ->first();
        return $weekly_appointment;
    }
}
