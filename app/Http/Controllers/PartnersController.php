<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use Image;
use Session;
use File;
use RealRashid\SweetAlert\Facades\Alert;

class PartnersController extends Controller
{
    # index
    public function Index()
    {
        $data = Partner::latest()->get();
        return view('partners.partners',compact('data'));
    }

    # store
    public function Store(Request $request)
    {
        $this->validate($request,[
            'name_ar'     => 'required',
            'name_en'     => 'required',
            'image'       => 'required'
        ]);

        $data = new Partner;
        $data->name_ar = $request->name_ar;
        $data->name_en = $request->name_en;

        # upload image
        $photo=$request->image;
        $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
        Image::make($photo)->resize(300,300)->save('uploads/partners/'.$name,100);
        $data->image=$name;

        $data->save();
        Alert::success('success','تم الحفظ');
        MakeReport('بإضافة شريك جديد '.$data->name_ar);
        return back();
    }

    # update
    public function Update(Request $request)
    {
        $this->validate($request,[
            'edit_id'         => 'required',
            'edit_name_ar'    => 'required',
            'edit_name_en'    => 'required'
        ]);

        $data = Partner::where('id',$request->edit_id)->first();
        $data->name_ar = $request->edit_name_ar;
        $data->name_en = $request->edit_name_en;

        # upload image
        if(!is_null($request->edit_image))
        {
            File::delete('uploads/partners/'.$data->image);
            $photo=$request->edit_image;
            $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(300,300)->save('uploads/partners/'.$name,100);
            $data->image=$name;
        }

        $data->save();
        Alert::success('success','تم الحفظ');
        MakeReport('بتحديث شريك '.$data->name_ar);
        return back();
    }

    # delete
    public function Delete($id)
    {
        $data = Partner::where('id',$id)->first();
        MakeReport('بحذف شريك '.$data->name_ar);
        File::delete('uploads/partners/'.$data->image);
        $data->delete();
        Alert::success('success','تم الحذف');
        return back();
    }
}
