<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\AdditionalClass
 *
 * @mixin \Eloquent
 */
class AdditionalClass extends Model
{
    public $timestamps =false;
    protected  $table ='additional_class';
    protected  $fillable=
        [
            'capacity',
            'title',
            'description',
            'price'

        ];
}
