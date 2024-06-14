<?php

namespace Modules\Kids\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KidRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            # Kids
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'num' => ['required', 'numeric', 'digits:10'],
            'date' => ['required', 'date', 'date_format:Y-m-d'],
            'place_date' => ['required', 'string'],
            'gender' => ['required', 'in:0,1'],
            'nationality' => ['required', 'string'],
            'country_id' => ['required', 'integer', 'exists:countries,id'],
            'city_id' => ['required', 'integer', 'exists:cities,id'],
            'phone' => ['required'],

            'other_obstruction' => ['required', 'in:0,1'],
            'other_obstruction_com' => ["required_if:other_obstruction,==,1"],
            'chronic_diseases' => ['required', 'in:0,1'],
            'chronic_diseases_com' => ["required_if:chronic_diseases,==,1"],
            'genetic_diseases' => ['required', 'in:0,1'],
            'genetic_diseases_com' => ["required_if:genetic_diseases,==,1"],
            'health_problems' => ['required', 'in:0,1'],
            'health_problems_com' => ['required_if:health_problems,==,1'],
            'growth_stage' => ['required', 'in:0,1'],
            'growth_stage_com' => ['required_if:growth_stage,==,1'],

            # Dad
            'dad_name' => ['nullable', 'string', 'min:3'],
            'dad_num' => ['nullable', 'numeric', 'digits:10'],
            'dad_date' => ['nullable', 'date', 'date_format:Y-m-d'],
            'dad_marital_status' => ['nullable', 'in:married,divorce,Widower'],
            'dad_phone' => ['nullable'],
            'dad_learning' => ['nullable', 'in:none,primary,middle,secondary,diploma,Bachelor,Master,doctor'],
            'dad_work' => ['nullable', "in:public_work,private_work,free_work,don't_work"],

            'dad_smoking' => ['nullable', 'in:0,1'],
            'dad_obstruction' => ['nullable', 'in:0,1'],
            'dad_obstruction_com' => ["required_if:dad_obstruction,==,1"],
            'dad_chronic_diseases' => ['nullable', 'in:0,1'],
            'dad_chronic_diseases_com' => ["required_if:dad_chronic_diseases,==,1"],
            'dad_genetic_diseases' => ['nullable', 'in:0,1'],
            'dad_genetic_diseases_com' => ['required_if:dad_genetic_diseases,==,1'],
            'dad_mental_state' => ['nullable', 'in:0,1'],
            'dad_mental_state_com' => ['required_if:dad_mental_state,==,1'],
            'dad_health_problems' => ['nullable', 'in:0,1'],
            'dad_health_problems_com' => ['required_if:dad_health_problems,==,1'],
            'dad_communication' => ['nullable'],
            'dad_communication_com' => ['nullable', 'string'],

            # mom
            'mom_name' => ['nullable', 'string', 'min:3'],
            'mom_num' => ['nullable', 'numeric', 'digits:10'],
            'mom_date' => ['nullable', 'date', 'date_format:Y-m-d'],
            'mom_marital_status' => ['nullable', 'in:married,divorce,Widower'],
            'mom_phone' => ['nullable'],
            'mom_learning' => ['nullable', 'in:none,primary,middle,secondary,diploma,Bachelor,Master,doctor'],
            'mom_work' => ['nullable', "in:public_work,private_work,free_work,don't_work"],

            'mom_smoking' => ['nullable', 'in:0,1'],
            'mom_obstruction' => ['nullable', 'in:0,1'],
            'mom_obstruction_com' => ["required_if:mom_obstruction,==,1"],
            'mom_chronic_diseases' => ['nullable', 'in:0,1'],
            'mom_chronic_diseases_com' => ["required_if:mom_chronic_diseases,==,1"],
            'mom_genetic_diseases' => ['nullable', 'in:0,1'],
            'mom_genetic_diseases_com' => ['required_if:mom_genetic_diseases,==,1'],
            'mom_mental_state' => ['nullable', 'in:0,1'],
            'mom_mental_state_com' => ['required_if:mom_mental_state,==,1'],
            'mom_health_problems' => ['nullable', 'in:0,1'],
            'mom_health_problems_com' => ['required_if:mom_health_problems,==,1'],
            'mom_communication' => ['nullable'],
            'mom_communication_com' => ['nullable', 'string'],

            'mom_pregnancy' => ['nullable', 'in:0,1,2'],
            'mom_pregnancy_com' => ["required_if:mom_pregnancy,==,1"],
            'mom_pregnancy_month' => ['nullable', 'in:7,8,9,10'],
            'mom_pregnancy_problems' => ['nullable', 'in:0,1'],
            'mom_pregnancy_problems_com' => ["required_if:mom_pregnancy_problems,==,1"],
            'mom_birth_status' => ['nullable', 'in:0,1'],
            'mom_birth_problems' => ['nullable', 'in:0,1'],
            'mom_birth_problems_com' => ["required_if:mom_birth_problems,==,1"],
            'mom_birth_after_problems' => ['nullable', 'in:0,1'],
            'mom_birth_after_problems_com' => ["required_if:mom_birth_after_problems,==,1"],
            'mom_lactation' => ['nullable', 'in:0,1'],

            # Family
            'family_num_of' => ['nullable'],
            'family_num_of_pro' => ['nullable'],
            'family_num_of_sis' => ['nullable'],
            'family_sort_of' => ['nullable'],
            'family_bro_autism' => ['nullable'],
            'family_has_twins' => ['nullable'],
            'family_marital_status' => ['nullable'],
            'family_with_live' => ['nullable'],
            'family_with_live_com' => ['required_if:family_with_live,==,other'],
            'family_income' => ['nullable'],
        ];

    }

    public function messages(): array
    {
        return [
            #Kid
            'num.required' => 'رقم هوية الطفل مطلوبه',
            'num.digits' => 'رقم الهوية الطفل يجب ان يتكون مكونه من 10 رقم',
            'date.required' => 'تاريخ ميلادالطفل مطلوب.',
            'place_date.required' => 'مكان الميلاد مطلوبه',
            'nationality.required' => 'الجنسية مطلوبة',
            'country_id.required' => 'الدولة مطلوبه',
            'city_id.required' => 'المدينة مطلوبه',
            'city_id.exists' => 'المدينة يجب ان تكون تندرج تحت الجنسية مطلوبه',
            'tel.required' => 'رقم التواصل مطلوب',
//            'area.required' => 'منطقة السكن مطلوبه',

            'other_obstruction.required' => 'سوال اعاقات أخرى مطلوب',
            'other_obstruction_com.required_if' => 'تعليق سوال اعاقات أخرى مطلوب',
            'chronic_diseases.required' => 'سوال أمراض مزمنة مطلوب',
            'chronic_diseases_com.required_if' => 'تعليق سوال أمراض مزمنة مطلوب',
            'genetic_diseases.required' => 'سوال أمراض وراثية مطلوب',
            'genetic_diseases_com.required_if' => 'تعليق سوال أمراض وراثية مطلوب',
            'health_problems.required' => 'سوال مشاكل صحية أخرى مطلوب',
            'health_problems_com.required_if' => 'تعليق سوال مشاكل صحية أخرى مطلوب',
            'growth_stage.required' => 'سوال مراحل النمو مطلوب',
            'growth_stage_com.required_if' => 'تعليق سوال مراحل النمو مطلوب',
            # Dad
            'dad_name.required' => 'اسم الاب مطلوبه',
            'dad_num.required' => 'رقم هويةالاب مطلوبه',
            'dad_num.digits' => 'رقم هويةالاب يجب ان يتكون مكونه من 10 رقم',
            'dad_date.required' => 'تاريخ ميلادالاب مطلوب.',
            'dad_date.date_format' => 'لا يتوافق تاريخ ميلادالاب مع الشكل Y-m-d.',
            'dad_marital_status.required' => 'الحالة الاجتماعية للاب مطلوبه',
            'dad_phone.required' => 'رقم التواصل مع الاب مطلوبه',
            'dad_learning.required' => 'المستوى التعليمي للاب مطلوبه',
            'dad_work.required' => 'طبيعة عمل الاب مطلوبه',
            'dad_smoking.required' => 'سوال هل الأب مدخن مطلوب',

            'dad_obstruction.required' => 'سوال هل لدى الأب إعاقة مطلوب',
            'dad_obstruction_com.required_if' => 'تعليق سوال هل لدى الأب إعاقة مطلوب',
            'dad_chronic_diseases.required' => 'سوال هل يعاني الأب من أمراض مزمنة مطلوب',
            'dad_chronic_diseases_com.required_if' => 'تعليق سوال هل يعاني الأب من أمراض مزمنة مطلوب',
            'dad_genetic_diseases.required' => 'سوال هل يعاني الأب من أمراض وراثية مطلوب',
            'dad_genetic_diseases_com.required_if' => 'تعليق سوال هل يعاني الأب من أمراض وراثية مطلوب',
            'dad_mental_state.required' => 'سوال ما هي الحالة النفسية للأب مطلوب',
            'dad_mental_state_com.required_if' => 'تعليق سوال ما هي الحالة النفسية للأب مطلوب',
            'dad_health_problems.required' => 'سوال هل يعاني الأب من مشاكل صحية أخرى مطلوب',
            'dad_health_problems_com.required_if' => 'تعليق سوال هل يعاني الأب من مشاكل صحية أخرى مطلوب',
            'dad_communication.required' => 'سوال ما هي درجة تواصل الأب مع الطفل',
            'dad_communication_com.string' => 'تعليق سوال ما هي درجة تواصل الأب مع الطفل يجب ادخالها حروف وارقام',

            # Mom
            'mom_name.required' => 'اسم الام مطلوب',
            'mom_num.required' => 'رقم هوية الام مطلوبه',
            'mom_num.digits' => 'رقم هويةالام يجب ان يتكون مكونه من 10 رقم',
            'mom_date.required' => 'تاريخ ميلاد الام مطلوب.',
            'mom_date.date_format' => 'لا يتوافق تاريخ ميلاد الام مع الشكل Y-m-d.',
            'mom_marital_status.required' => 'الحالة الاجتماعية للام مطلوبه',
            'mom_phone.required' => 'رقم التواصل مع الام مطلوبه',
            'mom_learning.required' => 'المستوى التعليمي للام مطلوبه',
            'mom_work.required' => 'طبيعة عمل الام مطلوبه',
            'mom_smoking.required' => 'سوال هل الام مدخنة مطلوب',

            'mom_obstruction.required' => 'سوال هل لدى الام إعاقة مطلوب',
            'mom_obstruction_com.required_if' => 'تعليق سوال هل لدى الام إعاقة مطلوب',
            'mom_chronic_diseases.required' => 'سوال هل تعاني الام من أمراض مزمنة مطلوب',
            'mom_chronic_diseases_com.required_if' => 'تعليق سوال هل تعاني الام من أمراض مزمنة مطلوب',
            'mom_genetic_diseases.required' => 'سوال هل تعاني الام من أمراض وراثية مطلوب',
            'mom_genetic_diseases_com.required_if' => 'تعليق سوال هل تعاني الام من أمراض وراثية مطلوب',
            'mom_mental_state.required' => 'سوال ما هي الحالة النفسية للام مطلوب',
            'mom_mental_state_com.required_if' => 'تعليق سوال ما هي الحالة النفسية للام مطلوب',
            'mom_health_problems.required' => 'سوال هل تعاني الام من مشاكل صحية أخرى مطلوب',
            'mom_health_problems_com.required_if' => 'تعليق سوال هل تعاني الام من مشاكل صحية أخرى مطلوب',
            'mom_communication.required' => 'سوال ما هي درجة تواصل الام مع الطفل',
            'mom_communication_com.string' => 'تعليق سوال ما هي درجة تواصل الام مع الطفل يجب ادخالها حروف وارقام',

            'mom_pregnancy.required' => 'سوال هل الحمل بالطفل كان ( طبيعي, أطفال أنابيب, أخرى) مطلوب',
            'mom_pregnancy.required_if' => 'تعليق سوال هل الحمل بالطفل كان ( طبيعي, أطفال أنابيب, أخرى) مطلوب',
            'mom_pregnancy_month.required' => 'سوال كم كانت أشهر الحمل بالطفل مطلوب',
            'mom_pregnancy_problems.required' => 'سوال هل كانت هناك مشاكل صحية أثناء الحمل مطلوب',
            'mom_pregnancy_problems_com.required_if' => 'تعليق سوال هل كانت هناك مشاكل صحية أثناء الحمل مطلوب',
            'mom_birth_status.required' => 'سوال هل كانت ولادة الطفل ( طبيعية, قيصرية) مطلوب',
            'mom_birth_problems.required' => 'سوال هل كانت هناك مشاكل أثناء الولادة مطلوب',
            'mom_birth_problems_com.required_if' => 'تعليق سوال هل كانت هناك مشاكل أثناء الولادة مطلوب',
            'mom_birth_after_problems.required' => 'سوال هل كانت هناك مشاكل بعد الولادة مطلوب',
            'mom_birth_after_problems_com.required_if' => 'تعليق سوال هل كانت هناك مشاكل بعد الولادة مطلوب',
            'mom_lactation.required' => 'سوال هل الرضاعة كانت طبيعية مطلوب',

            # Family
            'family_num_of.required' => 'عدد أفراد الاسره مطلوب',
            'family_num_of_pro.required' => 'عدد الأشقاء الذكور مطلوب',
            'family_num_of_sis.required' => 'عدد الأشقاء الاناث مطلوب',
            'family_sort_of.required' => 'ترتيب الطفل بين أشقاءه مطلوب',
            'family_bro_autism.required' => 'سوال هل لدى الطفل شقيق يعاني من التوحد مطلوب',
            'family_has_twins.required' => 'سوال هل لدى الطفل توأم مطلوب',
            'family_marital_status.required' => 'سوال الحالة الاجتماعية للأسرة مطلوب',
            'family_with_live.required' => 'سوال مع من يسكن الطفل مطلوب',
            'family_with_live_com.required_if' => 'تعليق مع من يسكن الطفل مطلوب',
            'family_income.required' => 'سوال متوسط دخل الأسرة الشهري مطلوب',

        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }
}
