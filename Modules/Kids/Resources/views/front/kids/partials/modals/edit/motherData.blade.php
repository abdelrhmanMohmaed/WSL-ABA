<div id="motherMenuEdit" class="container tab-pane fade">
    <br />
    <div class="text-data">
        <div class="form-title">
            <img src="{{ asset('dist/front/assets/images/personal-information.jpg') }}" />
            <h3>بيانات أساسية</h3>
        </div>

        <div class="form-group">
            <label>الاسم كاملاً </label>
            <input type="text" class="form-control" name="mom_name" value="{{ $kid->mom->name ?? old('mom_name') }}"
                placeholder="{{ $kid->mom->name ? '' : 'ادخل اسم الأم' }}" />
            @error('mom_name')
                <span class="text-danger">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label>رقم الهوية</label>
            <input type="number" class="form-control" name="mom_num" value="{{ $kid->mom->num ?? old('mom_num') }}"
                placeholder="{{ $kid->mom->num ? '' : 'ادخل رقم الهوية' }}" />
            @error('mom_num')
                <span class="text-danger">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="form-group form-date" style="position:relative">
            <label> تاريخ الميلاد</label>

            <input class="form-control datePicker" type="text" name="mom_date"
                value="{{ $kid->mom->date ?? old('mom_date') }}"
                placeholder="{{ $kid->mom->date ? '' : 'ادخل تاريخ الميلاد' }}" />
            <img src="{{ asset('dist/front/assets/images/calender.png') }}" class="datepickerimg" width="20px"
                alt="">
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
                <option value="married"
                    {{ old('mom_marital_status') == 'married' || $kid->mom->marital_status == 'married' ? 'selected' : '' }}>
                    متزوج
                </option>
                <option value="divorce"
                    {{ old('mom_marital_status') == 'divorce' || $kid->mom->marital_status == 'divorce' ? 'selected' : '' }}>
                    مطلق
                </option>
                <option value="Widower"
                    {{ old('mom_marital_status') == 'Widower' || $kid->mom->marital_status == 'Widower' ? 'selected' : '' }}>
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
            <input type="phone" class="form-control" name="mom_phone"
                value="{{ $kid->mom->phone ?? old('mom_phone') }}"
                placeholder="{{ $kid->mom->phone ? '' : 'ادخل رقم التواصل' }}" />
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
                <option disabled selected>اختر المستوى التعليمي...</option>
                <option value="none"
                    {{ old('mom_learning') == 'none' || $kid->mom->learning == 'none' ? 'selected' : '' }}>
                    أمّي
                </option>
                <option value="primary"
                    {{ old('mom_learning') == 'primary' || $kid->mom->learning == 'primary' ? 'selected' : '' }}>
                    ابتدائي
                </option>
                <option value="middle"
                    {{ old('mom_learning') == 'middle' || $kid->mom->learning == 'middle' ? 'selected' : '' }}>
                    متوسط
                </option>
                <option value="secondary"
                    {{ old('mom_learning') == 'secondary' || $kid->mom->learning == 'secondary' ? 'selected' : '' }}>
                    ثانوي
                </option>
                <option value="diploma"
                    {{ old('mom_learning') == 'diploma' || $kid->mom->learning == 'diploma' ? 'selected' : '' }}>
                    دبلوم
                </option>
                <option value="Bachelor"
                    {{ old('mom_learning') == 'Bachelor' || $kid->mom->learning == 'Bachelor' ? 'selected' : '' }}>
                    بكالوريس
                </option>
                <option value="Master"
                    {{ old('mom_learning') == 'Master' || $kid->mom->learning == 'Master' ? 'selected' : '' }}>
                    ماجستير
                </option>
                <option value="doctor"
                    {{ old('mom_learning') == 'doctor' || $kid->mom->learning == 'doctor' ? 'selected' : '' }}>
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
                <option disabled selected>اختر طبيعة العمل...</option>
                <option value="public_work"
                    {{ old('mom_work') == 'public_work' || $kid->mom->work == 'public_work' ? 'selected' : '' }}>
                    موظف حكومي
                </option>
                <option value="private_work"
                    {{ old('mom_work') == 'private_work' || $kid->mom->work == 'private_work' ? 'selected' : '' }}>
                    موظف قطاع خاص
                </option>
                <option value="free_work"
                    {{ old('mom_work') == 'free_work' || $kid->mom->work == 'free_work' ? 'selected' : '' }}>
                    أعمال حرة
                </option>
                <option value="don't_work"
                    {{ old('mom_work') == "don't_work" || $kid->mom->work == "don't_work" ? 'selected' : '' }}>
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
            <img src="{{ asset('dist/front/assets/images/medical 1.jpg') }}" />
            <h3>بيانات صحية</h3>
        </div>
        <!-- mom_smoking -->
        <div class="medical-data w-100"
            @error('mom_smoking')
             style="border-color: red"
            @enderror>
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title ">
                    <h4>هل الأم مدخنة</h4>
                </div>
                <div class="custom-control custom-radio ">
                    <input type="radio" class="custom-control-input" value="1" name="mom_smoking"
                        @if (old('mom_smoking') == '1' || $kid->mom->smoking == '1') checked @endif />
                    <label class="custom-control-label"> نعم </label>

                    <input type="radio" class="custom-control-input" value="0" name="mom_smoking"
                        @if (old('mom_smoking') == '0' || $kid->mom->smoking == '0') checked @endif />
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
            @enderror>
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل لدى الأم إعاقة</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input comment-tab" value="1"
                        name="mom_obstruction" @if (old('mom_obstruction') == '1' || $kid->mom->obstruction == '1') checked @endif />
                    <label class="custom-control-label"> نعم </label>

                    <input type="radio" class="custom-control-input" value="0" name="mom_obstruction"
                        @if (old('mom_obstruction') == '0' || $kid->mom->obstruction == '0') checked @endif />
                    <label class="custom-control-label">لا</label>
                </div>
            </div>
            <div class="comment">
                <input type="text" class="form-control" placeholder="أذكر التعليق هنا..."
                    name="mom_obstruction_com" id="comment" value="{{ $kid->mom->obstruction_com }}"
                    style="{{ ($kid->mom->obstruction != null && $kid->mom->obstruction == '1') || old('mom_obstruction') == '1' ? '' : 'visibility: hidden;' }}"
                    {{ ($kid->mom->obstruction != null && $kid->mom->obstruction == '1') || old('mom_obstruction') == '1' ? '' : 'disabled' }} />
            </div>
        </div>
        <!-- mom_chronic_diseases -->
        <div class="medical-data w-100"
            @error('mom_chronic_diseases')
             style="border-color: red"
             @enderror
            @error('mom_chronic_diseases_com')
             style="border-color: red"
            @enderror>
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل تعاني الأم من أمراض مزمنة</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input comment-tab" value="1"
                        name="mom_chronic_diseases" @if (old('mom_chronic_diseases') == '1' || $kid->mom->chronic_diseases == '1') checked @endif />
                    <label class="custom-control-label"> نعم </label>

                    <input type="radio" class="custom-control-input" value="0" name="mom_chronic_diseases"
                        @if (old('mom_chronic_diseases') == '0' || $kid->mom->chronic_diseases == '0') checked @endif />
                    <label class="custom-control-label">لا</label>
                </div>
            </div>
            <div class="comment">
                <input type="text" class="form-control" placeholder="أذكر التعليق هنا..."
                    name="mom_chronic_diseases_com" id="comment" value="{{ $kid->mom->chronic_diseases_com }}"
                    style="{{ ($kid->mom->chronic_diseases != null && $kid->mom->chronic_diseases) == '1' || old('mom_chronic_diseases') == '1' ? '' : 'visibility: hidden;' }}"
                    {{ ($kid->mom->chronic_diseases != null && $kid->mom->chronic_diseases) == '1' || old('mom_chronic_diseases') == '1' ? '' : 'disabled' }} />
            </div>
        </div>
        <!-- mom_genetic_diseases -->
        <div class="medical-data w-100"
            @error('mom_genetic_diseases')
             style="border-color: red"
             @enderror
            @error('mom_genetic_diseases_com')
             style="border-color: red"
            @enderror>
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل تعاني الأم من أمراض وراثية</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input comment-tab" value="1"
                        name="mom_genetic_diseases" @if (old('mom_genetic_diseases') == '1' || $kid->mom->genetic_diseases == '1') checked @endif />
                    <label class="custom-control-label"> نعم </label>

                    <input type="radio" class="custom-control-input" value="0" name="mom_genetic_diseases"
                        @if (old('mom_genetic_diseases') == '0' || $kid->mom->genetic_diseases == '0') checked @endif />
                    <label class="custom-control-label">لا</label>
                </div>
            </div>
            <div class="comment">
                <input type="text" class="form-control" placeholder="أذكر التعليق هنا..."
                    name="mom_genetic_diseases_com" id="comment"
                    value="{{ $kid->mom->genetic_diseases_com ?? old('mom_genetic_diseases_com') }}"
                    style="{{ ($kid->mom->genetic_diseases != null && $kid->mom->genetic_diseases) == '1' || old('mom_genetic_diseases') == '1' ? '' : 'visibility: hidden;' }}"
                    {{ ($kid->mom->genetic_diseases != null && $kid->mom->genetic_diseases) == '1' || old('mom_genetic_diseases') == '1' ? '' : 'disabled' }} />
            </div>
        </div>
        <!-- mom_mental_state -->
        <div class="medical-data w-100"
            @error('mom_mental_state')
             style="border-color: red"
             @enderror
            @error('mom_mental_state_com')
             style="border-color: red"
            @enderror>
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل تعاني الأم من مشاكل صحية أخرى</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input comment-tab" value="1"
                        name="mom_health_problems" @if (old('mom_health_problems') == '1' || $kid->mom->health_problems == '1') checked @endif />
                    <label class="custom-control-label"> نعم </label>

                    <input type="radio" class="custom-control-input" value="0" name="mom_health_problems"
                        @if (old('mom_health_problems') == '0' || $kid->mom->health_problems == '0') checked @endif />
                    <label class="custom-control-label">لا</label>
                </div>
            </div>
            <div class="comment">
                <input type="text" class="form-control" placeholder="أذكر التعليق هنا..."
                    name="mom_mental_state_com" id="comment" value="{{ $kid->mom->mental_state_com }}"
                    style="{{ ($kid->mom->mental_state != null && $kid->mom->mental_state) == 1 || old('mom_mental_state') == '1' ? '' : 'visibility: hidden;' }}"
                    {{ ($kid->mom->mental_state != null && $kid->mom->mental_state) == 1 || old('mom_mental_state') == '1' ? '' : 'disabled' }} />
            </div>
        </div>

        <!-- mom_health_problems -->
        <div class="medical-data w-100"
            @error('mom_health_problems')
             style="border-color: red"
             @enderror
            @error('mom_health_problems_com')
             style="border-color: red"
            @enderror>
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>ما هي الحالة النفسية للأم</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" value="0" name="mom_mental_state"
                        @if (old('mom_mental_state') == '0' || $kid->mom->mental_state == '0') checked @endif />
                    <label class="custom-control-label"> طبيعي </label>

                    <input type="radio" class="custom-control-input comment-tab" value="1"
                        name="mom_mental_state" @if (old('mom_mental_state') == '1' || $kid->mom->mental_state == '1') checked @endif />
                    <label class="custom-control-label">تعاني من مشاكل نفسية</label>
                </div>
            </div>
            <div class="comment">
                <input type="text" class="form-control" placeholder="أذكر التعليق هنا..."
                    name="mom_health_problems_com" id="comment" value="{{ $kid->mom->health_problems_com }}"
                    style="{{ ($kid->mom->health_problems != null && $kid->mom->health_problems) == 1 || old('mom_health_problems') == '1' ? '' : 'visibility: hidden;' }}"
                    {{ ($kid->mom->health_problems != null && $kid->mom->health_problems) == 1 || old('mom_health_problems') == '1' ? '' : 'disabled' }} />
            </div>
        </div>
        <!-- mom_communication -->
        <div class="medical-data w-100"
            @error('mom_communication')
             style="border-color: red"
             @enderror
            @error('mom_communication_com')
             style="border-color: red"
            @enderror>
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>ما هي درجة تواصل الأم مع الطفل</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input comment-tab" value="good"
                        name="mom_communication" @if (old('mom_communication') == 'good' || $kid->mom->communication == 'good') checked @endif />
                    <label class="custom-control-label"> قوية </label>

                    <input type="radio" class="custom-control-input comment-tab" value="medium"
                        name="mom_communication" @if (old('mom_communication') == 'medium' || $kid->mom->communication == 'medium') checked @endif />
                    <label class="custom-control-label">متوسطة</label>

                    <input type="radio" class="custom-control-input comment-tab" value="week"
                        name="mom_communication" @if (old('mom_communication') == 'week' || $kid->mom->communication == 'week') checked @endif />
                    <label class="custom-control-label">ضعيفة</label>
                </div>
            </div>

            <div class="comment">
                <input type="text" class="form-control" name="mom_communication_com"
                    placeholder="{{ $kid->mom->communication_com ? '' : 'أذكر التعليق هنا...' }}"
                    value="{{ @$kid->mom->communication_com ?? old('mom_communication_com') }}" />
            </div>
        </div>
        <!-- 1- mom_pregnancy -->
        <div class="medical-data w-100"
            @error('mom_pregnancy')
            style="border-color: red"
             @enderror
            @error('mom_pregnancy_com')
             style="border-color: red"
            @enderror>
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل الحمل بالطفل كان</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" value="0" name="mom_pregnancy"
                        @if (old('mom_pregnancy') == '0' || $kid->mom->pregnancy == '0') checked @endif />
                    <label class="custom-control-label"> طبيعي </label>

                    <input type="radio" class="custom-control-input" value="2" name="mom_pregnancy"
                        @if (old('mom_pregnancy') == '2' || $kid->mom->pregnancy == '2') checked @endif />
                    <label class="custom-control-label">أطفال أنابيب</label>

                    <input type="radio" class="custom-control-input comment-tab" value="1"
                        name="mom_pregnancy" @if (old('mom_pregnancy') == '1' || $kid->mom->pregnancy == '1') checked @endif />
                    <label class="custom-control-label">أخرى</label>
                </div>
            </div>

            <div class="comment">
                <input type="text" class="form-control" name="mom_pregnancy_com"
                    placeholder="أذكر التعليق هنا..." id="comment" value="{{ $kid->mom->pregnancy_com }}"
                    style="{{ ($kid->mom->pregnancy != null && $kid->mom->pregnancy) == 1 || old('mom_pregnancy') == '1' ? '' : 'visibility: hidden;' }}"
                    {{ ($kid->mom->pregnancy != null && $kid->mom->pregnancy) == 1 || old('mom_pregnancy') == '1' ? '' : 'disabled' }} />
            </div>
        </div>
        <!-- mom_pregnancy_month -->
        <div class="medical-data w-100"
            @error('mom_pregnancy_month')
             style="border-color: red"
            @enderror>
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>كم كانت أشهر الحمل بالطفل</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" value="7" name="mom_pregnancy_month"
                        @if (old('mom_pregnancy_month') == '7' || $kid->mom->pregnancy_month == '7') checked @endif />
                    <label class="custom-control-label"> 7 شهور </label>

                    <input type="radio" class="custom-control-input" value="8" name="mom_pregnancy_month"
                        @if (old('mom_pregnancy_month') == '8' || $kid->mom->pregnancy_month == '8') checked @endif />
                    <label class="custom-control-label">8 شهور </label>

                    <input type="radio" class="custom-control-input" value="9" name="mom_pregnancy_month"
                        @if (old('mom_pregnancy_month') == '9' || $kid->mom->pregnancy_month == '9') checked @endif />
                    <label class="custom-control-label">9 شهور</label>

                    <input type="radio" class="custom-control-input" value="10" name="mom_pregnancy_month"
                        @if (old('mom_pregnancy_month') == '10' || $kid->mom->pregnancy_month == '10') checked @endif />
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
            @enderror>
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل كانت هناك مشاكل صحية أثناء الحمل</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input comment-tab" value="1"
                        name="mom_pregnancy_problems" @if (old('mom_pregnancy_problems') == '1' || $kid->mom->pregnancy_problems == '1') checked @endif />
                    <label class="custom-control-label"> نعم </label>

                    <input type="radio" class="custom-control-input" value="0" name="mom_pregnancy_problems"
                        @if (old('mom_pregnancy_problems') == '0' || $kid->mom->pregnancy_problems == '0') checked @endif />
                    <label class="custom-control-label">لا</label>
                </div>
            </div>
            <div class="comment">
                <input type="text" class="form-control" name="mom_pregnancy_problems_com"
                    placeholder="أذكر التعليق هنا..." id="comment" value="{{ $kid->mom->pregnancy_problems_com }}"
                    style="{{ ($kid->mom->birth_problems != null && $kid->mom->pregnancy_problems) == 1 || old('mom_pregnancy_problems') == '1' ? '' : 'visibility: hidden;' }}"
                    {{ ($kid->mom->birth_problems != null && $kid->mom->pregnancy_problems) == 1 || old('mom_pregnancy_problems') == '1' ? '' : 'disabled' }} />
            </div>
        </div>
        <!-- mom_birth_status -->
        <div class="medical-data w-100"
            @error('mom_birth_status')
            style="border-color: red"
            @enderror>
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل كانت ولادة الطفل</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" value="1" name="mom_birth_status"
                        @if (old('mom_birth_status') == '1' || $kid->mom->birth_status == '1') checked @endif />
                    <label class="custom-control-label"> طبيعية </label>

                    <input type="radio" class="custom-control-input" value="0" name="mom_birth_status"
                        @if (old('mom_birth_status') == '0' || $kid->mom->birth_status == '0') checked @endif />
                    <label class="custom-control-label">قيصرية</label>
                </div>
            </div>
        </div>
        <!-- mom_birth_problems -->
        <div class="medical-data w-100"
            @error('mom_birth_problems')
            style="border-color: red"
             @enderror
            @error('mom_birth_problems_com')
             style="border-color: red"
            @enderror>
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل كانت هناك مشاكل أثناء الولادة</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input comment-tab" value="1"
                        name="mom_birth_problems" @if (old('mom_birth_problems') == '1' || $kid->mom->birth_problems == '1') checked @endif />
                    <label class="custom-control-label"> نعم </label>

                    <input type="radio" class="custom-control-input" value="0" name="mom_birth_problems"
                        @if (old('mom_birth_problems') == '0' || $kid->mom->birth_problems == '0') checked @endif />
                    <label class="custom-control-label">لا</label>
                </div>
            </div>


            <div class="comment">
                <input type="text" class="form-control" name="mom_birth_problems_com"
                    placeholder="أذكر التعليق هنا..." id="comment" value="{{ $kid->mom->birth_problems_com }}"
                    style="{{ ($kid->mom->birth_problems != null && $kid->mom->birth_problems) == 1 || old('mom_birth_problems') == '1' ? '' : 'visibility: hidden;' }}"
                    {{ ($kid->mom->birth_problems != null && $kid->mom->birth_problems) == 1 || old('mom_birth_problems') == '1' ? '' : 'disabled' }} />
            </div>
        </div>
        <!-- mom_birth_after_problems -->
        <div class="medical-data w-100"
            @error('mom_birth_after_problems')
            style="border-color: red"
             @enderror
            @error('mom_birth_after_problems_com')
             style="border-color: red"
            @enderror>
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل كانت هناك مشاكل بعد الولادة</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input comment-tab" value="1"
                        name="mom_birth_after_problems" @if (old('mom_birth_after_problems') == '1' || $kid->mom->birth_after_problems == '1') checked @endif />
                    <label class="custom-control-label"> نعم </label>

                    <input type="radio" class="custom-control-input" value="0"
                        name="mom_birth_after_problems" @if (old('mom_birth_after_problems') == '0' || $kid->mom->birth_after_problems == '0') checked @endif />
                    <label class="custom-control-label">لا</label>
                </div>
            </div>
            <div class="comment">
                <input type="text" class="form-control" name="mom_birth_after_problems_com"
                    placeholder="أذكر التعليق هنا..." id="comment"
                    value="{{ $kid->mom->birth_after_problems_com }}"
                    style="{{ ($kid->mom->birth_after_problems != null && $kid->mom->birth_after_problems) == 1 || old('mom_birth_after_problems') == '1' ? '' : 'visibility: hidden;' }}"
                    {{ ($kid->mom->birth_after_problems != null && $kid->mom->birth_after_problems) == 1 || old('mom_birth_after_problems') == '1' ? '' : 'disabled' }} />
            </div>
        </div>
        <!-- mom_lactation -->
        <div class="medical-data w-100"
            @error('mom_lactation')
             style="border-color: red"
            @enderror>
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل الرضاعة كانت طبيعية</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" value="1" name="mom_lactation"
                        @if (old('mom_lactation') == '1' || $kid->mom->lactation == '1') checked @endif />
                    <label class="custom-control-label"> نعم </label>

                    <input type="radio" class="custom-control-input" value="0" name="mom_lactation"
                        @if (old('mom_lactation') == '0' || $kid->mom->lactation == '0') checked @endif />
                    <label class="custom-control-label">لا</label>
                </div>
            </div>

            {{--            <div class="comment"> --}}
            {{--                <input --}}
            {{--                    type="text" --}}
            {{--                    class="form-control" --}}
            {{--                    id="comment" --}}
            {{--                    name="mom_lactation_com" --}}
            {{--                    placeholder="أذكر التعليق هنا..." --}}
            {{--                    value="{{@$kid->mom->lactation_com}}"/> --}}
            {{--            </div> --}}
        </div>
    </div>
</div>
