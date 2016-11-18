<?php

namespace App\Http\Controllers;

use App\File;
use App\Utilities\PersianDate;
use File as SystemFile;
use App\FileManager\FileManager;
use App\Gallery;
use App\Notification;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Requests\SendNewsRequest;
use Illuminate\Http\Request;


class MessageController extends Controller
{
    //
    public function Inbox ()
    {
        return view('cms.message.inbox');
    }
    public function Send_message()
    {
        return view('cms.message.send');
    }
    public function Send_notify()
    {

        return view('cms.manager.notification.send');

    }
    public function Send_notify_Submit(SendNewsRequest $request)
    {
        $notify = new Notification();
        $notify->title = $request->title;
        $notify->text = $request->text;
        $notify->publish_time = Carbon::now();
        $notify->save();
        $thumbnail  = $request->thumbnail;

//        unset($request['thumbnail']);

        //TODO: COMPLETE UPLOADING
        //-----------------------= Uploading Section
        $subDirectory = Carbon::now()->year . '/' . Carbon::now()->month;
        $mainFileName = $notify->id . '_thumbnail.' . $thumbnail->getClientOriginalExtension();

        $thumbnailAddress = FileManager::uploadNewsImage($thumbnail, $subDirectory, $mainFileName);
        $notify->thumbnail = $thumbnailAddress;
        $notify->save();
        //------------------------------=Checking Gallery
        if($request->hasFile('gallery'))
        {

            $gallery = $request->file('gallery');
//            unset($request['gallery']);

            $notify_gallery = array();
            foreach ( $gallery as $key => $value ) {
                $images = new Gallery();
//                var_dump($value);

                $imageFileName = $notify->id . '_' . (time()) . '.' . $value->getClientOriginalExtension();
                $imageGalleyAddress = FileManager::uploadNewsImage($value, $subDirectory, $imageFileName);
                $images->src = $imageGalleyAddress;
                $images->save();
                $notify_gallery [] = $images->id;
            }
            $notify->images()->attach($notify_gallery);
            $notify->save();
        }
        //------------------------------=Checking File
        if($request->hasFile('file'))
        {

            $files = $request->file('file');
//            unset($request['file']);
            $notify_file = array();
            foreach ( $files as $key => $value ) {
                $file = new File();
                $FileName = $notify->id . '_' . (time()) . '.' . $value->getClientOriginalExtension();
                $fileAddress = FileManager::uploadNewsImage($value, $subDirectory, $FileName);
                $file->src = $fileAddress;
                $file->save();

                $notify_file [] = $file->id;
            }

            $notify->files()->attach($notify_file);
            $notify->save();


            //TODO: COMPLETE UPLOADING
        }

        return redirect('/manager/notification/view');


    }
    //-------------------------Image Notify Test
    public function View_notify(Request $request)
    {

        if($request->has('begin_time'))
        {
            $Jalali_date = explode('/', $request->begin_time);
            $p = new PersianDate();
            $date = $p->jalali_to_gregorian($Jalali_date[2],$Jalali_date[1],$Jalali_date[0]);
//            return $date[0];
            $request->begin_time = Carbon::create($date[0], $date[1], $date[2]);
        }
        if($request->has('end_time'))
        {
            $Jalali_date = explode('/', $request->end_time);
            $p = new PersianDate();
            $date = $p->jalali_to_gregorian($Jalali_date[2],$Jalali_date[1],$Jalali_date[0]);
            $request->begin_time = Carbon::create($date[0], $date[1], $date[2]);
        }

        $notifications = Notification::NotificationBySearch($request)->orderBy('publish_time','desc')->get();

        return view('cms.manager.notification.view',compact('notifications'));
    }
    public function Delete_Notification($id)
    {
        $notification = Notification::where('id',$id)->get()->first();
        if(!empty($notification)){
            $images = $notification->images()->pluck('src');
            $files = $notification->files()->pluck('src');
            foreach($files as $file)
                SystemFile::delete($file);
            foreach($images as $file)
                SystemFile::delete($file);
            $notification->images()->detach();
            $notification->files()->detach();
            $notification->delete();
            session()->flash('msg', 'خبر به درستی حذف گردید!');
            session()->flash('msg_type', 'warning');



        }
        return redirect(route('ViewNotification'));
    }
    //----------------------For Edit News
    public function Edit_notify($id )
    {
        $notify=Notification::where('id',$id)->get()->first();
        return view('cms.manager.notification.edit',compact('notify'));
    }
    public function Edit_notify_Submit(Request $request,$id)
    {
        $notify=Notification::where('id',$id)->get()->first();
        $notify->title=$request->title;
        $notify->text=$request->text;
        $notify->publish_time=$request->publish_time;
        if($request->hasFile('thumbnail'))
        {
            $thumbnail  = $request->file('thumbnail');

            $subDirectory = Carbon::now()->year . '/' . Carbon::now()->month;
            $mainFileName = $notify->id . '_thumbnail.' . $thumbnail->getClientOriginalExtension();
            $thumbnailAddress = FileManager::uploadNewsImage($thumbnail, $subDirectory, $mainFileName);
            $notify->thumbnail = $thumbnailAddress;

        }
        if($request->hasFile('gallery'))
        {

            $gallery = $request->file('gallery');
//            unset($request['gallery']);

            $notify_gallery = array();
            foreach ( $gallery as $key => $value ) {
                $images = new Gallery();
//                var_dump($value);

                $imageFileName = $notify->id . '_' . (time()) . '.' . $value->getClientOriginalExtension();
                $imageGalleyAddress = FileManager::uploadNewsImage($value, $subDirectory, $imageFileName);
                $images->src = $imageGalleyAddress;
                $images->save();
                $notify_gallery [] = $images->id;
            }
            $notify->images()->attach($notify_gallery);
            $notify->save();
        }
        //------------------------------=Checking File
        if($request->hasFile('file'))
        {

            $files = $request->file('file');
//            unset($request['file']);
            $notify_file = array();
            foreach ( $files as $key => $value ) {
                $file = new File();
                $FileName = $notify->id . '_' . (time()) . '.' . $value->getClientOriginalExtension();
                $fileAddress = FileManager::uploadNewsImage($value, $subDirectory, $FileName);
                $file->src = $fileAddress;
                $file->save();

                $notify_file [] = $file->id;
            }

            $notify->files()->attach($notify_file);
            $notify->save();


            //TODO: COMPLETE UPLOADING
        }

        $notify->save();
        session()->flash('msg', 'خبر ویرایش گردید.');
        session()->flash('msg_type', 'success');
        return  redirect(route('ViewNotification'));
    }

}
