<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Teacher
 *
 * @mixin \Eloquent
 */
class Teacher extends Model
{
    //
    public $timestamps =false;
    protected  $table ='teacher';
    protected  $fillable=
        [
            'resume',
            'description',


        ];
}
