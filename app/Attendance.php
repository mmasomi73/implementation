<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Attendance
 *
 * @mixin \Eloquent
 */
class Attendance extends Model
{
    public $timestamps =false;
    protected  $table ='attendance';
    protected  $fillable=
        [
            'student_id',
            'notified',
            'date',


        ];
}
