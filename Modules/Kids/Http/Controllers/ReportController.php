<?php

namespace Modules\Kids\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Kids\Entities\Goal;
use Modules\Kids\Entities\Kid;
use Modules\Kids\Entities\Session;
use PDF;

class ReportController extends Controller
{
    public function index(Kid $kid): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $kid = Kid::with('goals.sessions.customer')
            ->where('id', $kid->id)
            ->first();

        $dataModalOne = [];
        foreach ($kid->goals->where('status', 1) as $goal) {
            foreach ($goal->sessions as $session) {
                $customer = $session->customer;
                $percentage = $session->percentage;

                if (!isset($dataModalOne[$customer->id])) {
                    $dataModalOne[$customer->id] = [
                        'name' => $customer->name,
                        'sessionsCount' => 1,
                        'firstPercentage' => $percentage,
                        'lastPercentage' => $percentage,
                        'mastery0Count' => 0,
                        'mastery1Count' => 0,
                        'totalPercentage' => $percentage,
                    ];
                } else {
                    $dataModalOne[$customer->id]['sessionsCount']++;
                    $dataModalOne[$customer->id]['lastPercentage'] = $percentage;
                    $dataModalOne[$customer->id]['totalPercentage'] += $percentage;
                }

                //need to edit
                if ($goal->mastery == 0) {
                    $dataModalOne[$customer->id]['mastery0Count']++;
                } elseif ($goal->mastery == 1) {
                    $dataModalOne[$customer->id]['mastery1Count']++;
                }
                //need to edit
            }
        }


        $dataModalTwo = [
            'goals' => [],
        ];

        foreach ($kid->goals as $goal) {
            $firstSession = $goal->sessions->first();
            $lastSession = $goal->sessions->last();
            $appeal = $goal->appeal->name;
            $target = $goal->target;
            $totalSessions = $goal->sessions->count();

            $firstPercentage = $firstSession ? $firstSession->percentage : null;
            $lastPercentage = $lastSession ? $lastSession->percentage : null;
            $firstType = $firstSession ? $firstSession->IndoctrinationType->name : null;
            $lastType = $lastSession ? $lastSession->IndoctrinationType->name : null;

            $goalData = [
                'goal_id' => $goal->id,
                'appeal' => $appeal,
                'target' => $target,
                'totalSessions' => $totalSessions,
                'firstType' => $firstType,
                'lastType' => $lastType,
                'firstPercentageInSessionTable' => $firstPercentage,
                'lastPercentageInSessionTable' => $lastPercentage,
                'customers' => [],
                'totalNotMastered' => 0, // إجمالي الهدف غير المتقن
                'totalMastered' => 0, // إجمالي الهدف المتقن
                'totalUnderTraining' => 0 // الهدف قيد التدريب
            ];

            foreach ($goal->sessions as $session) {
                $customerId = $session->customer->id;
                $customerName = $session->customer->name;

                if (!isset($goalData['customers'][$customerId])) {
                    $goalData['customers'][$customerId] = [
                        'sessionsCount' => 1,
                        'customerName' => $customerName
                    ];
                } else {
                    $goalData['customers'][$customerId]['sessionsCount']++;
                }

                if ($session->goal->mastery == 0 && $session->goal->status == 1) {
                    $goalData['totalNotMastered']++;
                } elseif ($session->goal->mastery == 1 && $session->goal->status == 1) {
                    $goalData['totalMastered']++;
                } elseif (is_null($session->goal->mastery) && $session->goal->status == 0) {
                    $goalData['totalUnderTraining']++;
                }
            }

            $dataModalTwo['goals'][] = $goalData;
        }

//dd($dataModalTwo['goals']);
        return view('kids::front.kids.reports.index', compact("kid", "dataModalOne", "dataModalTwo"));
    }

    public function getData($id): \Illuminate\Http\JsonResponse
    {
        $goals = Goal::with('appeal', 'sessions', 'sessions.customer', 'sessions.IndoctrinationType')
            ->whereHas('sessions', function ($query) {
                $query->whereNotNull('sessions.id');
            })->where('kid_id', $id)
            ->get();

        return response()->json($goals);
    }
}
