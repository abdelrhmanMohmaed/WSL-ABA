<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Traits\UploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DoctorRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Files;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Customer;

class AuthController extends Controller
{
    use UploadTrait;

    public function loginCustomer(Request $request): RedirectResponse
    {
        $customer = Customer::where('name', $request->name)->first();

        if ($customer) {
            if (Auth::guard('customer')->attempt(['name' => $request->name, 'password' => $request->password])) {

                Alert::success('عملية ناجحة', 'شكرا لإنضمامك لنا');

                return redirect()->intended(route('welcome_customer'));

            } else {
                Alert::warning('هناك خطأ', 'بياناتك خاطئه ');
                return back();
            }


        } else {
            Alert::warning('هناك خطأ', 'بياناتك خاطئه ');
            return back();
        }
    }

    public function update(DoctorRequest $request): RedirectResponse
    {
        try {
            $customer = Customer::whereId(Auth::guard('customer')->id())->first();

            $customer->name = $request->name;
            $customer->degree = $request->degree;
            $customer->phone = $request->phone;
            $customer->email = $request->email;
            $customer->spaci = $request->spaci;
            $customer->area = $request->area;
            $customer->city = $request->city;
            $customer->job_name = $request->job_name;
            $customer->place_work = $request->place_work;
            $customer->active = '1';

            # upload avatar
            if (!is_null(value: $request->avatar)) {
                $this->uploadAvatar($customer, 'uploads/customers/avatar/', $request->avatar);
            }

            $customer->save();

            if ($request->hasFile('file')) {
                $this->uploads('uploads/files', $request->file('file'), $customer->id);
            }

            Alert::success('عملية ناجحة', 'تم الحفظ');
            return redirect()->route('welcome_customer');
        } catch (\Exception $e) {

            Alert::warning('هناك خطأ', 'بياناتك خاطئه ');
            return redirect()->back();
        }
    }

    public function destroyCertification(Files $file)
//    : RedirectResponse
    {

        try {
            File::delete('uploads/files/' . $file->file);
            $file->delete();

            Alert::success('عملية ناجحة', 'تم الحذف');
            return redirect()->route('info_profile');
        } catch (\Exception $e) {
//return $e;
            Alert::warning('هناك خطأ', 'بياناتك خاطئه ');
            return redirect()->back();
        }
    }

    public function logout(): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|RedirectResponse
    {
        if (Auth::guard('customer')->check()) {
            Auth::guard('customer')->logout();
        }
        return redirect()->route('welcome');
    }
}
