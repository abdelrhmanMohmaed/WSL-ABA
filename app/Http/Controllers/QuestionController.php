<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Common_Question;
use Session;
use RealRashid\SweetAlert\Facades\Alert;

class QuestionController extends Controller
{
    # index
    public function Index()
    {
        $data = Common_Question::latest()->get();
        return view('questions.questions',compact('data'));
    }

    # store
    public function Store(Request $request)
    {
        $this->validate($request,[
            'question_ar'   => 'required',
            'question_en'   => 'required',
            'answer_ar'     => 'required',
            'answer_en'     => 'required',
            'type'          => 'required'
        ]);

        $data = new Common_Question;
        $data->question_ar = $request->question_ar;
        $data->question_en = $request->question_en;
        $data->answer_ar   = $request->answer_ar;
        $data->answer_en   = $request->answer_en;
        $data->type        = $request->type;
        $data->save();

        MakeReport('بإضافة سؤال جديد '.$data->question_ar);
        Alert::success('success','تم الحفظ');
        return back();
    }

    # update
    public function Update(Request $request)
    {
        $this->validate($request,[
            'edit_question_ar'   => 'required',
            'edit_question_en'   => 'required',
            'edit_answer_ar'     => 'required',
            'edit_answer_en'     => 'required',
            'edit_type'          => 'required'
        ]);

        $data = Common_Question::where('id',$request->edit_id)->first();
        $data->question_ar = $request->edit_question_ar;
        $data->question_en = $request->edit_question_en;
        $data->answer_ar   = $request->edit_answer_ar;
        $data->answer_en   = $request->edit_answer_en;
        $data->type        = $request->edit_type;
        $data->save();

        MakeReport('بتحديث سؤال جديد '.$data->question_ar);
        Alert::success('success','تم الحفظ');
        return back();
    }

    # delete
    public function Delete($id)
    {
        $data = Common_Question::where('id',$id)->first();
        MakeReport('بحذف سؤال جديد '.$data->question_ar);
        Alert::success('success','تم الحذف');
        $data->delete();
        return back();
    }
}
