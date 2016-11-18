<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Exercise
 *
 * @mixin \Eloquent
 */
class Exercise extends Model
{
    //
    public $timestamps =false;
    protected  $table ='exercise';
    protected  $fillable=
        [
            'begin_time',
            'end_time',
            'schedule_id',
            'num_visited',



        ];
}
