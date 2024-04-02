<?php

namespace Modules\Kids\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Kids\Entities\Goal;
use Modules\Kids\Entities\Kid;
use Modules\Kids\Http\Requests\AccomplishedGoalsRequest;
use RealRashid\SweetAlert\Facades\Alert;

class AccomplishedGoalsController extends Controller
{
    public function index(Kid $kid): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $goals = Goal::with('appeal')
            ->where('status', 1)
            ->where('kid_id', $kid->id)
            ->orderBy('id','desc')
            ->get();

        return view('kids::front.kids.goals.accomplishedGoals.index',
            compact('kid', 'goals'));
    }

    public function update(AccomplishedGoalsRequest $request): \Illuminate\Http\RedirectResponse
    {
        try {

            $goal = Goal::where('id', $request->goal)->first();
            if (!$goal) {
                Alert::warning('not found ', 'حدث خطا ما يجب التحقق');
                return redirect()->back();
            }

            $goal->update([
                'status' => 1,
                'mastery' => $request->mastery,
                'description' => $request->description,
            ]);

            Alert::success('عملية ناجحة', 'تم التعديل');
            return redirect()->back();
        } catch (\Exception $e) {
//            dd($e);
            Alert::warning('not found ', 'حدث خطا ما يجب التحقق');
            return redirect()->back();
        }
    }
}
