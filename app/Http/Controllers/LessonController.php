<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LessonController extends Controller
{
    //
    public function Add()
    {
       return view('cms.manager.lesson.add');
    }

    public function AddSubmit(Request $request)
    {
        $lesson = new Lesson();
        $lesson->title=$request->title;
        $lesson->description=$request->description;
        $lesson->save();
        return back();
    }

    public function View()
    {
        
    }


    public function Editlesson($id)
    {
        $lesson=Lesson::where('id',$id)->get()->first();

        return view('cms.manager.lesson.edit',compact('lesson'));

    }

    public function Editsubmite(Request $request,$id)
    {
        $lesson=Lesson::where('id',$id)->get()->first();
        $lesson->title=$request->title;
        $lesson->description=$request->description;
        $lesson->save();
        return back();

    }

}
