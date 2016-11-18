<?php

namespace App;

use App\Utilities\PersianDate;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Notification
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Gallery[] $images
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\File[] $files
 * @method static \Illuminate\Database\Query\Builder|\App\Notification notificationBySearch($request)
 * @mixin \Eloquent
 */
class Notification extends Model
{
    //
    public $timestamps =false;
    protected  $table ='notification';
    protected  $fillable=
        [
            'title',
            'text',
            'thumbnail',
            'publish_time'
        ];

    public function images()
    {
        return $this->belongsToMany( Gallery::class, 'gallery_notification',
            'notification_id', 'gallery_id');
    }

    public function files()
    {
        return $this->belongsToMany( File::class, 'notification_file',
            'notification_id', 'file_id');
    }

    public function getPersianDate()
    {

        return PersianDate::jstrftime('%T &nbsp;&nbsp;&nbsp;  %A , %e %B %Y ', $this->publish_time);
    }

    public function scopeNotificationBySearch($query, $request)
    {
        if(count($request->title) > 0)
            $query->where('title','LIKE','%'.$request->title.'%');
        if(count($request->begin_date) > 0)
            $query->whereRdate('publish_time','>',$request->begin_date);
        if(count($request->end_date) > 0)
            $query->whereRdate('publish_time','<',$request->end_date);
        if(trim($request->text) != '')
            $query->where('text','LIKE','%'.$request->text.'%');

        return $query;
    }
}
