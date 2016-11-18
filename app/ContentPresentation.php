<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ContentPresentation
 *
 * @mixin \Eloquent
 */
class ContentPresentation extends Model
{
    //
    public $timestamps =false;
    protected  $table ='content_presentation';
    protected  $fillable=
        [
            'class_content_id',
            'date',
            'schedule_id',


        ];
}
