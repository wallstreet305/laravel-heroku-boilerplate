<?php

namespace OBS;

use Illuminate\Database\Eloquent\Model;

class FaqCategories extends Model
{
    //
    /**
     * The table associated to model.
     *
     * @var string
     */
    protected $table = 'faq_categories';
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'category_id';


    protected $hidden = ['category_id'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'category_name',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp'
    ];
}
