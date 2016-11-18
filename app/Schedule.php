<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Schedule
 *
 * @mixin \Eloquent
 */
class Schedule extends Model
{
    //
    public $timestamps =false;
    protected  $table ='schedule';
    protected  $fillable=
        [
            'lesson_id',
            'class_id',
            'teacher_id',
            'type',


        ];
}
