<div id="motherMenu" class="container tab-pane fade">
    <br/>

    <div class="text-data">
        <div class="form-title">
            <img
                src="{{ asset('dist/front/assets/images/personal-information.jpg') }}"/>
            <h3>بيانات أساسية</h3>
        </div>

        <div class="form-group">
            <label>الاسم كاملاً </label>
            <input type="text" class="form-control" value="{{old('mom_name')}}"
                   placeholder="أدخل اسم كاملاً..." name="mom_name" />
            @error('mom_name')
            <span class="text-danger">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                       {{ $message }}
                 </span>
            @enderror
        </div>

        <div class="form-group">
            <label>رقم الهوية</label>
            <input type="number" class="form-control" value="{{old('mom_num')}}"
                   placeholder="أدخل رقم الهوية...
                          " name="mom_num"/>
            @error('mom_num')
            <span class="text-danger">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                       {{ $message }}
                 </span>
            @enderror
        </div>

        <div class="form-group form-date">
            <label> تاريخ الميلاد</label>
            <input class="datePicker form-control" placeholder="أدخل تاريخ الميلاد..." value="{{old('mom_date')}}"
                   type="text" name="mom_date"/>
            <img src="{{ asset('dist/front/assets/images/calender.png') }}"
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
                <option disabled selected>اختر الحالة الاجتماعية...</option>
                <option value="married" @selected(old('mom_marital_status')=='married')>
                    متزوجة
                </option>
                <option value="divorce" @selected(old('mom_marital_status')=='divorce')>
                    مطلقة
                </option>
                <option value="Widower" @selected(old('mom_marital_status')=='Widower')>
                    أرمله
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
            <input type="phone" class="form-control" value="{{old('mom_phone')}}"
                   placeholder="  أدخل رقم التواصل..." name="mom_phone"/>
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
                <option selected disabled>اختر المستوى التعليمي...</option>
                <option value="none" @selected(old('mom_learning')=='none')>أمّي</option>
                <option value="primary" @selected(old('mom_learning')=='primary')>
                    ابتدائي
                </option>
                <option value="middle" @selected(old('mom_learning')=='middle')>متوسط</option>
                <option value="secondary" @selected(old('mom_learning')=='secondary')>
                    ثانوي
                </option>
                <option value="diploma" @selected(old('mom_learning')=='diploma')>دبلوم</option>
                <option value="Bachelor" @selected(old('mom_learning')=='Bachelor')>
                    بكالوريس
                </option>
                <option value="Master" @selected(old('mom_learning')=='Master')>
                    ماجستير
                </option>
                <option value="doctor" @selected(old('mom_learning')=='doctor')>
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
            <select class="form-control" name="mom_work">
                <option selected disabled>اختر طبيعة العمل...</option>
                <option value="public_work" @selected(old('mom_work')=='public_work')>
                    موظفة حكومية
                </option>
                <option value="private_work" @selected(old('mom_work')=='private_work')>
                    موظفة قطاع خاص
                </option>
                <option value="free_work" @selected(old('mom_work')=='free_work')>
                    أعمال حرة
                </option>
                <option value="don't_work" @selected(old('mom_work')=="don't_work")>
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
            <img src="{{ asset('dist/front/assets/images/medical 1.jpg') }}"/>
            <h3>بيانات صحية</h3>
        </div>

        <!-- mom_smoking -->
        <div class="medical-data w-100"
             @error('mom_smoking')
             style="border-color: red"
            @enderror
        >
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل الام مدخنة</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" value="1"
                           name="mom_smoking"
                        {{ old('mom_smoking') != null && old('mom_smoking') == 1 ? 'checked' : '' }}/>

                    <label class="custom-control-label"> نعم </label>

                    <input type="radio" class="custom-control-input comment-tab"
                           value="0" name="mom_smoking"
                        {{ old('mom_smoking') != null && old('mom_smoking') == 0 ? 'checked' : '' }}/>
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
                    <h4>هل لدى الام إعاقة</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input comment-tab"
                           value="1" name="mom_obstruction"
                        {{ old('mom_obstruction') != null && old('mom_obstruction') == 1 ? 'checked' : '' }}/>
                    <label class="custom-control-label"> نعم </label>

                    <input type="radio" class="custom-control-input" value="0"
                           name="mom_obstruction"
                        {{ old('mom_obstruction') != null && old('mom_obstruction') == 0 ? 'checked' : '' }}/>
                    <label class="custom-control-label">لا</label>
                </div>
            </div>
            <div class="comment">
                <input type="text" class="form-control"
                       placeholder="أذكر التعليق هنا..." name="mom_obstruction_com"
                       id="comment"
                       value="{{old('mom_obstruction_com')}}"
                       style="{{ old('mom_obstruction') != null && old('mom_obstruction') == 1 ? '' : 'visibility: hidden;' }}"
                    {{ old('mom_obstruction') != null && old('mom_obstruction') == 1 ? '' : 'disabled' }} />
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
                    <h4>هل تعاني الام من أمراض مزمنة</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input comment-tab"
                           value="1" name="mom_chronic_diseases"
                        {{ old('mom_chronic_diseases') != null && old('mom_chronic_diseases') == 1 ? 'checked' : '' }}/>
                    <label class="custom-control-label"> نعم </label>

                    <input type="radio" class="custom-control-input" value="0"
                           name="mom_chronic_diseases"
                        {{ old('mom_chronic_diseases') != null && old('mom_chronic_diseases') == 0 ? 'checked' : '' }}/>
                    <label class="custom-control-label">لا</label>
                </div>
            </div>
            <div class="comment">
                <input type="text" class="form-control"
                       placeholder="أذكر التعليق هنا..." name="mom_chronic_diseases_com"
                       id="comment"
                       value="{{old('mom_chronic_diseases_com')}}"
                       style="{{ old('mom_chronic_diseases') != null && old('mom_chronic_diseases') == 1 ? '' : 'visibility: hidden;' }}"
                    {{ old('mom_chronic_diseases') != null && old('mom_chronic_diseases') == 1 ? '' : 'disabled' }} />
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
                    <h4>هل تعاني الام من أمراض وراثية</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input comment-tab"
                           value="1" name="mom_genetic_diseases"
                        {{ old('mom_genetic_diseases') != null && old('mom_genetic_diseases') == 1 ? 'checked' : '' }}/>
                    <label class="custom-control-label"> نعم </label>

                    <input type="radio" class="custom-control-input" value="0"
                           name="mom_genetic_diseases"
                        {{ old('mom_genetic_diseases') != null && old('mom_genetic_diseases') == 0 ? 'checked' : '' }}/>
                    <label class="custom-control-label">لا</label>
                </div>
            </div>
            <div class="comment">
                <input type="text" class="form-control"
                       placeholder="أذكر التعليق هنا..." name="mom_genetic_diseases_com"
                       id="comment"
                       value="{{old('mom_genetic_diseases_com')}}"
                       style="{{ old('mom_genetic_diseases') != null && old('mom_genetic_diseases') == 1 ? '' : 'visibility: hidden;' }}"
                    {{ old('mom_genetic_diseases') != null && old('mom_genetic_diseases') == 1 ? '' : 'disabled' }} />
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
                    <h4>ما هي الحالة النفسية للام</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" value="0"
                           name="mom_mental_state"
                        {{ old('mom_mental_state') != null && old('mom_mental_state') == 0 ? 'checked' : '' }}/>
                    <label class="custom-control-label"> طبيعي </label>

                    <input type="radio" class="custom-control-input comment-tab"
                           value="1" name="mom_mental_state"
                        {{ old('mom_mental_state') != null && old('mom_mental_state') == 1 ? 'checked' : '' }}/>
                    <label class="custom-control-label">تعاني من مشاكل نفسية</label>
                </div>
            </div>
            <div class="comment">
                <input type="text" class="form-control"
                       placeholder="أذكر التعليق هنا..." name="mom_mental_state_com"
                       id="comment"
                       value="{{old('mom_mental_state_com')}}"
                       style="{{ old('mom_mental_state') != null && old('mom_mental_state') == 1 ? '' : 'visibility: hidden;' }}"
                    {{ old('mom_mental_state') != null && old('mom_mental_state') == 1 ? '' : 'disabled' }} />
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
                    <h4>هل تعاني الام من مشاكل صحية أخرى</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input comment-tab"
                           value="1" name="mom_health_problems"
                        {{ old('mom_health_problems') != null && old('mom_health_problems') == 1 ? 'checked' : '' }}/>
                    <label class="custom-control-label"> نعم </label>

                    <input type="radio" class="custom-control-input" value="0"
                           name="mom_health_problems"
                        {{ old('mom_health_problems') != null && old('mom_health_problems') == 0 ? 'checked' : '' }}/>
                    <label class="custom-control-label">لا</label>
                </div>
            </div>
            <div class="comment">
                <input type="text" class="form-control"
                       placeholder="أذكر التعليق هنا..." name="mom_health_problems_com"
                       id="comment"
                       value="{{old('mom_health_problems_com')}}"
                       style="{{ old('mom_health_problems') != null && old('mom_health_problems') == 1 ? '' : 'visibility: hidden;' }}"
                    {{ old('mom_health_problems') != null && old('mom_health_problems') == 1 ? '' : 'disabled' }} />
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
                    <h4>ما هي درجة تواصل الام مع الطفل</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input comment-tab"
                           value="good" name="mom_communication"
                        {{ old('mom_communication') != null && old('mom_communication') == 'good' ? 'checked' : '' }}/>
                    <label class="custom-control-label"> قوية </label>

                    <input type="radio" class="custom-control-input comment-tab"
                           value="medium" name="mom_communication"
                        {{ old('mom_communication') != null && old('mom_communication') == 'medium' ? 'checked' : '' }}/>
                    <label class="custom-control-label">متوسطة</label>

                    <input type="radio" class="custom-control-input comment-tab"
                           value="week" name="mom_communication"
                        {{ old('mom_communication') != null && old('mom_communication') == 'week' ? 'checked' : '' }}/>
                    <label class="custom-control-label">ضعيفة</label>
                </div>
            </div>

            <div class="comment">
                <input type="text" class="form-control"
                       placeholder="أذكر التعليق هنا ان وجد..." name="mom_communication_com"/>
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
                    <input type="radio" class="custom-control-input" value="0"
                           name="mom_pregnancy" {{ old('mom_pregnancy') != null && old('mom_pregnancy') == 0 ? 'checked' : '' }}/>
                    <label class="custom-control-label"> طبيعي </label>

                    <input type="radio" class="custom-control-input" value="2"
                           name="mom_pregnancy" {{ old('mom_pregnancy') != null && old('mom_pregnancy') == 2 ? 'checked' : '' }}/>
                    <label class="custom-control-label">أطفال أنابيب</label>

                    <input type="radio" class="custom-control-input comment-tab"
                           value="1"
                           name="mom_pregnancy" {{ old('mom_pregnancy') != null && old('mom_pregnancy') == 1 ? 'checked' : '' }}/>
                    <label class="custom-control-label">أخرى</label>
                </div>
            </div>

            <div class="comment">
                <input type="text" class="form-control" name="mom_pregnancy_com"
                       placeholder="أذكر التعليق هنا..."
                       id="comment" value="{{old('mom_pregnancy_com')}}"
                       style="{{ old('mom_pregnancy') != null && old('mom_pregnancy') == 1 ? '' : 'visibility: hidden;' }}"
                    {{ old('mom_pregnancy') != null && old('mom_pregnancy') == 1 ? '' : 'disabled' }} />
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
                    <input type="radio" class="custom-control-input" value="7"
                           name="mom_pregnancy_month" {{ old('mom_pregnancy_month') != null && old('mom_pregnancy_month') == 7 ? 'checked' : '' }}/>
                    <label class="custom-control-label"> 7 شهور </label>

                    <input type="radio" class="custom-control-input" value="8"
                           name="mom_pregnancy_month" {{ old('mom_pregnancy_month') != null && old('mom_pregnancy_month') == 8 ? 'checked' : '' }}/>
                    <label class="custom-control-label">8 شهور </label>

                    <input type="radio" class="custom-control-input" value="9"
                           name="mom_pregnancy_month" {{ old('mom_pregnancy_month') != null && old('mom_pregnancy_month') == 9 ? 'checked' : '' }}/>
                    <label class="custom-control-label">9 شهور</label>

                    <input type="radio" class="custom-control-input" value="10"
                           name="mom_pregnancy_month" {{ old('mom_pregnancy_month') != null && old('mom_pregnancy_month') == 10 ? 'checked' : '' }}/>
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
                    <input type="radio" class="custom-control-input comment-tab"
                           value="1"
                           name="mom_pregnancy_problems" {{ old('mom_pregnancy_problems') != null && old('mom_pregnancy_problems') == 1 ? 'checked' : '' }}/>
                    <label class="custom-control-label"> نعم </label>

                    <input type="radio" class="custom-control-input" value="0"
                           name="mom_pregnancy_problems" {{ old('mom_pregnancy_problems') != null && old('mom_pregnancy_problems') == 0 ? 'checked' : '' }}/>
                    <label class="custom-control-label">لا</label>
                </div>
            </div>

            <div class="comment">
                <input type="text" class="form-control" name="mom_pregnancy_problems_com"
                       placeholder="أذكر التعليق هنا..."
                       id="comment" value="{{old('mom_pregnancy_problems_com')}}"
                       style="{{ old('mom_pregnancy_problems') != null && old('mom_pregnancy_problems') == 1 ? '' : 'visibility: hidden;' }}"
                    {{ old('mom_pregnancy_problems') != null && old('mom_pregnancy_problems') == 1 ? '' : 'disabled' }} />
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
                    <input type="radio" class="custom-control-input" value="1"
                           name="mom_birth_status" {{ old('mom_birth_status') != null && old('mom_birth_status') == 0 ? 'checked' : '' }}/>
                    <label class="custom-control-label"> طبيعية </label>

                    <input type="radio" class="custom-control-input" value="0"
                           name="mom_birth_status" {{ old('mom_birth_status') != null && old('mom_birth_status') == 0 ? 'checked' : '' }}/>
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
                    <input type="radio" class="custom-control-input comment-tab"
                           value="1"
                           name="mom_birth_problems" {{ old('mom_birth_problems') != null && old('mom_birth_problems') == 1 ? 'checked' : '' }}/>
                    <label class="custom-control-label"> نعم </label>

                    <input type="radio" class="custom-control-input" value="0"
                           name="mom_birth_problems" {{ old('mom_birth_problems') != null && old('mom_birth_problems') == 0 ? 'checked' : '' }}/>
                    <label class="custom-control-label">لا</label>
                </div>
            </div>

            <div class="comment">
                <input type="text" class="form-control" name="mom_birth_problems_com" placeholder="أذكر التعليق هنا..."
                       id="comment" value="{{old('mom_birth_problems_com')}}"
                       style="{{ old('mom_birth_problems') != null && old('mom_birth_problems') == 1 ? '' : 'visibility: hidden;' }}"
                    {{ old('mom_birth_problems') != null && old('mom_birth_problems') == 1 ? '' : 'disabled' }} />
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
                    <input type="radio" class="custom-control-input comment-tab"
                           value="1"
                           name="mom_birth_after_problems" {{ old('mom_birth_after_problems') != null && old('mom_birth_after_problems') == 1 ? 'checked' : '' }}/>
                    <label class="custom-control-label"> نعم </label>

                    <input type="radio" class="custom-control-input" value="0"
                           name="mom_birth_after_problems" {{ old('mom_birth_after_problems') != null && old('mom_birth_after_problems') == 0 ? 'checked' : '' }}/>
                    <label class="custom-control-label">لا</label>
                </div>
            </div>
            <div class="comment">
                <input type="text" class="form-control" name="mom_birth_after_problems_com"
                       placeholder="أذكر التعليق هنا..."
                       id="comment" value="{{old('mom_birth_after_problems_com')}}"
                       style="{{ old('mom_birth_after_problems') != null && old('mom_birth_after_problems') == 1 ? '' : 'visibility: hidden;' }}"
                    {{ old('mom_birth_after_problems') != null && old('mom_birth_after_problems') == 1 ? '' : 'disabled' }} />
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
                    <input type="radio" class="custom-control-input" value="1"
                           name="mom_lactation" {{ old('mom_lactation') != null && old('mom_lactation') == 1 ? 'checked' : '' }}/>
                    <label class="custom-control-label"> نعم </label>

                    <input type="radio" class="custom-control-input" value="0"
                           name="mom_lactation" {{ old('mom_lactation') != null && old('mom_lactation') == 0 ? 'checked' : '' }}/>
                    <label class="custom-control-label">لا</label>
                </div>
            </div>
        </div>

    </div>
</div>
