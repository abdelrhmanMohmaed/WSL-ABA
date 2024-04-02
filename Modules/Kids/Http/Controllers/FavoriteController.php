<?php

namespace Modules\Kids\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Modules\Kids\Entities\Favorite;
use Modules\Kids\Entities\Kid;
use Modules\Kids\Http\Requests\FavoriteRequest;
use RealRashid\SweetAlert\Facades\Alert;

class FavoriteController extends Controller
{
    public function index(Kid $kid, $favorite = null): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        if ($favorite) {
            $favorite = Favorite::where('id', $favorite)
                ->where('kid_id', $kid->id)
                ->first();
        } else {
            $favorite = Favorite::where('kid_id', $kid->id)
                ->orderBy('create_date', 'desc')
                ->orderBy('id', 'desc')
                ->first();
        }

        return view('kids::front.kids.favorites.index', compact('kid', 'favorite'));
    }

    public function show(Kid $kid): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $favorites = Favorite::with('customer')
            ->where('kid_id', $kid->id)->orderBy('create_date', 'asc')
            ->get();

        return view('kids::front.kids.favorites.show',
            compact('kid', 'favorites'));
    }

    public function create(Kid $kid): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('kids::front.kids.favorites.create',
            compact('kid',));
    }

    public function store(Kid $kid, FavoriteRequest $request): \Illuminate\Http\RedirectResponse
    {
        try {
            Favorite::create([
                'kid_id' => $kid->id,
                'customer_id' => Auth::guard('customer')->id(),

                'frist_instruction' => $request->firstInstruction,
                'second_instruction' => $request->secondInstruction,
                'third_instruction' => $request->thirdInstruction,
                'fourth_instruction' => $request->fourthInstruction,

                'frist_name' => $request->firstTitle,
                'second_name' => $request->secondTitle,
                'third_name' => $request->thirdTitle,
                'fourth_name' => $request->fourthTitle,
                'fifth_name' => $request->fifthTitle,
                'sixth_name' => $request->sixthTitle,

                'frist_percentage' => Str::replace('%', '', $request->firstVal) ?? 0,
                'second_percentage' => Str::replace('%', '', $request->secondVal) ?? 0,
                'third_percentage' => Str::replace('%', '', $request->thirdVal) ?? 0,
                'fourth_percentage' => Str::replace('%', '', $request->fourthVal) ?? 0,
                'fifth_percentage' => Str::replace('%', '', $request->fifthVal) ?? 0,
                'sixth_percentage' => Str::replace('%', '', $request->sixthVal) ?? 0,

                'create_date' => Carbon::now(),
            ]);

            Alert::success('عملية ناجحة', 'تم الإضافة');
            return redirect()->route('kids.evaluate.favorites.index', $kid->id);

        } catch (\Exception $e) {
//            dd($e);
            Alert::warning('not found ', 'حدث خطا ما يجب التحقق');
            return redirect()->back();
        }
    }

    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $favorite = Favorite::whereId($request->favorite)->first();
            if (!$favorite) {

                Alert::warning('not found ', 'حدث خطا ما يجب التحقق');
                return redirect()->back();
            }

            $favorite->update([
                'create_date' => Carbon::parse($request->date)->format('Y-m-d'),
            ]);
            Alert::success('عملية ناجحة', 'تم التعديل بنجاح');
            return redirect()->back();
        } catch (\Exception $e) {
//            dd($e);
            Alert::warning('not found ', 'حدث خطا ما يجب التحقق');
            return redirect()->back();
        }
    }

    public function destroy(Favorite $favorite): \Illuminate\Http\RedirectResponse
    {
        try {
            $favorite->delete();

            Alert::success('عملية ناجحة', 'تم المسح');
            return redirect()->route('kids.evaluate.favorites.show', $favorite->kid_id);
        } catch (\Exception $e) {
            Alert::warning('not found ', 'حدث خطا ما يجب التحقق');
            return redirect()->back();
        }
    }
}


