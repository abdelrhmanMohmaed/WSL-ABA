<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Place;
use App\Models\Place_Image;
use App\Models\Section;
use View;
use Image;
use File;
use Session;
use RealRashid\SweetAlert\Facades\Alert;

class PlacesController extends Controller
{
    public function __construct()
    {
        View::share([
            'cities'=> City::get(),
            'sections'=> Section::get()
        ]);
    }

    # index
    public function Index()
    {
        $data = Place::latest()->get();
        return view('Places.Places',compact('data'));
    }

    # add Place
    public function Add()
    {
        return view('Places.add_Place');
    }

    # store
    public function Store(Request $request)
    {
        $this->validate($request,[
            'name_ar'      => 'required',
            'name_en'      => 'required',
            'des_ar'       => 'required',
            'des_en'       => 'required',
            'longitude'    => 'required',
            'latitude'     => 'required',
            'address'      => 'required',
            'section_id'   => 'required',
            'city_id'      => 'required',
        ]);

        $Place = new Place;
        $Place->name_ar          = $request->name_ar;
        $Place->name_en          = $request->name_en;
        $Place->des_ar           = $request->des_ar;
        $Place->des_en           = $request->des_en;
        $Place->longitude        = $request->longitude;
        $Place->latitude         = $request->latitude;
        $Place->address          = $request->address;
        $Place->section_id       = $request->section_id;
        $Place->city_id          = $request->city_id;

        
        $Place->save();
        # upload galary images
        foreach($request->galary as $ga)
        {
        
            $image = new Place_Image;
            $photo=$ga;
            $name = date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->save('uploads/Places_images/'.$name);
            $image->image      = $name;
            $image->place_id = $Place->id;
            $image->save();
        }
      
       MakeReport('بإضافة مكان '.$Place->name_ar);
       Alert::success('success','تم إضافة المكان');
       return back();
    }

    # edit
    public function Edit($id)
    {
        $data = Place::with('City','Section','PlaceImages')->findOrFail($id);
        return view('Places.edit_Place',compact('data'));
    }

    # update
    public function Update(Request $request)
    {
        $this->validate($request,[
            'name_ar'      => 'required',
            'name_en'      => 'required',
            'des_ar'       => 'required',
            'des_en'       => 'required',
            'longitude'    => 'required',
            'latitude'     => 'required',
            'address'      => 'required',
            'section_id'   => 'required',
            'city_id'      => 'required',
        ]);

        $Place = Place::findOrFail($request->id);
        $Place->name_ar          = $request->name_ar;
        $Place->name_en          = $request->name_en;
        $Place->des_ar           = $request->des_ar;
        $Place->des_en           = $request->des_en;
        $Place->longitude        = $request->longitude;
        $Place->latitude         = $request->latitude;
        $Place->address          = $request->address;
        $Place->section_id       = $request->section_id;
        $Place->city_id          = $request->city_id;
        $Place->save();

        # upload galary images
        if(!is_null($request->galary))
        {
            foreach($request->galary as $ga)
            {
            
                $image = new Place_Image;
                $photo=$ga;
                $name = date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
                Image::make($photo)->save('uploads/Places_images/'.$name);
                $image->image      = $name;
                $image->place_id = $Place->id;
                $image->save();
            }
        }
        

       MakeReport('بتحديث مكان '.$Place->name_ar);
       Alert::success('success','تم تحديث المكان');
       return back();
    }

    # delete image
    public function DeleteImage(Request $request)
    {

        $image = Place_Image::where('id',$request->id)->first();
    
        File::delete('uploads/Places_images/'.$image->image);
    
        MakeReport('بحذف الصورة ');
        $image->delete();
        return back();
    }
   

    # delete Place
    public function DeletePlace($id)
    {

        $Place = Place::where('id',$id)->first();
     
        MakeReport('بحذف مكان ');
        $Place->delete();
        Alert::success('success','تم الحذف');
        return back();
    }
}
