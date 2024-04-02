<?php

namespace Modules\Kids\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Kids\Entities\Goal;
use Modules\Kids\Entities\IndoctrinationType;
use Modules\Kids\Entities\Kid;
use Modules\Kids\Entities\Session;

class ChartController extends Controller
{
    public function index(Kid $kid, Goal $goal): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $sessions = Session::where('kid_id', $kid->id)
            ->where('goal_id', $goal->id)->get();
        $indoctrinationTypes = IndoctrinationType::get();

        return view('kids::front.kids.goals.chart.index',
            compact('kid', 'goal', 'sessions','indoctrinationTypes'));
    }

    public function getChart(Request $request,Kid $kid, Goal $goal): \Illuminate\Http\JsonResponse
    {
        if (!$request->ajax()){
            abort(505);
        }
        $sessions = Session::with('IndoctrinationType','customer')->where('kid_id', $kid->id)
            ->where('goal_id', $goal->id)->get();

        return response()->json($sessions);
    }
}
