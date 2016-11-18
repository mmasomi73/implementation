<?php namespace App\Http\Controllers;

use App\Repositories\NotificationRepository;
use App\Repositories\OfficialClassRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\ScheduleRepository;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;


class ManagerController extends Controller
{
    public function index()
    {
        $populationInfo['studentCount'] = UserRepository::count('student');
        $populationInfo['teacherCount'] = UserRepository::count('teacher');
        $populationInfo['officialClassCount'] = OfficialClassRepository::count();
        $lastNotifications = NotificationRepository::getLastNotifications();
        $paymentSum = PaymentRepository::sum();
        $schedules = ScheduleRepository::todaySchedule();
        $classes = OfficialClassRepository::allClasses();


        return view('cms.manager.index', compact('populationInfo', 'paymentSum', 'lastNotifications', 'classes', 'schedules'));
    }
    public function addUser()
    {
        return view('cms.manager.users.add_user');
    }
    public function addUserSubmit(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->family = $request->family;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->mobile = $request->mobile;
        $user->national_code = $request->national_code;
        $user->postal_code = $request->postal_code;
        $user->address = $request->address;
        $user->save();
        return back();
    }
    public function editUser($id)
    {
        $user = User::where('id', $id)->get()->first();
        return view('cms.manager.users.edit_user', compact('user'));

    }
    public function editUserSubmit(Request $request, $id)
    {
        $user = User::where('id', $id)->get()->first();
        if (!empty($user)) {
            $user->name = $request->name;
            $user->family = $request->family;
            $user->email = $request->email;
            if ($request->password != '')
                $user->password = $request->password;
            $user->mobile = $request->mobile;
            $user->national_code = $request->national_code;
            $user->postal_code = $request->postal_code;
            $user->address = $request->address;
            $user->save();
        }
        return back();
    }
}
