<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\AdditionalScheduleItem
 *
 * @mixin \Eloquent
 */
class AdditionalScheduleItem extends Model
{
    //
    public $timestamps =false;
    protected  $table ='additional_schedule_item';
    protected  $fillable=
        [
            'begin_time',
            'end_time',
            'schedule_item',


        ];
}
