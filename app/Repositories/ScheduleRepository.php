<?php
/**
 * Created by PhpStorm.
 * User: Joker
 * Date: 11/5/2016
 * Time: 11:09 AM
 */

namespace App\Repositories;


use App\Schedule;

class ScheduleRepository
{
    public static function todaySchedule ()
    {
        $schedules = Schedule::TodaySchedule()->orderBy('class_id','asc')->orderBy('part','asc')->get();
        $schedules->load('teacher','lesson');
        return $schedules;
    }

}