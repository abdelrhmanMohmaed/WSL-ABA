<?php

namespace App\Http\Controllers;
use App\Models\Section;
use App\Models\Customer;
use App\Models\User;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

use Carbon\Carbon;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $Customers = Customer::count();
       
        $users = Customer::latest()->take(8)->get();
      

        return view('home.home',compact('Customers','users'));
    }

    # add City
    public function color(Request $request)
    {
       

        $user = User::where('id',Auth::user()->id)->first();
        $user->sidebar_background = $request->color_sidebar;
        $user->sidebar_icon       = $request->color_sidebar_icon;
        $user->sidebar_active     = $request->color_sidebar_active;
        $user->background_color   = $request->background_color;
        $user->nav_color          = $request->nav_color;
        $user->header_color       = $request->header_color;
        $user->save();

        MakeReport('تم تحديث ألوان مستخدم'.$user->name);
        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }
}
