<?php

namespace Modules\Kids\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Kids\Entities\Anssessions;
use Modules\Kids\Entities\Appale;
use Modules\Kids\Entities\Appsessions;
use Modules\Kids\Entities\Kid;
use Modules\Kids\Entities\SessionK;
use Modules\Kids\Entities\Usersessions;
use RealRashid\SweetAlert\Facades\Alert;

class EvaluationController extends Controller
{
    public function evaluation(Kid $kid): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('kids::front.kids.evaluations.evaluation',
            compact('kid'));
    }

    public function appeals(Request $request, Kid $kid): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $session_Id = $request->input("session");

        try {
            $userSessionsQuery = Usersessions::where('doctor_id', auth()->guard('customer')->id())
            ->where('kid_id', $kid->id);

            $countSession = $userSessionsQuery->count();
            if ($session_Id) {

                $sessionColor = SessionK::where('id', $session_Id)->first();
                if (!$sessionColor) {
                    Alert::error(' عملية فاشلة', ' لقد وصلت للحد النهائي');
                    return back();
                }
            } else {
                $sessionColor = SessionK::whereId(1)->first();
            }

            $userSessions = $userSessionsQuery->with('Appsessions.Appale', 'Appsessions.Anssessions')
            ->where('session_id', $sessionColor->id)
            ->latest()->first(); 


            if ($userSessions) {
            } else {
                // Create new session in first one
                $userSessionsOld = Usersessions::with('Appsessions.Appale', 'Appsessions.Anssessions', 'Anssessions')
                    ->where('session_id', $sessionColor->id - 1)
                    ->where('doctor_id', auth()->guard('customer')->id())
                    ->where('kid_id', $kid->id)->latest()->first();

                // Create New session to open in this page
                $userSessions = new Usersessions;
                $userSessions->session_id = $sessionColor->id;
                $userSessions->doctor_id = auth()->guard('customer')->id();
                $userSessions->kid_id = $kid->id;
                $userSessions->save();

                $apps = Appale::with('Appale_Nums', 'Appale_Nums.Appale_Ques')->get(); // characters and Ques and sub Ques
                foreach ($apps as $key => $value) {

                    // بيربط الحروف ب السيشن دى 
                    $Appsessions = new Appsessions;
                    $Appsessions->session_id = $userSessions->id;
                    $Appsessions->app_id = $value->id;
                    $Appsessions->save();

                    foreach ($value->Appale_Nums as $key => $quse) {
                        $Anssessions = new Anssessions;
                        $Anssessions->session_id = $userSessions->id;
                        $Anssessions->ques_id = $quse->id;
                        $Anssessions->app_id = $Appsessions->id;

                        if (isset($userSessionsOld)) {
                            foreach ($userSessionsOld->Anssessions as $key => $val) {
                                if ($val->ques_id == $quse->id) {
                                    $Anssessions->hex_old = $val->ans_id == null ? $val->hex_old : $userSessionsOld->Session->hex;
                                    $Anssessions->ans_old_id = $val->ans_id ?? $val->ans_old_id;
                                }
                            }
                        }

                        $Anssessions->save();
                    }
                }

                $userSessions = Usersessions::with('Appsessions.Appale', 'Appsessions.Anssessions.Appale_Nums.Appale_Ques')
                    ->whereId($userSessions->id)
                    ->latest()->first();
            }
            $sessions = Usersessions::with('Session')
                ->where('doctor_id', auth()->guard('customer')->id())
                ->where('kid_id', $kid->id)->get();

            return view('kids::front.kids.evaluations.appeals',
                compact('kid',  'sessions', 'userSessions', 'countSession'));
        } catch (\Exception $e) {
            // dd($e->getMessage());
            Alert::warning('not found ', 'حدث خطا ما يجب التحقق');
            return redirect()->back();
        }
    }                   
    public function storeAppeals(Request $request, Kid $kid): \Illuminate\Http\RedirectResponse
    {
        // dd($request->all());
        $apps = Appale::with('Appale_Nums', 'Appale_Nums.Appale_Ques')->get();
        $answer = $request->ans;
        try {

            $userSessions = Usersessions::with('Appsessions.Appale', 'Appsessions.Anssessions')
                ->where('session_id', $request->Session)
                ->where('doctor_id', auth()->guard('customer')->id())
                ->where('kid_id', $kid->id)
                ->latest()
                ->first();

            $userSessionsOld = Usersessions::with('Appsessions.Appale', 'Appsessions.Anssessions', 'Anssessions')
                ->where('session_id', $request->id - 1)
                ->where('doctor_id', auth()->guard('customer')->id())
                ->where('kid_id', $kid->id)
                ->latest()
                ->first();

                if ($userSessionsOld) {
                    $userSessionsOld->evaluation_report = $request->hiddenEvaluationReport;
                    $userSessionsOld->save();
                }
            $userSessionsNew = Usersessions::with('Appsessions.Appale', 'Appsessions.Anssessions', 'Anssessions')
                ->where('session_id', $request->id + 1)
                ->where('doctor_id', auth()->guard('customer')->id())
                ->where('kid_id', $kid->id)
                ->latest()
                ->first();

            if ($userSessions) {
                foreach ($request->ques as $key => $value) {
                    if ($answer[$value] !== null) {
                        $ansSessions = Anssessions::where('ques_id', $value)
                            ->where('session_id', $userSessions->id)
                            ->latest()
                            ->first();

                        $ansSessions->ans_id = $answer[$value];

                        if ($userSessionsOld) {
                            foreach ($userSessionsOld->Anssessions as $ke => $val) {
                                if ($val->ques_id == $value) {
                                    $ansSessions->ans_old_id = $val->ans_id ?? $val->ans_old_id;
                                    $ansSessions->hex_old = $val->ans_id == null ? $val->hex_old : $userSessionsOld->Session->hex;
                                }
                            }
                        }

                        $ansSessions->save();
                    }
                }

                foreach ($apps as $key => $app) {
                    $name = $request->name[$app->id] ?? '';
                    $desc = $request->desc[$app->id] ?? '';

                    if ($name || $desc) {
                        $appSessions = Appsessions::where('session_id', $userSessions->id)
                            ->where('app_id', $app->id)
                            ->latest()
                            ->first();

                        if ($appSessions) {
                            if ($name) {
                                $appSessions->name = $name;
                            }

                            if ($desc) {
                                $appSessions->desc = $desc;
                            }

                            $appSessions->save();
                        }
                    }
                }
                
                $userSessions->evaluation_report = $request->hiddenEvaluationReport;
                $userSessions->save(); 
            }

            if ($userSessionsNew) {
                foreach ($request->ques as $key => $value) {
                    if ($answer[$value] !== null) {
                        foreach ($userSessionsNew->Anssessions as $k => $val) {
                            if ($val->ques_id == $value) {
                                $ansSessionsNew = Anssessions::where('ques_id', $value)
                                    ->where('session_id', $userSessionsNew->id)
                                    ->latest()
                                    ->first();

                                $ansSessionsNew->hex_old = $userSessionsNew->Session->hex;
                                $ansSessionsNew->ans_old_id = $answer[$value];
                                $ansSessionsNew->save();
                            }
                        }
                    }
                }
                // dd($userSessionsNew->evaluation_report,'2');

                $userSessionsNew->evaluation_report = $request->hiddenEvaluationReport;
                $userSessionsNew->save();
            }

            Alert::success('عملية ناجحة', 'تم الإدخال');
            return redirect()->route('kids.evaluate.appeals.vertical-draw',$kid->id);
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());

            Alert::warning('not found ', 'حدث خطا ما يجب التحقق');
            return redirect()->back();
        }
    }

    public function destroy(Request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $userSessions = Usersessions::where('session_id', $request->session_id)
                ->where('doctor_id', auth()->guard('customer')->id())
                ->where('kid_id', $request->id)->latest()->first();

            $userSessions->delete();
            Alert::success('عملية ناجحة', 'تم الحذف');
            return back();
        } catch (\Exception $e) {

            Alert::warning('not found ', 'حدث خطا ما يجب التحقق');
            return redirect()->back();
        }
    }

    public function showVerticalDraw(Request $request, $id, $seesionId = null) : \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $session_Id = $request->input("session_Id");
        $app_Id = $request->input("app_Id");

        $sessions = Usersessions::where('kid_id', $id)->get();
        $countSession = Usersessions::with('Appsessions.Appale', 'Appsessions.Anssessions')
            ->where('doctor_id', auth()->guard('customer')->id())
            ->where('kid_id', $id)->count();

        $sessions = Usersessions::with('session')
            ->where('doctor_id', auth()->guard('customer')->id())
            ->where('kid_id', $id)->get();
        $sessionIds = $sessions->pluck('id')->toArray();

        if ($app_Id) {

            $nums = Appsessions::with(['Usersessions','Usersessions.Session'])->where('app_id', $app_Id)->whereIn('session_id', $sessionIds)->get();
            $letr = Appale::where('id', $app_Id)->with('Appale_Nums', 'Appale_Nums.Appale_Ques')->first();

        } else {
            $letr = Appale::where('id', '1')->with('Appale_Nums', 'Appale_Nums.Appale_Ques')->first();
            $nums = Appsessions::where('app_id', '1')->whereIn('session_id', $sessionIds)->get();
        }
        $kid = Kid::find($id);
        $apps = Appale::with('Appale_Nums', 'Appale_Nums.Appale_Ques')->get();

        return view('kids::front.kids.evaluations.vertical_drawing', 
        compact('nums', 'letr', 'kid', 'apps', 'sessions', 'countSession'));
    }

    public function report(Request $request,Kid $kid,Usersessions $userSession)
    {
        $appSessions  = Appsessions::with('Appale')->where('session_id',$userSession->id)->get();

        return view('kids::front.kids.evaluations.report', 
        compact('appSessions', 'kid','userSession'));
    }
}
