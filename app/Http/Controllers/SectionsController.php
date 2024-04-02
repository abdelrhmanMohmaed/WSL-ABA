<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Session;
use Image;
use File;
class SectionsController extends Controller
{
    public function index()
    {
        $sections = Section::latest()->get();
    	return view('sections.sections',compact('sections'));
    }



    # add section
    public function Store(Request $request)
    {
        $this->validate($request,[
            'name'   => 'required',
        ]);

        $data = new Section;
        $data->name = $request->name;
       
        # upload image
        $photo=$request->image;
        $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
        Image::make($photo)->save('uploads/sections/'.$name,100);
        $data->image=$name;
        $data->save();

        MakeReport('بإضافة مجال جديد '.$data->name);
        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }

    # update section
    public function Update(Request $request)
    {
        $this->validate($request,[
            'edit_name'   => 'required',
        ]);

        $data = Section::where('id',$request->edit_id)->first();
        $data->name = $request->edit_name;
        # upload image
        if(!is_null($request->edit_image))
        {
            File::delete('uploads/sections/'.$data->image);
            $photo=$request->edit_image;
            $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->save('uploads/sections/'.$name,100);
            $data->image=$name;
        }
        $data->save();
        MakeReport('بتحديث مجال  '.$data->name);
        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }

 
    # delete
    public function Delete($id)
    {
        $data = Section::where('id',$id)->first();
        MakeReport('بحذف  مجال '.$data->name);
        File::delete('uploads/sections/'.$data->image);
        $data->delete();
        Alert::success('عملية ناجحة','تم الحذف');
        return back();
    }
}
