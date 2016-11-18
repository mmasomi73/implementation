<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ExamDate
 *
 * @mixin \Eloquent
 */
class ExamDate extends Model
{
    //
    public $timestamps =false;
    protected  $table ='exam_date';
    protected  $fillable=
        [
            'schedule_id',
            'exam_id',
            'description',
            'type',
            'status',
            'exam_date',


        ];
}
