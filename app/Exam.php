<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Exam
 *
 * @mixin \Eloquent
 */
class Exam extends Model
{

    public $timestamps =false;
    protected  $table ='exam';
    protected  $fillable=
        [
            'teacher_id',
            'type',
            'description',
            'title',




        ];
}
