<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ClassContent
 *
 * @mixin \Eloquent
 */
class ClassContent extends Model
{
    //
    public $timestamps =false;
    protected  $table ='class_content';
    protected  $fillable=
        [
            'subject',
            'message',
            'num_visited',


        ];
}
