<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Role;
use Session;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PermissionsController extends Controller
{
    public function Index()
    {
        $roles = Role::latest()->get();
    	return view('permissions.permissions',compact('roles'));
    }

    # add permission page
    public function AddRolePage()
    {
        return view('permissions.add_permission');
    }

    # store role
    public function Add(Request $request)
    {
		$this->validate($request,[
			'role' =>'required',
		]);

    	$role       = new Role;
    	$role->role = $request->role;
    	$role->save();

    	foreach ($request->ids as $key => $id) {
    		$per = new Permission;
    		$per->permission = $id;
    		$per->role_id    = $role->id;
    		$per->save();
    	}
    }

    # edit role
    public function EditRole($id)
    {
        $role = Role::where('id',$id)->first();
        return view('permissions.edit_permission',compact('role'));
    }

    # update role
    public function Update(Request $request)
    {
        $this->validate($request,[
            'role' =>'required',
            'id'   =>'required'
        ]);

        $role       = Role::with('Permissions')->where('id',$request->id)->first();
        $role->role = $request->role;
        $role->save();

        # delete old permissions
        foreach ($role->Permissions as $key => $value) {
           $value->delete();
        }

        # add new permissions
        foreach ($request->ids as $key => $id) {
            $per = new Permission;
            $per->permission = $id;
            $per->role_id    = $role->id;
            $per->save();
        }
    }

    # delete role
    public function Delete(Request $request)
    {
        $roles = Role::count();

        # check if current user has this role
        if(Auth::user()->role == $request->id)
        {
            Alert::success('warning','لا يمكن حذف الصلاحية أثناء استخدامها في عملية الدخول !');
            return back();
        }

        # check roles count 
        if($roles  == 1)
        {
            Alert::success('warning','لا يمكن حذف أخر صلاحية !');
            return back();
        }

        $role = Role::where('id',$request->id)->first();
        MakeReport('بحذف صلاحية '.$role->role);
        $role->delete();
        Alert::success('success','تم الحذف بنجاح');
        return back();
    }


}
