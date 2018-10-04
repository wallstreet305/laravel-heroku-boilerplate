<?php

namespace OBS;

use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    /**
     * The table associated to model.
     *
     * @var string
     */
    protected $table = 'doctors';
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'doctor_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'doctor_id',
        'first_name',
        'last_name',
        'title',
        'qualifications',
        'gender',
        'languages',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp'
    ];

    public function getDoctorDetail($doctor_id)
    {
        $doctor = Doctors::where('doctor_id', $doctor_id)->first();
        return $doctor;
    }

}