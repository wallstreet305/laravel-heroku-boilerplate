<?php

namespace OBS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmergencyContacts extends Model
{
    //
    use SoftDeletes;


    protected $table = 'emergency_contacts';


    protected $dates = ['deleted_at'];


    protected $fillable = [
        'title',
        'phone_number',
        'user_id_fk',
        'type'
    ];

    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp'
    ];

}
