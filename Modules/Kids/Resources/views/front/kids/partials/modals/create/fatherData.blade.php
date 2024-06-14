<div id="fatherMenu" class="container tab-pane fade">
    <br/>

    <div class="text-data">
        <div class="form-title">
            <img
                src="{{ asset('dist/front/assets/images/personal-information.jpg') }}"/>
            <h3>بيانات أساسية</h3>
        </div>

        <div class="form-group">
            <label>الاسم كاملاً </label>
            <input type="text" class="form-control" value="{{old('dad_name')}}"
                   placeholder="أدخل اسم كاملاً..." name="dad_name" />
            @error('dad_name')
            <span class="text-danger">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                       {{ $message }}
                 </span>
            @enderror
        </div>

        <div class="form-group">
            <label>رقم الهوية</label>
            <input type="number" class="form-control" value="{{old('dad_num')}}"
                   placeholder="أدخل رقم الهوية..."  name="dad_num"/>
            @error('dad_num')
            <span class="text-danger">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                       {{ $message }}
                 </span>
            @enderror
        </div>

        <div class="form-group form-date">
            <label> تاريخ الميلاد</label>
            <input class="form-control datePicker" placeholder="أدخل تاريخ الميلاد..." value="{{old('dad_date')}}"
                   type="text"  name="dad_date"/>
            <img src="{{ asset('dist/front/assets/images/calender.png') }}"
                 class="datepickerimg" width="20px" alt="">
            @error('dad_date')
            <span class="text-danger">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                       {{ $message }}
                 </span>
            @enderror
        </div>

        <div class="form-group">
            <label>الحالة الاجتماعية</label>
            <select name="dad_marital_status" class="form-control">
                <option disabled selected>اختر الحالة الاجتماعية...</option>
                <option value="married" @selected(old('dad_marital_status')=='married')>
                    متزوج
                </option>
                <option value="divorce" @selected(old('dad_marital_status')=='divorce')>
                    مطلق
                </option>
                <option value="Widower" @selected(old('dad_marital_status')=='Widower')>
                    أرمل
                </option>
            </select>
            @error('dad_marital_status')
            <span class="text-danger">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                       {{ $message }}
                 </span>
            @enderror
        </div>

        <div class="form-group">
            <label> رقم التواصل</label>
            <input type="phone" class="form-control" value="{{old('dad_phone')}}"
                   placeholder="  أدخل رقم التواصل..." name="dad_phone"/>
            @error('dad_phone')
            <span class="text-danger">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                       {{ $message }}
                 </span>
            @enderror
        </div>

        <div class="form-group">
            <label>المستوى التعليمي</label>
            <select name="dad_learning" class="form-control">
                <option selected disabled>اختر المستوى التعليمي...</option>
                <option value="none" @selected(old('dad_learning')=='none')>أمّي</option>
                <option value="primary" @selected(old('dad_learning')=='primary')>
                    ابتدائي
                </option>
                <option value="middle" @selected(old('dad_learning')=='middle')>متوسط</option>
                <option value="secondary" @selected(old('dad_learning')=='secondary')>
                    ثانوي
                </option>
                <option value="diploma" @selected(old('dad_learning')=='diploma')>دبلوم</option>
                <option value="Bachelor" @selected(old('dad_learning')=='Bachelor')>
                    بكالوريس
                </option>
                <option value="Master" @selected(old('dad_learning')=='Master')>
                    ماجستير
                </option>
                <option value="doctor" @selected(old('dad_learning')=='doctor')>
                    دكتوراه
                </option>
            </select>
            @error('dad_learning')
            <span class="text-danger">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                       {{ $message }}
                 </span>
            @enderror
        </div>

        <div class="form-group">
            <label> طبيعة العمل</label>
            <select class="form-control" name="dad_work" >
                <option selected disabled>اختر طبيعة العمل...</option>
                <option value="public_work" @selected(old('dad_work')=='public_work')>
                    موظف حكومي
                </option>
                <option value="private_work" @selected(old('dad_work')=='private_work')>
                    موظف قطاع خاص
                </option>
                <option value="free_work" @selected(old('dad_work')=='free_work')>
                    أعمال حرة
                </option>
                <option value="don't_work" @selected(old('dad_work')=="don't_work")>
                    لا يعمل
                </option>
            </select>
            @error('dad_work')
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

        <!-- dad_smoking -->
        <div class="medical-data w-100"
             @error('dad_smoking')
             style="border-color: red"
            @enderror
        >
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل الأب مدخن</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" value="1"
                           name="dad_smoking"
                        {{ old('dad_smoking') != null && old('dad_smoking') == 1 ? 'checked' : '' }}/>

                    <label class="custom-control-label"> نعم </label>

                    <input type="radio" class="custom-control-input comment-tab"
                           value="0" name="dad_smoking"
                        {{ old('dad_smoking') != null && old('dad_smoking') == 0 ? 'checked' : '' }}/>
                    <label class="custom-control-label">لا</label>
                </div>
            </div>
        </div>

        <!-- dad_obstruction -->
        <div class="medical-data w-100"
             @error('dad_obstruction')
             style="border-color: red"
             @enderror
             @error('dad_obstruction_com')
             style="border-color: red"
            @enderror
        >
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل لدى الأب إعاقة</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input comment-tab"
                           value="1" name="dad_obstruction"
                        {{ old('dad_obstruction') != null && old('dad_obstruction') == 1 ? 'checked' : '' }}/>
                    <label class="custom-control-label"> نعم </label>

                    <input type="radio" class="custom-control-input" value="0"
                           name="dad_obstruction"
                        {{ old('dad_obstruction') != null && old('dad_obstruction') == 0 ? 'checked' : '' }}/>
                    <label class="custom-control-label">لا</label>
                </div>
            </div>
            <div class="comment">
                <input type="text" class="form-control"
                       placeholder="أذكر التعليق هنا..." name="dad_obstruction_com"
                       id="comment"
                       value="{{old('dad_obstruction_com')}}"
                       style="{{ old('dad_obstruction') != null && old('dad_obstruction') == 1 ? '' : 'visibility: hidden;' }}"
                    {{ old('dad_obstruction') != null && old('dad_obstruction') == 1 ? '' : 'disabled' }} />
            </div>
        </div>

        <!-- dad_chronic_diseases -->
        <div class="medical-data w-100"
             @error('dad_chronic_diseases')
             style="border-color: red"
             @enderror
             @error('dad_chronic_diseases_com')
             style="border-color: red"
            @enderror
        >
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل يعاني الأب من أمراض مزمنة</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input comment-tab"
                           value="1" name="dad_chronic_diseases"
                        {{ old('dad_chronic_diseases') != null && old('dad_chronic_diseases') == 1 ? 'checked' : '' }}/>
                    <label class="custom-control-label"> نعم </label>

                    <input type="radio" class="custom-control-input" value="0"
                           name="dad_chronic_diseases"
                        {{ old('dad_chronic_diseases') != null && old('dad_chronic_diseases') == 0 ? 'checked' : '' }}/>
                    <label class="custom-control-label">لا</label>
                </div>
            </div>
            <div class="comment">
                <input type="text" class="form-control"
                       placeholder="أذكر التعليق هنا..." name="dad_chronic_diseases_com"
                       id="comment"
                       value="{{old('dad_chronic_diseases_com')}}"
                       style="{{ old('dad_chronic_diseases') != null && old('dad_chronic_diseases') == 1 ? '' : 'visibility: hidden;' }}"
                    {{ old('dad_chronic_diseases') != null && old('dad_chronic_diseases') == 1 ? '' : 'disabled' }} />
            </div>
        </div>

        <!-- dad_genetic_diseases -->
        <div class="medical-data w-100"
             @error('dad_genetic_diseases')
             style="border-color: red"
             @enderror
             @error('dad_genetic_diseases_com')
             style="border-color: red"
            @enderror
        >
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل يعاني الأب من أمراض وراثية</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input comment-tab"
                           value="1" name="dad_genetic_diseases"
                        {{ old('dad_genetic_diseases') != null && old('dad_genetic_diseases') == 1 ? 'checked' : '' }}/>
                    <label class="custom-control-label"> نعم </label>

                    <input type="radio" class="custom-control-input" value="0"
                           name="dad_genetic_diseases"
                        {{ old('dad_genetic_diseases') != null && old('dad_genetic_diseases') == 0 ? 'checked' : '' }}/>
                    <label class="custom-control-label">لا</label>
                </div>
            </div>
            <div class="comment">
                <input type="text" class="form-control"
                       placeholder="أذكر التعليق هنا..." name="dad_genetic_diseases_com"
                       id="comment"
                       value="{{old('dad_genetic_diseases_com')}}"
                       style="{{ old('dad_genetic_diseases') != null && old('dad_genetic_diseases') == 1 ? '' : 'visibility: hidden;' }}"
                    {{ old('dad_genetic_diseases') != null && old('dad_genetic_diseases') == 1 ? '' : 'disabled' }} />
            </div>
        </div>

        <!-- dad_mental_state -->
        <div class="medical-data w-100"
             @error('dad_mental_state')
             style="border-color: red"
             @enderror
             @error('dad_mental_state_com')
             style="border-color: red"
            @enderror
        >
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>ما هي الحالة النفسية للأب</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" value="0"
                           name="dad_mental_state"
                        {{ old('dad_mental_state') != null && old('dad_mental_state') == 0 ? 'checked' : '' }}/>
                    <label class="custom-control-label"> طبيعي </label>

                    <input type="radio" class="custom-control-input comment-tab"
                           value="1" name="dad_mental_state"
                        {{ old('dad_mental_state') != null && old('dad_mental_state') == 1 ? 'checked' : '' }}/>
                    <label class="custom-control-label">يعاني من مشاكل نفسية</label>
                </div>
            </div>
            <div class="comment">
                <input type="text" class="form-control"
                       placeholder="أذكر التعليق هنا..." name="dad_mental_state_com"
                       id="comment"
                       value="{{old('dad_mental_state_com')}}"
                       style="{{ old('dad_mental_state') != null && old('dad_mental_state') == 1 ? '' : 'visibility: hidden;' }}"
                    {{ old('dad_mental_state') != null && old('dad_mental_state') == 1 ? '' : 'disabled' }} />
            </div>
        </div>

        <!-- dad_health_problems -->
        <div class="medical-data w-100"
             @error('dad_health_problems')
             style="border-color: red"
             @enderror
             @error('dad_health_problems_com')
             style="border-color: red"
            @enderror
        >
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل يعاني الأب من مشاكل صحية أخرى</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input comment-tab"
                           value="1" name="dad_health_problems"
                        {{ old('dad_health_problems') != null && old('dad_health_problems') == 1 ? 'checked' : '' }}/>
                    <label class="custom-control-label"> نعم </label>

                    <input type="radio" class="custom-control-input" value="0"
                           name="dad_health_problems"
                        {{ old('dad_health_problems') != null && old('dad_health_problems') == 0 ? 'checked' : '' }}/>
                    <label class="custom-control-label">لا</label>
                </div>
            </div>
            <div class="comment">
                <input type="text" class="form-control"
                       placeholder="أذكر التعليق هنا..." name="dad_health_problems_com"
                       id="comment"
                       value="{{old('dad_health_problems_com')}}"
                       style="{{ old('dad_health_problems') != null && old('dad_health_problems') == 1 ? '' : 'visibility: hidden;' }}"
                    {{ old('dad_health_problems') != null && old('dad_health_problems') == 1 ? '' : 'disabled' }} />
            </div>
        </div>

        <!-- dad_communication -->
        <div class="medical-data w-100"
             @error('dad_communication')
             style="border-color: red"
             @enderror
             @error('dad_communication_com')
             style="border-color: red"
            @enderror
        >
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>ما هي درجة تواصل الأب مع الطفل</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input comment-tab"
                           value="good" name="dad_communication"
                        {{ old('dad_communication') != null && old('dad_communication') == 'good' ? 'checked' : '' }}/>
                    <label class="custom-control-label"> قوية </label>

                    <input type="radio" class="custom-control-input comment-tab"
                           value="medium" name="dad_communication"
                        {{ old('dad_communication') != null && old('dad_communication') == 'medium' ? 'checked' : '' }}/>
                    <label class="custom-control-label">متوسطة</label>

                    <input type="radio" class="custom-control-input comment-tab"
                           value="week" name="dad_communication"
                        {{ old('dad_communication') != null && old('dad_communication') == 'week' ? 'checked' : '' }}/>
                    <label class="custom-control-label">ضعيفة</label>
                </div>
            </div>

            <div class="comment">
                <input type="text" class="form-control"
                       placeholder="أذكر التعليق هنا ان وجد..." name="dad_communication_com" />
            </div>
        </div>
    </div>
</div>












