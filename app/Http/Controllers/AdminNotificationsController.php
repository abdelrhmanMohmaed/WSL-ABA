<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin_Notification;
use RealRashid\SweetAlert\Facades\Alert;
use Session;

class AdminNotificationsController extends Controller
{
    # index
    public function Index()
    {
        $data      = Admin_Notification::latest()->paginate(100);
        $not_read  = Admin_Notification::where('seen','0')->count();
        $read      = Admin_Notification::where('seen','1')->count();
        $all       = Admin_Notification::count();
        
        foreach($data as $noti)
        {
            $noti->seen = '1';
            $noti->save();
        }

        return view('notifications.notifications',compact('data','not_read','read','all'));
    }

    # delete
    public function DeleteAll(Request $request)
    {
       $message = Admin_Notification::where('id','!=',null)->delete();
       MakeReport('بحذف جميع الإشعارات ');
       Alert::success('success','تم الحذف');
       return redirect()->route('notifications');
    }
}
