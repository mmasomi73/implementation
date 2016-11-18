<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\VoluntaryExamList
 *
 * @mixin \Eloquent
 */
class VoluntaryExamList extends Model
{
    //
    public $timestamps =false;
    protected  $table ='voluntary_exam_list';
    protected  $fillable=
        [
            'exam_id',
            'student_id',
            'date',


        ];
}
