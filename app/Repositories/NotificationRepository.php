<?php namespace App\Repositories;


use App\Notification;

class NotificationRepository
{
    /**
     *
     * @param string $key , values : id - date
     * @param int $number
     *
     */
    public static function getLastNotifications ($key = 'id', $number = 10)
    {

        return Notification::orderBy($key, 'desc')->take($number)->get();

    }

}