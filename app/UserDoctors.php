<?php

namespace OBS;

use Illuminate\Database\Eloquent\Model;

class UserDoctors extends Model
{
    //

    protected $table = 'user_doctors';
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'user_doctor_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_doctor_id',
        'doctor_id_fk',
        'hospital_id_fk',
        'lab_id_fk',
        'user_id_fk',
        'deleted_at',
        'created_at'
    ];

    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp'
    ];

    public function getDoctorId($userId) {

        $doctor = UserDoctors::where('user_id_fk', $userId)
                        ->first();
        if(!empty($doctor) && $doctor->count() > 0) {
            return $doctor->doctor_id_fk;
        }
        return false;
    }
    public function getUserStatus($userId) {

        $user_status = UserDoctors::where('user_id_fk', $userId)
            ->first();
        if(!empty($user_status) && $user_status->count() > 0) {
            return $user_status;
        }
        return false;
    }
}
