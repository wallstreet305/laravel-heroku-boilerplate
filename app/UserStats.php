<?php

namespace OBS;

use Illuminate\Database\Eloquent\Model;

class UserStats extends Model
{
    /**
     * This attribute defines table associated with model
     *
     * @var string
     */
    protected $table = 'user_stats';

    /**
     * This attributes defines primary key of the table
     *
     * @var string
     */
    protected $primaryKey = 'user_stat_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id_fk',
        'dob',
        'height',
        'start_weight',
        'first_day_last_period',
        'cycle_length',
        'conceive_date',
        'age',
        'due_date_calc_flag',
        'dob',
        'estimated_due_date'
    ];


    /*
     * User properties that will not be updated via PULL | PATCH request
     *
     * @var array
     */
    protected $guarded = ['user_id_fk'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['user_stat_id', 'updated_at'];

    /**
     * The attributes that will be type-casted to specified types
     *
     * @var array
     */
    protected $casts = [
        'height' => 'double',
        'start_weight' => 'double',
        'first_day_last_period' => 'timestamp',
        'cycle_length' => 'integer',
        'conceive_date' => 'timestamp',
        'estimated_due_date' => 'timestamp',
        'created_at' => 'timestamp',
        'deleted_at' => 'timestamp',
        'updated_at' => 'timestamp'
    ];

    /**
     * The attributes that will be treated as Carbon date object
     *
     * @var array
     */
   // protected $dates = ['first_day_last_period', 'conceive_date'];

    /**
     **********************************************
     * *************** RELATION-SHIPS *************
     * ********************************************
     */
    /**
     * Relation between user and stats
     * Relationship type: one to many
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function user()
    {
        return $this->belongsTo('OBS\User');
    }
}
