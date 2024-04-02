<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Session;
use View;
use RealRashid\SweetAlert\Facades\Alert;

class PolicyController extends Controller
{
    public function __construct()
    {
        View::share([
            'data'=>Setting::first()
        ]);
    }

    # customer policy
    public function CustomerPolicy()
    {
        return view('policy.customer_policy');
    }

    # update customer policy
    public function UpdateCustomerPolicy(Request $request)
    {
        $this->validate($request,[
            'policy_ar'    => 'required',
            'policy_ar'    => 'required'
        ]);

        $data = Setting::first();
        $data->customer_policy_ar = $request->policy_ar;
        $data->customer_policy_en = $request->policy_en;
        $data->Save();
        Alert::success('success','تم التحديث');
        MakeReport('بتحديث شروط وأحكام المستخدمين');
        return back();
    }

    # provider policy
    public function ProviderPolicy()
    {
        return view('policy.provider_policy');
    }

    # update provider policy
    public function UpdateProviderPolicy(Request $request)
    {
        $this->validate($request,[
            'policy_ar'    => 'required',
            'policy_ar'    => 'required'
        ]);

        $data = Setting::first();
        $data->provider_policy_ar = $request->policy_ar;
        $data->provider_policy_en = $request->policy_en;
        $data->Save();
        Alert::success('success','تم التحديث');
        MakeReport('بتحديث شروط وأحكام مقدمي الخدمة');
        return back();
    }
}
