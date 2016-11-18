<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Score
 *
 * @mixin \Eloquent
 */
class Score extends Model
{
    //
    public $timestamps =false;
    protected  $table ='score';
    protected  $fillable=
        [
            'user_id',
            'score',
            'schedule_id',
            'type',
            'date',


        ];
}
