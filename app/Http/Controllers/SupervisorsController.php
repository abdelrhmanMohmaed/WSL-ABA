<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Tower;
use App\Models\Supervisor_Service;
use Session;
use Image;
use File;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;

class SupervisorsController extends Controller
{
    # index
    public function Index()
    {
    	$users = User::latest()->get();
    	return view('supervisors.supervisors',compact('users'));
    }

    # add user page
    public function AddSupervisorPage()
    {
    	$roles     = Role::latest()->get();
    	return view('supervisors.add_supervisor',compact('roles'));
    }

    # store user 
    public function StoreSupervisor(Request $request)
    {
        $this->validate($request,[
            'name'      => 'required',
            'email'     => 'nullable|unique:users',
            'phone'     => 'required|unique:users',
            'password'  => 'required',
            'active'    => 'required',
            'role'      => 'required',
            'avatar'    => 'nullable|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $user = new User;
        $user->name           = $request->name;
        $user->email          = $request->email;
        $user->phone          = $request->phone;
        $user->active         = $request->active;
        $user->role           = $request->role;
        $user->password       = bcrypt($request->password);

        # upload avatar
        if(!is_null($request->avatar))
        {
            $photo=$request->avatar;
            $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->save('uploads/users/avatar/'.$name);
            $user->avatar=$name;
        }

        $user->save();


        MakeReport('بإضافة مشرف جديد ' .$user->name);
        Alert::success('عملية ناجحة','تم الحفظ');
        return redirect()->route('supervisors');
    }

    # edit user
    public function EditSupervisor($id)
    {
		$roles     = Role::latest()->get();
    	$user      = User::with('Role')->where('id',$id)->first();
        if(!$user)
        {
            return back();
        }
    	return view('supervisors.edit_supervisor',compact('user','roles'));
    }

    # update user
    public function UpdateSupervisor(Request $request)
    {
        $this->validate($request,[
            'name'      => 'required',
            'email'     => 'nullable|unique:users,email,'.$request->id,
            'phone'     => 'required|unique:users,phone,'.$request->id,
            'active'    => 'required',
            'role'      => 'required',
            'avatar'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $user = User::where('id',$request->id)->first();
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->phone    = $request->phone;
        $user->active   = $request->active;
        $user->role     = $request->role;

        # password
        if(!is_null($request->password))
        {
            $user->password = bcrypt($request->password);
        }

        # upload avatar
        if(!is_null($request->avatar))
        {
        	# delete avatar
	    	if($user->avatar !== 'default.png')
	    	{
	   			File::delete('uploads/users/avatar/'.$user->avatar);
	    	}

	    	# upload new avatar
            $photo=$request->avatar;
            $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->save('uploads/users/avatar/'.$name);
            $user->avatar=$name;
        }

        $user->save();
        MakeReport('بتحديث مشرف ' .$user->name);
        Alert::success('عملية ناجحة','تم الحفظ');
        return redirect()->route('supervisors');
    }

    # delete user
    public function DeleteSupervisor($id)
    {
    	if(Auth::user()->id == $id)
    	{
    		Alert::success('warning','لا يمكن حذف الحساب اثناء تسجيل الدخول به ! ');
    		return back();
    	}
    	$user = User::where('id',$id)->first();
    	if($user->avatar != 'default.png')
    	{
   			File::delete('uploads/users/avatar/'.$user->avatar);
    	}
    	MakeReport('بحذف مشرف '.$user->name);
    	$user->delete();
    	Alert::success('عملية ناجحة','تم الحذف');
    	return back();
    }	
}
