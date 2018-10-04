<?php

namespace OBS;

use Illuminate\Database\Eloquent\Model;

class DoctorSchedules extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'doctor_schedules';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'schedule_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'schedule_id',
        'doctor_id',
        'location',
        'latitude',
        'longitude',
        'phone_no',
        'time',
        'postal_code'
    ];

    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp'
    ];

    public function getDoctorSchedules($doctor_id) {

        $doctor_schedule = DoctorSchedules::where('doctor_id', $doctor_id)->get();
        return $doctor_schedule;
    }
}
