<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Massage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use View;
use Session;
use Image;
use File;

class chatController extends Controller
{

    public function __construct()
    {
        View::share([
            'users'=> User::get(),
            
        ]);
    }
    public function index()
    {
        $chats = Chat::where([['tow_id', auth()->user()->id]])->orWhere([['one_id', auth()->user()->id]])->with('Massages','towUser','oneUser')->latest()->get();
    	return view('chats.chat',compact('chats'));
    }



    # add City
    public function send(Request $request, $id,$message)
    {
        $Chat = Chat::where([['one_id', $id], ['tow_id', auth()->user()->id]])->orWhere([['one_id', auth()->user()->id], ['tow_id', $id]])->first();

        if($Chat){
            $data = new Massage;
            $data->message = $message;
            $data->send_id = auth()->user()->id;
            $data->to_id = $id;
            $data->chat_id = $Chat->id;

       
            $data->save();
        }else{

            $Chat = new Chat;
            $Chat->one_id = auth()->user()->id;
            $Chat->tow_id = $id;
            $Chat->save();


            $data = new Massage;
            $data->message = $message;
            $data->send_id = auth()->user()->id;
            $data->to_id = $id;
            $data->chat_id = $Chat->id;

            $data->save();
            
        }

        $datas = Massage::where('id',$data->id)->with('senduser')->latest()->first();


        return $datas;
    }


    # get
    public function getmessage(Request $request, $id)
    {
        $Chat = Chat::where([['one_id', $id], ['tow_id', auth()->user()->id]])->orWhere([['one_id', auth()->user()->id], ['tow_id', $id]])->first();

        if($Chat){
            $datas = Massage::where('chat_id',$Chat->id)->with('senduser')->take(200)->get();

        }else{
            $datas = [];
          
        }



        return $datas;
    }

    
}
