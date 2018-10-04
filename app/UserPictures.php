<?php

namespace OBS;

use Illuminate\Database\Eloquent\Model;

class UserPictures extends Model
{
    //
    protected $table = 'user_pictures';

    /**
     * This attributes defines primary key of the table
     *
     * @var string
     */
    protected $primaryKey = 'user_picture_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id_fk',
        'user_picture_id',
        'original_name',
        'image_path',
        'image_size',
        'mime_type',
        'created_at',
        'deleted_at',
    ];

    protected $guarded = ['user_id_fk'];

    protected $hidden = ['user_picture_id', 'updated_at'];

    protected $casts = [
        'image_size' => 'integer',
        'created_at' => 'timestamp',
        'deleted_at' => 'timestamp',
        'updated_at' => 'timestamp'
    ];

    public function user()
    {
        return $this->belongsTo('OBS\User');
    }
}
