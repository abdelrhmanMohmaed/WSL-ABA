<?php

namespace Modules\Kids\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Kids\Entities\Goal;
use Modules\Kids\Entities\Kid;
use Modules\Kids\Http\Requests\GoalRequest;
use RealRashid\SweetAlert\Facades\Alert;

class GoalController extends Controller
{
    public function index(Kid $kid): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $goals = Goal::with('appeal')
            ->where('status',0)
            ->where('kid_id',$kid->id)
            ->orderBy('id','desc')
            ->get();

        return view('kids::front.kids.goals.index',
            compact('kid','goals'));
    }

    public function store(GoalRequest $request,Kid $kid): \Illuminate\Http\RedirectResponse
    {
        try {

            Goal::create([
                'kid_id' => $kid->id,
                'customer_id' => auth()->guard('customer')->id(),
                'appeal_id' => $request->appeal ?? 545,
                'target' => $request->target,
                'stimulus' => $request->stimulus ,
            ]);

            Alert::success('عملية ناجحة', 'تم الاضافة');
            return redirect()->back();
        } catch (\Exception $e)  {

            Alert::warning('not found ', 'حدث خطا ما يجب التحقق');
            return redirect()->back();
        }
    }

    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {
        try {

            $goal = Goal::where('id',$request->goal)->first();
            if (!$goal) {
                Alert::warning('not found ', 'حدث خطا ما يجب التحقق');
                return redirect()->back();
            }

            $goal->update([
                'target' => $request->target,
//                'description' => $request->description,
            ]);

            Alert::success('عملية ناجحة', 'تم التعديل');
            return redirect()->back();
        } catch (\Exception $e)  {

            Alert::warning('not found ', 'حدث خطا ما يجب التحقق');
            return redirect()->back();
        }
    }

    public function destroy(Request $request): \Illuminate\Http\RedirectResponse
    {
        try {

            $goal = Goal::where('id',$request->goal)->first();
            if (!$goal) {
                Alert::warning('not found ', 'حدث خطا ما يجب التحقق');
                return redirect()->back();
            }

            $goal->delete();

            Alert::success('عملية ناجحة', 'تم الحذف');
            return redirect()->back();
        } catch (\Exception $e)  {

            Alert::warning('not found ', 'حدث خطا ما يجب التحقق');
            return redirect()->back();
        }
    }

}
