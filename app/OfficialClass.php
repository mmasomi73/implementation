<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\OfficialClass
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Schedule[] $baseSchedule
 * @mixin \Eloquent
 */
class OfficialClass extends Model
{
    //
    public $timestamps = false;

    protected $table = 'class';

    protected $fillable =
        [
            'capacity',
            'title'
        ];


    public function baseSchedule ()
    {
       return $this->hasMany(Schedule::class,'class_id','id');
    }

    public function schedule ()
    {
        return $this->baseSchedule();
    }
}
