<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Files;
use RealRashid\SweetAlert\Facades\Alert;
use Session;
use Image;
use File;
use View;
use Modules\Society\Entities\Chat;

class CustomersController extends Controller
{

    
    # index
    public function Index()
    {
        $data = Customer::latest()->get();
        return view('customers.customers',compact('data'));
    }


    # store
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'          => 'required|min:10|max:50|unique:customers,name',
            'password'      => 'required|min:6',
           
        ]);

        $data = new Customer;
        $data->name     = $request->name;
        $data->password = bcrypt($request->password);

        # upload avatar
        if(!is_null($request->avatar))
        {
         
            # upload new avatar
            $photo=$request->avatar;
            $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->save('uploads/customers/avatar/'.$name);
            $data->avatar=$name;
        }

       

        $data->save();
        MakeReport('بإضافة طبيب ' .$data->name);
        Alert::success('عملية ناجحة','تم الحفظ');
        return redirect()->route('customers');
    }

    # edit
    public function Edit($id)
    {
        $data = Customer::findOrFail($id);
    	return view('customers.edit_customer',compact('data'));
    }

    # update
    public function Update(Request $request)
    {
        $this->validate($request,[
            'name'      => 'required',
            'active'    => 'required',
            'avatar'    => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $data = Customer::where('id',$request->id)->first();
        $data->name     = $request->name;
        $data->active   = $request->active;
      
        # password
        if(!is_null($request->password))
        {
            $data->password = bcrypt($request->password);
        }

        # upload avatar
        if(!is_null($request->avatar))
        {
        	# delete avatar
	    	if($data->avatar != 'default.png')
	    	{
	   			File::delete('uploads/customers/avatar/'.$data->avatar);
	    	}

	    	# upload new avatar
            $photo=$request->avatar;
            $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->save('uploads/customers/avatar/'.$name);
            $data->avatar=$name;
        }

        $data->save();
        MakeReport('بتحديث طبيب ' .$data->name);
        Alert::success('عملية ناجحة','تم الحفظ');
        return redirect()->route('customers');
    }

    # delete
    public function Delete($id)
    {
        $data = Customer::where('id',$id)->first();
    	if($data->avatar != 'default.png')
    	{
   			File::delete('uploads/customers/avatar/'.$data->avatar);
    	}

    	MakeReport('بحذف طبيب '.$data->name);
    	$data->delete();
    	Alert::success('عملية ناجحة','تم الحذف');
    	return back();
    }	
}
