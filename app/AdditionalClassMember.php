<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\AdditionalClassMember
 *
 * @mixin \Eloquent
 */
class AdditionalClassMember extends Model
{
    public $timestamps =false;
    protected  $table ='additional_class_member';
    protected  $fillable =
        [
            'additional_class_id',
            'student_id',
            'payment_id',
            'verified'
        ];
}
