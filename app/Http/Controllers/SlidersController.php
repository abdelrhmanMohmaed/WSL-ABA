<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Session;
use Image;
use File;
use RealRashid\SweetAlert\Facades\Alert;

class SlidersController extends Controller
{
    # index
    public function Index()
    {
        $data = Slider::latest()->get();
        return view('sliders.sliders',compact('data'));
    }

    # store
    public function Store(Request $request)
    {
        $this->validate($request,[
            'name_ar'     => 'required',
            'name_en'     => 'required',
            'content_ar'  => 'required',
            'content_en'  => 'required',
            'image'       => 'required'
        ]);

        $data = new Slider;
        $data->title_ar   = $request->name_ar;
        $data->title_en   = $request->name_en;
        $data->content_ar = $request->content_ar;
        $data->content_en = $request->content_en;
        $data->link       = $request->link;

        # upload image
        $photo=$request->image;
        $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
        Image::make($photo)->save('uploads/sliders/'.$name,100);
        $data->image=$name;

        $data->save();
        Alert::success('success','تم الحفظ');
        MakeReport('بإضافة صورة إسلايدر جديدة '.$data->title_ar);
        return back();
    }

    # update
    public function Update(Request $request)
    {
        $this->validate($request,[
            'edit_id'          => 'required',
            'edit_name_ar'     => 'required',
            'edit_name_en'     => 'required',
            'edit_content_ar'  => 'required',
            'edit_content_en'  => 'required',
        ]);

        $data = Slider::where('id',$request->edit_id)->first();
        $data->title_ar   = $request->edit_name_ar;
        $data->title_en   = $request->edit_name_en;
        $data->content_ar = $request->edit_content_ar;
        $data->content_en = $request->edit_content_en;
        $data->link       = $request->edit_link;

        # upload image
        if(!is_null($request->edit_image))
        {
            File::delete('uploads/sliders/'.$data->image);
            $photo=$request->edit_image;
            $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->save('uploads/sliders/'.$name,100);
            $data->image=$name;
        }

        $data->save();
        Alert::success('success','تم الحفظ');
        MakeReport('بتحديث صورة إسلايدر '.$data->title_ar);
        return back();
    }

    # delete
    public function Delete($id)
    {
        $data = Slider::where('id',$id)->first();
        MakeReport('بحذف صورة إسلايدر '.$data->title_ar);
        File::delete('uploads/sliders/'.$data->image);
        $data->delete();
        Alert::success('success','تم الحذف');
        return back();
    }
}
