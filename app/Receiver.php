<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Receiver
 *
 * @mixin \Eloquent
 */
class Receiver extends Model
{
    //
    public $timestamps =false;
    protected  $table ='receiver';
    protected  $fillable=
        [
            'user_id',
            'message_id',
            'visited',


        ];
}
