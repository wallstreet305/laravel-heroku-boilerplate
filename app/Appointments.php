<?php

namespace OBS;

use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'appointments';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'appointment_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'appointment_id',
        'doctor_id',
        'lab_id',
        'hospital_id',
        'patient_id',
        'location',
        'pregnancy_week',
        'appointment_type',
        'appointment_time',
        'notes',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'appointment_time' => 'timestamp',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp'
    ];


}
