<?php

namespace OBS;

use Illuminate\Database\Eloquent\Model;

class Labs extends Model
{
    //
    /**
     * The table associated to model.
     *
     * @var string
     */
    protected $table = 'labs';
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'lab_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lab_id',
        'area',
        'suburb',
        'location',
        'timings',
        'phone',
        'lat',
        'lng',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp'
    ];

    public function getLabDetailById($lab_id) {
        $lab = Labs::where('lab_id', $lab_id)->get();

        return $lab;
    }

    public function getLabDetail($lab_id) {
        $lab = Labs::where('lab_id', $lab_id)->first();
        return $lab;
    }

}
