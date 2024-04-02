<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Session;
use Image;
use File;
class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::latest()->get();
    	return view('countries.countries',compact('countries'));
    }



    # add Country
    public function Store(Request $request)
    {
        $this->validate($request,[
            'name'   => 'required',
        ]);

        $data = new Country;
        $data->name = $request->name;
        $data->save();

        MakeReport('بإضافة دولة جديد '.$data->name);
        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }

    # update section
    public function Update(Request $request)
    {
        $this->validate($request,[
            'edit_name'   => 'required',
        ]);

        $data = Country::where('id',$request->edit_id)->first();
        $data->name = $request->edit_name;
        $data->save();
        MakeReport('بتحديث دولة  '.$data->name);
        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }

    # delete
    public function Delete($id)
    {
        $data = Country::where('id',$id)->first();
        MakeReport('بحذف  دولة '.$data->name);
        $data->delete();
        Alert::success('عملية ناجحة','تم الحذف');
        return back();
    }
}
