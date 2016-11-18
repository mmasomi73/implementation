<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ClassMember
 *
 * @mixin \Eloquent
 */
class ClassMember extends Model
{
    //
    public $timestamps =false;
    protected  $table ='class_member';
    protected  $fillable=
        [
            'class_id',
            'student_id',

        ];
}
