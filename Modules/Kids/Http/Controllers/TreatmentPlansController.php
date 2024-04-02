<?php

namespace Modules\Kids\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Kids\Entities\Appale;
use Modules\Kids\Entities\Appsessions;
use Modules\Kids\Entities\Kid;
use Modules\Kids\Entities\Usersessions;

class TreatmentPlansController extends Controller
{
    public function index(Kid $kid): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('kids::front.kids.treatment-plans.index',
            compact('kid'));
    }

    public function show(Kid $kid, Request $request, $session = null): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {

        $appId = $request->input("app");

        $sessions = Usersessions::with('session')
            ->where('doctor_id', auth()->guard('customer')->id())
            ->where('kid_id', $kid->id)->get();

        if ($session != NULL) {

            $allSessions = Usersessions::with('Appsessions.Appale', 'Appsessions.Anssessions')
                ->where('session_id', $session)
                ->where('doctor_id', auth()->guard('customer')->id())
                ->where('kid_id', $kid->id)->get();
//            dd($sessionIds);
            $sessionIds = $allSessions->pluck('id')->toArray();

        } else {
            $sessionIds = $sessions->pluck('id')->toArray();
        }


        if ($appId) {

            $nums = Appsessions::where('app_id', $appId)->whereIn('session_id', $sessionIds)->get();
            $letr = Appale::where('id', $appId)->with('Appale_Nums', 'Appale_Nums.Appale_Ques')->first();

        } else {

//            dd($sessionIds);

            $letr = Appale::with(['Appale_Nums', 'Appale_Nums.Appale_Ques'])
                ->where('id', '1')->first();

            $nums = Appsessions::
            where('app_id', '1')->
            whereIn('session_id', $sessionIds)->get();
        }

        $apps = Appale::with('Appale_Nums', 'Appale_Nums.Appale_Ques')->get();

        return view('kids::front.kids.treatment-plans.show',
            compact('nums', 'letr', 'kid', 'apps', 'sessions'));
    }
}
