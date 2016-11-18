<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\TakeExam
 *
 * @mixin \Eloquent
 */
class TakeExam extends Model
{
    //
    public $timestamps =false;
    protected  $table ='take_exam';
    protected  $fillable=
        [
            'exam_date_id',
            'question_id',
            'selected_item',
            'date',


        ];
}
