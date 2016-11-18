<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Gallery
 *
 * @mixin \Eloquent
 */
class Gallery extends Model
{
    //
    public $timestamps =false;
    protected  $table ='gallery';
    protected  $fillable=
        [
            'src',



        ];
}
