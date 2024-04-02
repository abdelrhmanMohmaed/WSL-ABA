<div id="motherMenuEdit" class="container tab-pane fade">
    <br/>

    <div class="text-data">
        <div class="form-title">
            <img src="{{asset('dist/front/assets/images/personal-information.jpg')}}"/>
            <h3>بيانات أساسية</h3>
        </div>

        <div class="form-group">
            <label>الاسم كاملاً </label>
            <input type="text" class="form-control" name="mom_name" value="{{$kid->mom->name}}"/>
            @error('mom_name')
            <span class="text-danger">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                       {{ $message }}
                 </span>
            @enderror
        </div>

        <div class="form-group">
            <label>رقم الهوية</label>
            <input type="number" class="form-control" name="mom_num" value="{{$kid->mom->num}}"/>
            @error('mom_num')
            <span class="text-danger">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                       {{ $message }}
                 </span>
            @enderror
        </div>

        <div class="form-group form-date" style="position:relative">
            <label> تاريخ الميلاد</label>

            <input class="form-control datePicker" type="text" name="mom_date" value="{{$kid->mom->date}}"/>
            <img src="{{asset('dist/front/assets/images/calender.png')}}"
                 class="datepickerimg" width="20px" alt="">
            @error('mom_date')
            <span class="text-danger">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                       {{ $message }}
                 </span>
            @enderror
        </div>

        <div class="form-group">
            <label>الحالة الاجتماعية</label>
            <select name="mom_marital_status" class="form-control">
                <option disabled>اختر الحالة الاجتماعية...</option>

                <option value="married"
                        @if($kid->mom->marital_status == 'married') selected @endif>
                    متزوج
                </option>
                <option value="divorce"
                        @if($kid->mom->marital_status == 'divorce') selected @endif>
                    مطلق
                </option>
                <option value="Widower"
                        @if($kid->mom->marital_status == 'Widower') selected @endif>
                    أرمل
                </option>
            </select>
            @error('mom_marital_status')
            <span class="text-danger">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                       {{ $message }}
                 </span>
            @enderror
        </div>

        <div class="form-group">
            <label> رقم التواصل</label>
            <input type="phone" class="form-control" name="mom_phone" value="{{$kid->mom->phone}}"/>
            @error('mom_phone')
            <span class="text-danger">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                       {{ $message }}
                 </span>
            @enderror
        </div>

        <div class="form-group">
            <label>المستوى التعليمي</label>
            <select name="mom_learning" class="form-control">
                <option disabled>اختر المستوى التعليمي...</option>
                <option value="none" @if($kid->mom->learning == 'none') selected @endif>
                    أمّي
                </option>
                <option value="primary"
                        @if($kid->mom->learning == 'primary') selected @endif>
                    ابتدائي
                </option>
                <option value="middle" @if($kid->mom->learning == 'middle') selected @endif>
                    متوسط
                </option>
                <option value="secondary"
                        @if($kid->mom->learning == 'secondary') selected @endif>
                    ثانوي
                </option>
                <option value="diploma"
                        @if($kid->mom->learning == 'diploma') selected @endif>دبلوم
                </option>
                <option value="Bachelor"
                        @if($kid->mom->learning == 'Bachelor') selected @endif>
                    بكالوريس
                </option>
                <option value="Master" @if($kid->mom->learning == 'Master') selected @endif>
                    ماجستير
                </option>
                <option value="doctor" @if($kid->mom->learning == 'doctor') selected @endif>
                    دكتوراه
                </option>
            </select>
            @error('mom_learning')
            <span class="text-danger">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                       {{ $message }}
                 </span>
            @enderror
        </div>

        <div class="form-group">
            <label> طبيعة العمل</label>
            <select name="mom_work" class="form-control">
                <option disabled>اختر طبيعة العمل...</option>
                <option value="public_work"
                        @if($kid->mom->work == 'public_work') selected @endif>
                    موظف حكومي
                </option>
                <option value="private_work"
                        @if($kid->mom->work == 'private_work') selected @endif>
                    موظف قطاع خاص
                </option>
                <option value="free_work"
                        @if($kid->mom->work == 'free_work') selected @endif >
                    أعمال حرة
                </option>
                <option value="don't_work"
                        @if($kid->mom->work == "don't_work") selected @endif>
                    لا يعمل
                </option>
            </select>
            @error('mom_work')
            <span class="text-danger">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                       {{ $message }}
                 </span>
            @enderror
        </div>
    </div>

    <div class="text-data">
        <div class="form-title">
            <img src="{{asset('dist/front/assets/images/medical 1.jpg')}}"/>
            <h3>بيانات صحية</h3>
        </div>

        <!-- mom_smoking -->
        <div class="medical-data w-100"
             @error('mom_smoking')
             style="border-color: red"
            @enderror
        >
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title ">
                    <h4>هل الأم مدخنة</h4>
                </div>
                <div class="custom-control custom-radio ">
                    <input
                        type="radio"
                        class="custom-control-input"
                        value="1"
                        name="mom_smoking"
                        @if($kid->mom->smoking == '1') checked @endif
                    />
                    <label class="custom-control-label"> نعم </label>

                    <input
                        type="radio"
                        class="custom-control-input"
                        value="0"
                        name="mom_smoking"
                        @if($kid->mom->smoking == '0') checked @endif
                    />
                    <label class="custom-control-label">لا</label>
                </div>
            </div>
        </div>

        <!-- mom_obstruction -->
        <div class="medical-data w-100"
             @error('mom_obstruction')
             style="border-color: red"
             @enderror
             @error('mom_obstruction_com')
             style="border-color: red"
            @enderror
        >
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل لدى الأم إعاقة</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input
                        type="radio"
                        class="custom-control-input comment-tab"
                        value="1"
                        name="mom_obstruction"
                        @if($kid->mom->obstruction == '1') checked @endif
                    />
                    <label class="custom-control-label"> نعم </label>

                    <input
                        type="radio"
                        class="custom-control-input"
                        value="0"
                        name="mom_obstruction"
                        @if($kid->mom->obstruction == '0') checked @endif

                    />
                    <label class="custom-control-label">لا</label>
                </div>
            </div>
            <div class="comment">
                <input type="text" class="form-control"
                       placeholder="أذكر التعليق هنا..." name="mom_obstruction_com"
                       id="comment"
                       value="{{$kid->mom->obstruction_com}}"
                       style="{{ $kid->mom->obstruction != null && $kid->mom->obstruction == 1 ? '' : 'visibility: hidden;' }}"
                    {{ $kid->mom->obstruction != null && $kid->mom->obstruction == 1 ? '' : 'disabled' }} />
            </div>
        </div>

        <!-- mom_chronic_diseases -->
        <div class="medical-data w-100"
             @error('mom_chronic_diseases')
             style="border-color: red"
             @enderror
             @error('mom_chronic_diseases_com')
             style="border-color: red"
            @enderror
        >
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل تعاني الأم من أمراض مزمنة</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input
                        type="radio"
                        class="custom-control-input comment-tab"
                        value="1"
                        name="mom_chronic_diseases"
                        @if($kid->mom->chronic_diseases == '1') checked @endif

                    />
                    <label class="custom-control-label"> نعم </label>

                    <input
                        type="radio"
                        class="custom-control-input"
                        value="0"
                        name="mom_chronic_diseases"
                        @if($kid->mom->chronic_diseases == '0') checked @endif

                    />
                    <label class="custom-control-label">لا</label>
                </div>
            </div>
            <div class="comment">
                <input type="text" class="form-control"
                       placeholder="أذكر التعليق هنا..." name="mom_chronic_diseases_com"
                       id="comment"
                       value="{{ $kid->mom->chronic_diseases_com}}"
                       style="{{ $kid->mom->chronic_diseases != null && $kid->mom->chronic_diseases == 1 ? '' : 'visibility: hidden;' }}"
                    {{ $kid->mom->chronic_diseases != null && $kid->mom->chronic_diseases == 1 ? '' : 'disabled' }} />
            </div>
        </div>

        <!-- mom_genetic_diseases -->
        <div class="medical-data w-100"
             @error('mom_genetic_diseases')
             style="border-color: red"
             @enderror
             @error('mom_genetic_diseases_com')
             style="border-color: red"
            @enderror
        >
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل تعاني الأم من أمراض وراثية</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input
                        type="radio"
                        class="custom-control-input comment-tab"
                        value="1"
                        name="mom_genetic_diseases"
                        @if($kid->mom->genetic_diseases == '1') checked @endif

                    />
                    <label class="custom-control-label"> نعم </label>

                    <input
                        type="radio"
                        class="custom-control-input"
                        value="0"
                        name="mom_genetic_diseases"
                        @if($kid->mom->genetic_diseases == '0') checked @endif

                    />
                    <label class="custom-control-label">لا</label>
                </div>
            </div>
            <div class="comment">
                <input type="text" class="form-control"
                       placeholder="أذكر التعليق هنا..." name="mom_genetic_diseases_com"
                       id="comment"
                       value="{{$kid->mom->genetic_diseases_com}}"
                       style="{{ $kid->mom->genetic_diseases != null && $kid->mom->genetic_diseases == 1 ? '' : 'visibility: hidden;' }}"
                    {{ $kid->mom->genetic_diseases != null && $kid->mom->genetic_diseases == 1 ? '' : 'disabled' }} />
            </div>
        </div>

        <!-- mom_mental_state -->
        <div class="medical-data w-100"
             @error('mom_mental_state')
             style="border-color: red"
             @enderror
             @error('mom_mental_state_com')
             style="border-color: red"
            @enderror
        >
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل تعاني الأم من مشاكل صحية أخرى</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input
                        type="radio"
                        class="custom-control-input comment-tab"
                        value="1"
                        name="mom_health_problems"
                        @if($kid->mom->health_problems == '1') checked @endif

                    />
                    <label class="custom-control-label"> نعم </label>

                    <input
                        type="radio"
                        class="custom-control-input"
                        value="0"
                        name="mom_health_problems"
                        @if($kid->mom->health_problems == '0') checked @endif

                    />
                    <label class="custom-control-label">لا</label>
                </div>
            </div>
            <div class="comment">
                <input type="text" class="form-control"
                       placeholder="أذكر التعليق هنا..." name="mom_mental_state_com"
                       id="comment"
                       value="{{$kid->mom->mental_state_com}}"
                       style="{{ $kid->mom->mental_state != null && $kid->mom->mental_state == 1 ? '' : 'visibility: hidden;' }}"
                    {{ $kid->mom->mental_state != null && $kid->mom->mental_state == 1 ? '' : 'disabled' }} />
            </div>
        </div>

        <!-- mom_health_problems -->
        <div class="medical-data w-100"
             @error('mom_health_problems')
             style="border-color: red"
             @enderror
             @error('mom_health_problems_com')
             style="border-color: red"
            @enderror
        >
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>ما هي الحالة النفسية للأم</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input
                        type="radio"
                        class="custom-control-input"
                        value="0"
                        name="mom_mental_state"
                        @if($kid->mom->mental_state == '0') checked @endif

                    />
                    <label class="custom-control-label"> طبيعي </label>

                    <input
                        type="radio"
                        class="custom-control-input comment-tab"
                        value="1"
                        name="mom_mental_state"
                        @if($kid->mom->mental_state == '1') checked @endif

                    />
                    <label class="custom-control-label"
                    >تعاني من مشاكل نفسية</label
                    >
                </div>
            </div>
            <div class="comment">
                <input type="text" class="form-control"
                       placeholder="أذكر التعليق هنا..." name="mom_health_problems_com"
                       id="comment"
                       value="{{$kid->mom->health_problems_com}}"
                       style="{{ $kid->mom->health_problems != null && $kid->mom->health_problems == 1 ? '' : 'visibility: hidden;' }}"
                    {{ $kid->mom->health_problems != null && $kid->mom->health_problems == 1 ? '' : 'disabled' }} />
            </div>
        </div>

        <!-- mom_communication -->
        <div class="medical-data w-100"
             @error('mom_communication')
             style="border-color: red"
             @enderror
             @error('mom_communication_com')
             style="border-color: red"
            @enderror
        >
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>ما هي درجة تواصل الأم مع الطفل</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input
                        type="radio"
                        class="custom-control-input comment-tab"
                        value="good"
                        name="mom_communication"
                        @if($kid->mom->communication == 'good') checked @endif

                    />
                    <label class="custom-control-label"> قوية </label>

                    <input
                        type="radio"
                        class="custom-control-input comment-tab"
                        value="medium"
                        name="mom_communication"
                        @if($kid->mom->communication == 'medium') checked @endif

                    />
                    <label class="custom-control-label">متوسطة</label>

                    <input
                        type="radio"
                        class="custom-control-input comment-tab"
                        value="week"
                        name="mom_communication"
                        @if($kid->mom->communication == 'week') checked @endif
                    />
                    <label class="custom-control-label">ضعيفة</label>
                </div>
            </div>

            <div class="comment">
                <input type="text" class="form-control"
                      name="mom_communication_com"
                       placeholder="أذكر التعليق هنا..."
                       value="{{@$kid->mom->communication_com}}"/>
            </div>
        </div>

        <!-- 1- mom_pregnancy -->
        <div class="medical-data w-100" @error('mom_pregnancy')
        style="border-color: red"
             @enderror
             @error('mom_pregnancy_com')
             style="border-color: red"
            @enderror
        >
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل الحمل بالطفل كان</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input
                        type="radio"
                        class="custom-control-input"
                        value="0"
                        name="mom_pregnancy"
                        @if($kid->mom->pregnancy == '0') checked @endif

                    />
                    <label class="custom-control-label"> طبيعي </label>

                    <input
                        type="radio"
                        class="custom-control-input"
                        value="2"
                        name="mom_pregnancy"
                        @if($kid->mom->pregnancy == '2') checked @endif

                    />
                    <label class="custom-control-label">أطفال أنابيب</label>

                    <input
                        type="radio"
                        class="custom-control-input comment-tab"
                        value="1"
                        name="mom_pregnancy"
                        @if($kid->mom->pregnancy == '1') checked @endif

                    />
                    <label class="custom-control-label">أخرى</label>
                </div>
            </div>

            <div class="comment">
                <input type="text" class="form-control" name="mom_pregnancy_com"
                       placeholder="أذكر التعليق هنا..."
                       id="comment" value="{{$kid->mom->pregnancy_com}}"
                       style="{{ $kid->mom->pregnancy != null && $kid->mom->pregnancy == 1 ? '' : 'visibility: hidden;' }}"
                    {{ $kid->mom->pregnancy != null && $kid->mom->pregnancy == 1 ? '' : 'disabled' }} />
            </div>
        </div>


        <!-- mom_pregnancy_month -->
        <div class="medical-data w-100"
             @error('mom_pregnancy_month')
             style="border-color: red"
            @enderror
        >
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>كم كانت أشهر الحمل بالطفل</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input
                        type="radio"
                        class="custom-control-input"
                        value="7"
                        name="mom_pregnancy_month"
                        @if($kid->mom->pregnancy_month == '7') checked @endif

                    />
                    <label class="custom-control-label"> 7 شهور </label>

                    <input
                        type="radio"
                        class="custom-control-input"
                        value="8"
                        name="mom_pregnancy_month"
                        @if($kid->mom->pregnancy_month == '8') checked @endif

                    />
                    <label class="custom-control-label">8 شهور </label>

                    <input
                        type="radio"
                        class="custom-control-input"
                        value="9"
                        name="mom_pregnancy_month"
                        @if($kid->mom->pregnancy_month == '9') checked @endif

                    />
                    <label class="custom-control-label">9 شهور</label>

                    <input
                        type="radio"
                        class="custom-control-input"
                        value="10"
                        name="mom_pregnancy_month"
                        @if($kid->mom->pregnancy_month == '10') checked @endif

                    />
                    <label class="custom-control-label">10 شهور</label>
                </div>
            </div>
        </div>

        <!-- mom_pregnancy_problems -->
        <div class="medical-data w-100"
             @error('mom_pregnancy_problems')
             style="border-color: red"
             @enderror
             @error('mom_pregnancy_problems_com')
             style="border-color: red"
            @enderror
        >
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل كانت هناك مشاكل صحية أثناء الحمل</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input
                        type="radio"
                        class="custom-control-input comment-tab"
                        value="1"
                        name="mom_pregnancy_problems"
                        @if($kid->mom->pregnancy_problems == '1') checked @endif

                    />
                    <label class="custom-control-label"> نعم </label>

                    <input
                        type="radio"
                        class="custom-control-input"
                        value="0"
                        name="mom_pregnancy_problems"
                        @if($kid->mom->pregnancy_problems == '0') checked @endif

                    />
                    <label class="custom-control-label">لا</label>
                </div>
            </div>
            <div class="comment">
                <input type="text" class="form-control" name="mom_pregnancy_problems_com"
                       placeholder="أذكر التعليق هنا..."
                       id="comment" value="{{$kid->mom->pregnancy_problems_com}}"
                       style="{{$kid->mom->birth_problems != null && $kid->mom->pregnancy_problems == 1 ? '' : 'visibility: hidden;' }}"
                    {{ $kid->mom->birth_problems != null && $kid->mom->pregnancy_problems == 1 ? '' : 'disabled' }} />
            </div>
        </div>

        <!-- mom_birth_status -->
        <div class="medical-data w-100"
             @error('mom_birth_status')
             style="border-color: red"
            @enderror
        >
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل كانت ولادة الطفل</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input
                        type="radio"
                        class="custom-control-input"
                        value="1"
                        name="mom_birth_status"
                        @if($kid->mom->birth_status == '1') checked @endif

                    />
                    <label class="custom-control-label"> طبيعية </label>

                    <input
                        type="radio"
                        class="custom-control-input"
                        value="0"
                        name="mom_birth_status"
                        @if($kid->mom->birth_status == '0') checked @endif

                    />
                    <label class="custom-control-label">قيصرية</label>
                </div>
            </div>
        </div>

        <!-- mom_birth_problems -->
        <div class="medical-data w-100" @error('mom_birth_problems')
        style="border-color: red"
             @enderror
             @error('mom_birth_problems_com')
             style="border-color: red"
            @enderror
        >
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل كانت هناك مشاكل أثناء الولادة</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input
                        type="radio"
                        class="custom-control-input comment-tab"
                        value="1"
                        name="mom_birth_problems"
                        @if($kid->mom->birth_problems == '1') checked @endif

                    />
                    <label class="custom-control-label"> نعم </label>

                    <input
                        type="radio"
                        class="custom-control-input"
                        value="0"
                        name="mom_birth_problems"
                        @if($kid->mom->birth_problems == '0') checked @endif

                    />
                    <label class="custom-control-label">لا</label>
                </div>
            </div>


            <div class="comment">
                <input type="text" class="form-control" name="mom_birth_problems_com" placeholder="أذكر التعليق هنا..."
                       id="comment" value="{{$kid->mom->birth_problems_com}}"
                       style="{{ $kid->mom->birth_problems != null && $kid->mom->birth_problems == 1 ? '' : 'visibility: hidden;' }}"
                    {{ $kid->mom->birth_problems != null && $kid->mom->birth_problems == 1 ? '' : 'disabled' }} />
            </div>
        </div>

        <!-- mom_birth_after_problems -->
        <div class="medical-data w-100" @error('mom_birth_after_problems')
        style="border-color: red"
             @enderror
             @error('mom_birth_after_problems_com')
             style="border-color: red"
            @enderror
        >
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل كانت هناك مشاكل بعد الولادة</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input
                        type="radio"
                        class="custom-control-input comment-tab"
                        value="1"
                        name="mom_birth_after_problems"
                        @if($kid->mom->birth_after_problems == '1') checked @endif

                    />
                    <label class="custom-control-label"> نعم </label>

                    <input
                        type="radio"
                        class="custom-control-input"
                        value="0"
                        name="mom_birth_after_problems"
                        @if($kid->mom->birth_after_problems == '0') checked @endif

                    />
                    <label class="custom-control-label">لا</label>
                </div>
            </div>
            <div class="comment">
                <input type="text" class="form-control" name="mom_birth_after_problems_com"
                       placeholder="أذكر التعليق هنا..."
                       id="comment" value="{{$kid->mom->birth_after_problems_com}}"
                       style="{{ $kid->mom->birth_after_problems != null && $kid->mom->birth_after_problems == 1 ? '' : 'visibility: hidden;' }}"
                    {{ $kid->mom->birth_after_problems != null && $kid->mom->birth_after_problems == 1 ? '' : 'disabled' }} />
            </div>
        </div>

        <!-- mom_lactation -->
        <div class="medical-data w-100"
             @error('mom_lactation')
             style="border-color: red"
            @enderror
        >
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل الرضاعة كانت طبيعية</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input
                        type="radio"
                        class="custom-control-input"
                        value="1"
                        name="mom_lactation"
                        @if($kid->mom->lactation == '1') checked @endif

                    />
                    <label class="custom-control-label"> نعم </label>

                    <input
                        type="radio"
                        class="custom-control-input"
                        value="0"
                        name="mom_lactation"
                        @if($kid->mom->lactation == '0') checked @endif

                    />
                    <label class="custom-control-label">لا</label>
                </div>
            </div>

{{--            <div class="comment">--}}
{{--                <input--}}
{{--                    type="text"--}}
{{--                    class="form-control"--}}
{{--                    id="comment"--}}
{{--                    name="mom_lactation_com"--}}
{{--                    placeholder="أذكر التعليق هنا..."--}}
{{--                    value="{{@$kid->mom->lactation_com}}"/>--}}
{{--            </div>--}}
        </div>
    </div>

</div>
