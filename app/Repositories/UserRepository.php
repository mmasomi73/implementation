<?php namespace App\Repositories;

use App\User;
use Illuminate\Support\Facades\DB;

class UserRepository
{

    public static function allUser ()
    {

        return User::all();
    }

    public static function count ($role = 'student')
    {

        return User::where('role_id',env($role,0))->count();
    }

    public static function todayBirthdays()
    {
        return User::select('name','family','birth_date')->where('role_id',env('student'))->where(DB::raw('DAYOFYEAR(date(birth_date))+1'),DB::raw('DAYOFYEAR(curdate())'))->get();
    }


}