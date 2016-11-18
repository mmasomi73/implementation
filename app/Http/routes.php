<?php

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/manager', 'HomeController@index');


//ToDo: implement group Route (^_^)
//-------------------------= begin: Lesson's Routs
Route::get('/manager/lesson/add',['as'=>'AddLesson','uses'=>'LessonController@Add']);
Route::post('/manager/lesson/add',['as'=>'AddLessonSubmit','uses'=>'LessonController@AddSubmit']);
Route::get('/manager/lesson/edit/{id}',['as' => 'editelesson','uses'=>'LessonController@Editlesson']);
Route::post('/manager/lesson/edit/{id}',['as' => 'editelessonsubmite','uses'=>'LessonController@Editsubmite']);
//-------------------------= end  : Lesson's Routs

//-------------------------= begin: Message's Routs
Route::get('/manager/message/inbox',['as'=>'Inbox','uses'=>'MessageController@Inbox']);
Route::post('/manager/message/inbox',['as'=>'InboxSubmit','uses'=>'MessageController@InboxSubmit']);
Route::get('/manager/message/send',['as'=>'Send','uses'=>'MessageController@Send_message']);
Route::post('/manager/message/send',['as'=>'SendSubmit','uses'=>'MessageController@Send_message_Submit']);

//Route::get('/manager/message/inbox',['as'=>'AddLesson','uses'=>'MessageController@Add']);
//-------------------------= end  : Message's Routs

//----------------------begin:notification's Routs
Route::get('/manager/notification/send',['as'=>'SendNotification','uses'=>'MessageController@Send_notify']);
Route::post('/manager/notification/send',['as'=>'SendNotificationSubmit','uses'=>'MessageController@Send_notify_Submit']);
Route::get('/manager/notification/view',['as'=>'ViewNotification','uses'=>'MessageController@View_notify']);
Route::get('/manager/notification/delete/{id}',['as'=>'DeleteNotification','uses'=>'MessageController@Delete_Notification']);
Route::get('/manager/notification/edit/{id}',['as'=>'EditNotification','uses'=>'MessageController@Edit_notify']);
Route::post('/manager/notification/edit/{id}',['as'=>'EditNotificationSubmit','uses'=>'MessageController@Edit_notify_Submit']);

//-------------------------= end  : notification's Routs

//----------------------begin:blog
Route::get('/blog/blog',['as'=>'blog','uses'=>'BlogController@Notify']);
//----------------------end:blog

//-----------------------begin:user
Route::get('/manager/profile',['as'=>'profile','uses'=>'UserController@Edit']);
//-----------------------end:user

//----------------------manage users
Route::get('/manager/user/add',['as'=>'manager_add_user','uses'=>'ManagerController@addUser']);
Route::post('/manager/user/add',['as'=>'manager_add_user_submit','uses'=>'ManagerController@addUserSubmit']);
Route::get('/manager/user/edit/{id}',['as'=>'manager_user_edit','uses'=>'ManagerController@editUser']);
Route::post('/manager/user/edit/{id}',['as'=>'manager_edit_user_submit','uses'=>'ManagerController@editUserSubmit']);


