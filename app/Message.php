<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Message
 *
 * @mixin \Eloquent
 */
class Message extends Model
{
    //
    public $timestamps =false;
    protected  $table ='message';
    protected  $fillable=
        [
            'sender_id',
            'subject',
            'text',
            'date',


        ];
}
