<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\File
 *
 * @mixin \Eloquent
 */
class File extends Model
{
    //
    public $timestamps =false;
    protected  $table ='file';
    protected  $fillable=
        [
            'src',
            'date',


        ];
}
