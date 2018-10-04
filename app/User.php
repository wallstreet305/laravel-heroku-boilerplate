<?php

namespace OBS;


use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * OBS\User
 *
 * @mixin \Eloquent
 */
class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * This attribute defines table associated with model
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * This attributes defines primary key of the table
     *
     * @var string
     */
    protected $primaryKey = 'user_id';

    const USER_STATUS_INACTIVE = 0;
    const USER_STATUS_ACTIVE = 1;


    public $user_status = [
        self::USER_STATUS_ACTIVE => 'active',
        self::USER_STATUS_INACTIVE => 'in-active'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name',
        'email',
        'password',
        'phone',
        'gplus_reference',
        'facebook_reference',
        'device_token',
        'location',             // string | user may enter custom address as well
        'latitude',                  // user location latitude
        'longitude',                 // user location longitude
        'uuid',                 // user device uuid for unique identification
        'timezone',
        'image_path',
        'status',
        'last_seen',
        'remember_token',
        'remember_token_created_time',
        'forgot_password_request'
    ];


    /*
     * User properties that will not be updated via PULL | PATCH request
     *
     * @var array
     */
    protected $guarded = ['email'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'remember_token_created_time',
        'last_seen',
        'updated_at',
        'user_stats',
    ];

    /**
     * The attributes that will be type-casted to specified types
     *
     * @var array
     */
    protected $casts = [
        'latitude' => 'double',
        'longitude' => 'double',
        'uuid' => 'integer',
        'status' => 'boolean',
        'last_seen' => 'timestamp',
        'created_at' => 'timestamp',
        'deleted_at' => 'timestamp',
        'updated_at' => 'timestamp'
    ];

    /**
     * The attributes that will be treated as Carbon date object
     *
     * @var array
     */
    protected $dates = ['last_seen'];


    /**
     **********************************************
     * ***** MUTATORS | ACCESS-MODIFIERS **********
     * ********************************************
     */
    /**
     * This method defines returned value of user status
     * @param $status
     * @return mixed
     */
    public function getStatusAttribute($status)
    {
        return $this->user_status[$status];
    }

    /**
     **********************************************
     * *************** RELATION-SHIPS *************
     * ********************************************
     */
    /**
     * Relation between user and its status
     * Relationship type: one to Many
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function user_stats()
    {
        return $this->hasMany('OBS\UserStats','user_id_fk','user_id');
    }

    public function user_pictures()
    {
        return $this->hasMany('OBS\UserPictures','user_id_fk','user_id');
    }
}
