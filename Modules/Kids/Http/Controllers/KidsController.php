<?php


namespace Modules\Kids\Http\Controllers;

use App\Http\Traits\KidsTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Modules\Kids\Http\Requests\KidRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Country;
use App\Models\City;
use Modules\Kids\Entities\Kid;
use Modules\Kids\Entities\Dad;
use Modules\Kids\Entities\Mom;
use Modules\Kids\Entities\Family;
use PDF;

class KidsController extends Controller
{
    use KidsTrait;

    public function test(Kid $kid)
    {
//
//        $kid =Kid::where('id',$kid)->first();
//        dd($kid);

//        $pdf = PDF::loadView('kids::front.test2',compact('kid'));
//        return $pdf->stream('document.pdf');


        return \view('kids::front.test2',compact('kid'));
    }
    public function __construct()
    {
        View::share([
            'countries' => Country::get(),
            'cities' => City::get(),
        ]);
    }

    public function index(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $cities = City::get();
        $countries = Country::get();

        if ($request->hasAny(['name', 'num', 'date', 'gender', 'country_id', 'city_id'])) {

            $kids = $this->filterKids($request);
        } else {
            $kids = Kid::
                // where('doctor_id',auth()->user()->id)->
            get();
        }

        return view('kids::front.kids.index',
            compact('kids', 'cities', 'countries'));
    }

    public function show(Kid $kid): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        return view('kids::front.kids.show',
            compact('kid'));
    }

    public function details(Kid $kid): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('kids::front.kids.details',
            compact('kid'));
    }

    public function create(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        return view('kids::front.kids.create');
    }

    public function getCities(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        if (!$request->ajax()) {
            abort(403);
        }

        $cities = City::where('country_id', $request->country)->latest()->get();

        return view('kids::front.kids.partials.cities',
            compact('cities'));
    }

    public function store(KidRequest $request)
    {
        DB::beginTransaction();
        try {
            $validatedData = $request->validated();

            $kid = new Kid;
            $kid->doctor_id = Auth::guard('customer')->id();
            $kid->city_id = $validatedData['city_id'];
            $kid->country_id = $validatedData['country_id'];
            $kid->name = $validatedData['name'];
            $kid->num = $validatedData['num'];
            $kid->date = $validatedData['date'];
            $kid->place_date = $validatedData['place_date'];
            $kid->area = $validatedData['area'];
            $kid->gender = $validatedData['gender'];
            $kid->other_obstruction = $validatedData['other_obstruction'];
            $kid->other_obstruction_com = $validatedData['other_obstruction_com'] ?? null;
            $kid->chronic_diseases = $validatedData['chronic_diseases'];
            $kid->chronic_diseases_com = $validatedData['chronic_diseases_com'] ?? null;
            $kid->genetic_diseases = $validatedData['genetic_diseases'];
            $kid->genetic_diseases_com = $validatedData['genetic_diseases_com'] ?? null;
            $kid->health_problems = $validatedData['health_problems'];
            $kid->health_problems_com = $validatedData['health_problems_com'] ?? null;
            $kid->growth_stage = $validatedData['growth_stage'];
            $kid->growth_stage_com = $validatedData['growth_stage_com'] ?? null;
            $kid->save();

            $dad = new Dad;
            $dad->kid_id = $kid->id;
            $dad->name = $validatedData['dad_name'];
            $dad->num = $validatedData['dad_num'];
            $dad->date = $validatedData['dad_date'];
            $dad->marital_status = $validatedData['dad_marital_status'];
            $dad->phone = $validatedData['dad_phone'];
            $dad->learning = $validatedData['dad_learning'];
            $dad->work = $validatedData['dad_work'];
            $dad->smoking = $validatedData['dad_smoking'];
            $dad->obstruction = $validatedData['dad_obstruction'];
            $dad->obstruction_com = $validatedData['dad_obstruction_com'] ?? null;
            $dad->chronic_diseases = $validatedData['dad_chronic_diseases'];
            $dad->chronic_diseases_com = $validatedData['dad_chronic_diseases_com'] ?? null;
            $dad->genetic_diseases = $validatedData['dad_genetic_diseases'];
            $dad->genetic_diseases_com = $validatedData['dad_genetic_diseases_com'] ?? null;
            $dad->mental_state = $validatedData['dad_mental_state'];
            $dad->mental_state_com = $validatedData['dad_mental_state_com'] ?? null;
            $dad->health_problems = $validatedData['dad_health_problems'];
            $dad->health_problems_com = $validatedData['dad_health_problems_com'] ?? null;
            $dad->communication = $validatedData['dad_communication'];
            $dad->communication_com = $validatedData['dad_communication_com'] ?? null;
            $dad->save();

            $mom = new Mom;
            $mom->kid_id = $kid->id;
            $mom->name = $validatedData['mom_name'];
            $mom->num = $validatedData['mom_num'];
            $mom->date = $validatedData['mom_date'];
            $mom->marital_status = $validatedData['mom_marital_status'];
            $mom->phone = $validatedData['mom_phone'];
            $mom->learning = $validatedData['mom_learning'];
            $mom->work = $validatedData['mom_work'];
            $mom->smoking = $validatedData['mom_smoking'];
            $mom->obstruction = $validatedData['mom_obstruction'];
            $mom->obstruction_com = $validatedData['mom_obstruction_com'] ?? null;
            $mom->chronic_diseases = $validatedData['mom_chronic_diseases'];
            $mom->chronic_diseases_com = $validatedData['mom_chronic_diseases_com'] ?? null;
            $mom->genetic_diseases = $validatedData['mom_genetic_diseases'];
            $mom->genetic_diseases_com = $validatedData['mom_genetic_diseases_com'] ?? null;
            $mom->health_problems = $validatedData['mom_health_problems'];
            $mom->health_problems_com = $validatedData['mom_health_problems_com'] ?? null;
            $mom->mental_state = $validatedData['mom_mental_state'];
            $mom->mental_state_com = $validatedData['mom_mental_state_com'] ?? null;
            $mom->communication = $validatedData['mom_communication'];
            $mom->communication_com = $validatedData['mom_communication_com'] ?? null;
            $mom->pregnancy = $validatedData['mom_pregnancy'];
            $mom->pregnancy_com = $validatedData['mom_pregnancy_com'] ?? null;
            $mom->pregnancy_month = $validatedData['mom_pregnancy_month'];
            $mom->pregnancy_problems = $validatedData['mom_pregnancy_problems'];
            $mom->pregnancy_problems_com = $validatedData['mom_pregnancy_problems_com'] ?? null;
            $mom->birth_status = $validatedData['mom_birth_status'];
            $mom->birth_problems = $validatedData['mom_birth_problems'];
            $mom->birth_problems_com = $validatedData['mom_birth_problems_com'] ?? null;
            $mom->birth_after_problems = $validatedData['mom_birth_after_problems'];
            $mom->birth_after_problems_com = $validatedData['mom_birth_after_problems_com'] ?? null;
            $mom->lactation = $validatedData['mom_lactation'];
            $mom->save();

            $family = new Family;
            $family->kid_id = $kid->id;
            $family->num_of = $validatedData['family_num_of'];
            $family->num_of_pro = $validatedData['family_num_of_pro'];
            $family->num_of_sis = $validatedData['family_num_of_sis'];
            $family->sort_of = $validatedData['family_sort_of'];
            $family->bro_autism = $validatedData['family_bro_autism'];
            $family->has_twins = $validatedData['family_has_twins'];
            $family->with_live = $validatedData['family_with_live'];
            $family->marital_status = $validatedData['family_marital_status'];
            $family->income = $validatedData['family_income'];
            $family->save();

            DB::commit();

            if ($request->input('submit') === 'saveDataBtn1') {

                Alert::success('عملية ناجحة', 'تم الإضافة');
                return redirect()->route('kids.index')
                    ->withSuccess(__('patient Added successfully.'));
            } else {

                Alert::success('عملية ناجحة', 'تم الإضافة');
                return redirect()->route('kids.create')
                    ->withSuccess(__('patient Added successfully.'));
            }

        } catch (\Exception $e) {
            DB::rollBack();

            Alert::warning('not found ', 'حدث خطا ما يجب التحقق');
            return redirect()->back();
        }
    }

    public function edit(Kid $kid): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('kids::front.kids.edit',
            compact('kid'));
    }

    public function update(Kid $kid, KidRequest $request): \Illuminate\Http\RedirectResponse
    {
        DB::beginTransaction();
        try {
            $validatedData = $request->validated();

            $kid->city_id = $validatedData['city_id'];
            $kid->country_id = $validatedData['country_id'];
            $kid->name = $validatedData['name'];
            $kid->num = $validatedData['num'];
            $kid->date = $validatedData['date'];
            $kid->place_date = $validatedData['place_date'];
            $kid->area = $validatedData['area'];
            $kid->gender = $validatedData['gender'];
            $kid->other_obstruction = $validatedData['other_obstruction'];
            $kid->other_obstruction_com = $validatedData['other_obstruction_com'] ?? null;
            $kid->chronic_diseases = $validatedData['chronic_diseases'];
            $kid->chronic_diseases_com = $validatedData['chronic_diseases_com'] ?? null;
            $kid->genetic_diseases = $validatedData['genetic_diseases'];
            $kid->genetic_diseases_com = $validatedData['genetic_diseases_com'] ?? null;
            $kid->health_problems = $validatedData['health_problems'];
            $kid->health_problems_com = $validatedData['health_problems_com'] ?? null;
            $kid->growth_stage = $validatedData['growth_stage'];
            $kid->growth_stage_com = $validatedData['growth_stage_com'] ?? null;
            $kid->save();

            $dad = Dad::where('kid_id', $kid->id)->first();
            $dad->name = $validatedData['dad_name'];
            $dad->num = $validatedData['dad_num'];
            $dad->date = $validatedData['dad_date'];
            $dad->marital_status = $validatedData['dad_marital_status'];
            $dad->phone = $validatedData['dad_phone'];
            $dad->learning = $validatedData['dad_learning'];
            $dad->work = $validatedData['dad_work'];
            $dad->smoking = $validatedData['dad_smoking'];
            $dad->obstruction = $validatedData['dad_obstruction'];
            $dad->obstruction_com = $validatedData['dad_obstruction_com'] ?? null;
            $dad->chronic_diseases = $validatedData['dad_chronic_diseases'];
            $dad->chronic_diseases_com = $validatedData['dad_chronic_diseases_com'] ?? null;
            $dad->genetic_diseases = $validatedData['dad_genetic_diseases'];
            $dad->genetic_diseases_com = $validatedData['dad_genetic_diseases_com'] ?? null;
            $dad->mental_state = $validatedData['dad_mental_state'];
            $dad->mental_state_com = $validatedData['dad_mental_state_com'] ?? null;
            $dad->health_problems = $validatedData['dad_health_problems'];
            $dad->health_problems_com = $validatedData['dad_health_problems_com'] ?? null;
            $dad->communication = $validatedData['dad_communication'];
            $dad->communication_com = $validatedData['dad_communication_com'] ?? null;
            $dad->save();

            $mom = Mom::where('kid_id', $kid->id)->first();
            $mom->name = $validatedData['mom_name'];
            $mom->num = $validatedData['mom_num'];
            $mom->date = $validatedData['mom_date'];
            $mom->marital_status = $validatedData['mom_marital_status'];
            $mom->phone = $validatedData['mom_phone'];
            $mom->learning = $validatedData['mom_learning'];
            $mom->work = $validatedData['mom_work'];
            $mom->smoking = $validatedData['mom_smoking'];
            $mom->obstruction = $validatedData['mom_obstruction'];
            $mom->obstruction_com = $validatedData['mom_obstruction_com'] ?? null;
            $mom->chronic_diseases = $validatedData['mom_chronic_diseases'];
            $mom->chronic_diseases_com = $validatedData['mom_chronic_diseases_com'] ?? null;
            $mom->genetic_diseases = $validatedData['mom_genetic_diseases'];
            $mom->genetic_diseases_com = $validatedData['mom_genetic_diseases_com'] ?? null;
            $mom->health_problems = $validatedData['mom_health_problems'];
            $mom->health_problems_com = $validatedData['mom_health_problems_com'] ?? null;
            $mom->mental_state = $validatedData['mom_mental_state'];
            $mom->mental_state_com = $validatedData['mom_mental_state_com'] ?? null;
            $mom->communication = $validatedData['mom_communication'];
            $mom->communication_com = $validatedData['mom_communication_com'] ?? null;
            $mom->pregnancy = $validatedData['mom_pregnancy'];
            $mom->pregnancy_com = $validatedData['mom_pregnancy_com'] ?? null;
            $mom->pregnancy_month = $validatedData['mom_pregnancy_month'];
            $mom->pregnancy_problems = $validatedData['mom_pregnancy_problems'];
            $mom->pregnancy_problems_com = $validatedData['mom_pregnancy_problems_com'] ?? null;
            $mom->birth_status = $validatedData['mom_birth_status'];
            $mom->birth_problems = $validatedData['mom_birth_problems'];
            $mom->birth_problems_com = $validatedData['mom_birth_problems_com'] ?? null;
            $mom->birth_after_problems = $validatedData['mom_birth_after_problems'];
            $mom->birth_after_problems_com = $validatedData['mom_birth_after_problems_com'] ?? null;
            $mom->lactation = $validatedData['mom_lactation'];
            $mom->save();

            $family = Family::where('kid_id', $kid->id)->first();
            $family->num_of = $validatedData['family_num_of'];
            $family->num_of_pro = $validatedData['family_num_of_pro'];
            $family->num_of_sis = $validatedData['family_num_of_sis'];
            $family->sort_of = $validatedData['family_sort_of'];
            $family->bro_autism = $validatedData['family_bro_autism'];
            $family->has_twins = $validatedData['family_has_twins'];
            $family->with_live = $validatedData['family_with_live'];
            $family->marital_status = $validatedData['family_marital_status'];
            $family->income = $validatedData['family_income'];
            $family->save();

            DB::commit();

            Alert::success('عملية ناجحة', 'تم التعديل');
            return redirect()->route('kids.index');
        } catch (\Exception $e) {
            DB::rollBack();

            Alert::warning('not found ', 'حدث خطا ما يجب التحقق');
            return redirect()->back();
        }
    }

    public function destroy(Kid $kid): \Illuminate\Http\RedirectResponse
    {
        try {
            $kid->delete();
            Alert::success('عملية ناجحة', 'تم المسح');
            return redirect()->route('kids.index');
        } catch (\Exception $e) {

            Alert::warning('not found ', 'حدث خطا ما يجب التحقق');
            return redirect()->back();
        }
    }

   }
