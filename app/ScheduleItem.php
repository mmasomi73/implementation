<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ScheduleItem
 *
 * @mixin \Eloquent
 */
class ScheduleItem extends Model
{
    //
    public $timestamps =false;
    protected  $table ='schedule_item';
    protected  $fillable=
        [
            'part',
            'date',
            'schedule_id',


        ];
}
