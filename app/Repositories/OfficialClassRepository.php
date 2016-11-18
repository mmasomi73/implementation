<?php namespace App\Repositories;


use App\OfficialClass;

class OfficialClassRepository
{

    public static function count ()
    {
        return OfficialClass::count();
    }

    public static function allClasses()
    {
        return OfficialClass::all();

    }
}