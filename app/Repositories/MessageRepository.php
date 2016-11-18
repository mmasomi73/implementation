<?php namespace App\Repositories;


use App\Message;

class MessageRepository
{
    public static function additionalClassRequest ()
    {
        $message = Message::where('type', 1)->get();
        $message->load('sender');
        return $message;
    }

    // todo : wiche type to count
    public static function messageCount()
    {
        return Message::where('type' , 0)->count();
    }
}