<?php

namespace OBS;

use Illuminate\Database\Eloquent\Model;

class CheckList extends Model
{
    protected $table = 'checklist';

    protected $primaryKey = 'checklist_id';

    protected $fillable = [
      'title'
    ];

}
