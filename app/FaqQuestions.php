<?php

namespace OBS;

use Illuminate\Database\Eloquent\Model;

class FaqQuestions extends Model
{
    //
    /**
     * The table associated to model.
     *
     * @var string
     */
    protected $table = 'faq_questions';
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'question_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question_id',
        'category_id_fk',
        'question_text',
        'answer_text',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp'
    ];
}
