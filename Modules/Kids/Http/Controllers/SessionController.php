<?php

namespace Modules\Kids\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Kids\Entities\Goal;
use Modules\Kids\Entities\IndoctrinationType;
use Modules\Kids\Entities\Kid;
use Modules\Kids\Entities\Session;
use Modules\Kids\Http\Requests\SessionRequest;
use RealRashid\SweetAlert\Facades\Alert;

class SessionController extends Controller
{
    public function index(Kid $kid, Goal $goal): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $sessions = Session::where('kid_id', $kid->id)
            ->where('goal_id', $goal->id)->get();

        return view('kids::front.kids.goals.sessions.index',
            compact('kid', 'sessions', 'goal'));
    }

    public function create(Kid $kid, Goal $goal): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $indoctrinationTypes = IndoctrinationType::get();

        return view('kids::front.kids.goals.sessions.create',
            compact('kid', 'goal', 'indoctrinationTypes'));
    }

    public function store(SessionRequest $request, Kid $kid, Goal $goal): \Illuminate\Http\RedirectResponse
    {
        try {
            Session::create([
                'kid_id' => $kid->id,
                'customer_id' => Auth::guard('customer')->id(),
                'goal_id' => $goal->id,
                'indoctrination_type_id' => $request->indoctrinationType,
                'percentage' => $request->percentage,
                'description' => $request->description,
            ]);

            Alert::success('عملية ناجحة', 'تم الإضافة');
            return redirect()->route('kids.treatment-plans.goals.sessions.index', [$kid->id, $goal->id]);

        } catch (\Exception $e) {

            Alert::warning('not found ', 'حدث خطا ما يجب التحقق');
            return redirect()->back();
        }
    }
}
