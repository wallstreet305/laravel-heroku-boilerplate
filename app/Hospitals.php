<?php

namespace OBS;

use Illuminate\Database\Eloquent\Model;

class Hospitals extends Model
{
    //
    //
    /**
     * The table associated to model.
     *
     * @var string
     */
    protected $table = 'hospitals';
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'hospital_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hospital_id',
        'dhs_id',
        'name',
        'address',
        'suburb',
        'postcode',
        'phone',
        'subtype',
        'lat',
        'lng',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp'
    ];

    public function getHospitalDetailById($hospital_id) {
        $hospital = Hospitals::where('hospital_id', $hospital_id)->get();

        return $hospital;
    }
    public function getHospitalDetail($hospital_id) {
        $hospital = Hospitals::where('hospital_id', $hospital_id)->first();

        return $hospital;
    }
}
