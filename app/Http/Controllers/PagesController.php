<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use Session;
use Image;
use File;
use RealRashid\SweetAlert\Facades\Alert;

class PagesController extends Controller
{
    # index
    public function index()
    {
        $data = Page::latest()->get();
        return view('pages.pages',compact('data'));
    }


    # store page
    public function Store(Request $request)
    {
        $this->validate($request,[
            'title_ar'     => 'required|max:190',
            'title_en'     => 'required|max:190',
        ]);

        $data = new Page;
        $data->title_ar   = $request->title_ar;
        $data->title_en   = $request->title_en;
        # upload image
        $photo=$request->image;
        $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
        Image::make($photo)->save('uploads/sections/'.$name,100);
        $data->image=$name;
        $data->save();
        Alert::success('success','تم الحفظ');
        MakeReport('بإضافة صفحة '.$data->title_ar);
        return back();
    }


    # update page
    public function Update(Request $request)
    {
        $this->validate($request,[
            'edit_title_ar'     => 'required|max:190',
            'edit_title_en'     => 'required|max:190',
           
        ]);

        $data = Page::where('id',$request->edit_id)->first();
        $data->title_ar   = $request->edit_title_ar;
        $data->title_en   = $request->edit_title_en;
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
        Alert::success('success','تم الحفظ');
        MakeReport('بتحديث صفحة '.$data->title_ar);
        return back();
    }

    # delete page
    public function Delete($id)
    {
        $data = Page::where('id',$id)->first();
        Alert::success('success','تم الحذف');
        MakeReport('بحذف صفحة '.$data->title_ar);
        $data->delete();
        return back();
    }
}
