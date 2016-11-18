<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    //
    public function Notify()
    {
       $news=Notification::orderBy('publish_time','desc')->with('images','files') ->get();
        return view ('blog.blog',compact('news'));

    }
}
