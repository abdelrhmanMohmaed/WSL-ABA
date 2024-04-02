<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use View;
use Session;
use Image;
use File;
class CitiesController extends Controller
{

    public function __construct()
    {
        View::share([
            'countries'=> Country::get(),
        ]);
    }
    public function index()
    {
        $cities = City::with('Country')->latest()->get();
    	return view('cities.cities',compact('cities'));
    }



    # add City
    public function Store(Request $request)
    {
        $this->validate($request,[
            'name'   => 'required',
        ]);

        $data = new City;
        $data->name = $request->name;
        $data->country_id = $request->country_id;
        $data->save();

        MakeReport('بإضافة محافظة جديد '.$data->name);
        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }

    # update section
    public function Update(Request $request)
    {
        $this->validate($request,[
            'edit_name'   => 'required',
        ]);

        $data = City::where('id',$request->edit_id)->first();
        $data->name = $request->edit_name;
        $data->country_id = $request->edit_country_id;
        $data->save();
        MakeReport('بتحديث محافظة  '.$data->name);
        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    } 
 
    # delete
    public function Delete($id)
    {
        $data = City::where('id',$id)->first();
        MakeReport('بحذف  محافظة '.$data->name);
        $data->delete();
        Alert::success('عملية ناجحة','تم الحذف');
        return back();
    }
}
