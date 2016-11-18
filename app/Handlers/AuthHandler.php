<?php namespace App\Handler;


class AuthHandler
{
    public function getUserId()
    {
        return auth()->user()->id;
    }

}