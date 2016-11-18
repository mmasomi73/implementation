<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Lesson
 *
 * @mixin \Eloquent
 */
class Lesson extends Model
{
    //
    public $timestamps =false;
    protected  $table ='lesson';
    protected  $fillable=
        [
            'title',
            'description'



        ];
}
