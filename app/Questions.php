<?php

namespace OBS;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Question\Question;

class Questions extends Model
{
    /*
     * Table associated with model
     */

    protected $table = 'questions';

    /**
     *
     */

    protected $primary_key = 'question_id';

    public function getQuestionsForAppointment($week_no) {
        $questionForWeek = Questions::where('week_no', $week_no)->get();

        return $questionForWeek;
    }
}
