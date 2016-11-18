<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\DoExersice
 *
 * @mixin \Eloquent
 */
class DoExersice extends Model
{
    //
    public $timestamps =false;
    protected  $table ='do_exercise';
    protected  $fillable=
        [
            'exercise_id',
            'student_id',
            'comment',
            'score',
            'date',



        ];
}
