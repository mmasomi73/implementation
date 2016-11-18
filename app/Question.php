<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Question
 *
 * @mixin \Eloquent
 */
class Question extends Model
{
    //
    public $timestamps =false;
    protected  $table ='question';
    protected  $fillable=
        [
            'exam_id',
            'question',
            'item_1',
            'item_2',
            'item_3',
            'item_4',
            'answer',


        ];
}
