<?php

namespace OBS;

use Illuminate\Database\Eloquent\Model;

class UserCheckList extends Model
{
    protected $table = 'user_checklist';

    protected $primaryKey = 'user_checklist_id';

    protected $fillable = [
        'checklist_id',
        'user_id',
        'checklist_status'
    ];
}
