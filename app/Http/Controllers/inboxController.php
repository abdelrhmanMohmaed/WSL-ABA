<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Inbox;
use Session;
use RealRashid\SweetAlert\Facades\Alert;

class inboxController extends Controller
{
    # index
    public function Index()
    {
        $inbox     = Inbox::latest()->paginate(500);
        $not_read  = Inbox::where('is_read',0)->count();
        $read      = Inbox::where('is_read',1)->count();
        $all       = Inbox::count();
        return view('inbox.inbox',compact('inbox','not_read','read','all'));
    }

    # view
    public function View($id)
    {
        $message = Inbox::where('id',$id)->first();
        $message->is_read = 1;
        $message->save();
        return view('inbox.view',compact('message'));
    }

    # delete
    public function Delete(Request $request)
    {
       $message = Inbox::where('id',$request->id)->first();
       MakeReport('بحذف رساله '.$message->title);
       $message->delete();
    }
}
