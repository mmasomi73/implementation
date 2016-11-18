<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Payment
 *
 * @mixin \Eloquent
 */
class Payment extends Model
{
    //
    public $timestamps =false;
    protected  $table ='payment';
    protected  $fillable=
        [
            'user_id',
            'price',
            'type',
            'date',


        ];
}
