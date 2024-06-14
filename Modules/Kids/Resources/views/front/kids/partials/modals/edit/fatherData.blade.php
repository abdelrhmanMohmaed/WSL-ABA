<div id="fatherMenuEdit" class="container tab-pane fade">
    <br/>

    <div class="text-data">
        <div class="form-title">
            <img src="{{asset('dist/front/assets/images/personal-information.jpg')}}"/>
            <h3>بيانات أساسية</h3>
        </div>

        <div class="form-group">
            <label>الاسم كاملاً </label>
            <input type="text" class="form-control" name="dad_name"
                   value="{{ $kid->dad->name ?? old('dad_name') }}"
                   placeholder="{{ $kid->dad->name ? '' : 'ادخل اسم الأب' }}"/>
            @error('dad_name')
            <span class="text-danger">
                <i class="fa fa-info-circle" aria-hidden="true"></i>
                {{ $message }}
            </span>
            @enderror
        </div>


        <div class="form-group">
            <label>رقم الهوية</label>
            <input type="number" class="form-control" name="dad_num" value="{{$kid->dad->num ?? old('dad_num') }}"
                   placeholder="{{ $kid->dad->num ? '' : 'ادخل رقم الهوية' }}"/>

            @error('dad_num')
            <span class=" text-danger">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="form-group form-date" style="position:relative">
            <label> تاريخ الميلاد</label>

            <input
                class="form-control datePicker" type="text" value="{{$kid->dad->date ?? old('dad_date')}}"
                name="dad_date"
                placeholder="{{ $kid->dad->num ? '' : 'ادخل تاريخ الميلاد' }}"/>

            <img src="{{asset('dist/front/assets/images/calender.png')}}"
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
                <option
                    value="married" {{ (old('dad_marital_status') == 'married' || $kid->dad->marital_status == 'married') ? 'selected' : '' }}>
                    متزوج
                </option>
                <option
                    value="divorce" {{ (old('dad_marital_status') == 'divorce' || $kid->dad->marital_status == 'divorce') ? 'selected' : '' }}>
                    مطلق
                </option>
                <option
                    value="Widower" {{ (old('dad_marital_status') == 'Widower' || $kid->dad->marital_status == 'Widower') ? 'selected' : '' }}>
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
            <label>رقم التواصل</label>
            <input type="text" class="form-control" name="dad_phone"
                   value="{{ $kid->dad->phone ?? old('dad_phone') }}"
                   placeholder="{{ $kid->dad->phone ? '' : 'ادخل رقم التواصل' }}"/>

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
                <option disabled selected>اختر المستوى التعليمي...</option>
                <option
                    value="none" {{ (old('dad_learning') == 'none' || $kid->dad->learning == 'none') ? 'selected' : '' }}>
                    أمّي
                </option>
                <option
                    value="primary" {{ (old('dad_learning') == 'primary' || $kid->dad->learning == 'primary') ? 'selected' : '' }}>
                    ابتدائي
                </option>
                <option
                    value="middle" {{ (old('dad_learning') == 'middle' || $kid->dad->learning == 'middle') ? 'selected' : '' }}>
                    متوسط
                </option>
                <option
                    value="secondary" {{ (old('dad_learning') == 'secondary' || $kid->dad->learning == 'secondary') ? 'selected' : '' }}>
                    ثانوي
                </option>
                <option
                    value="diploma" {{ (old('dad_learning') == 'diploma' || $kid->dad->learning == 'diploma') ? 'selected' : '' }}>
                    دبلوم
                </option>
                <option
                    value="Bachelor" {{ (old('dad_learning') == 'Bachelor' || $kid->dad->learning == 'Bachelor') ? 'selected' : '' }}>
                    بكالوريس
                </option>
                <option
                    value="Master" {{ (old('dad_learning') == 'Master' || $kid->dad->learning == 'Master') ? 'selected' : '' }}>
                    ماجستير
                </option>
                <option
                    value="doctor" {{ (old('dad_learning') == 'doctor' || $kid->dad->learning == 'doctor') ? 'selected' : '' }}>
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
            <label>طبيعة العمل</label>
            <select class="form-control" name="dad_work">
                <option disabled selected>اختر طبيعة العمل...</option>
                <option
                    value="public_work" {{ (old('dad_work') == 'public_work' || $kid->dad->work == 'public_work') ? 'selected' : '' }}>
                    موظف حكومي
                </option>
                <option
                    value="private_work" {{ (old('dad_work') == 'private_work' || $kid->dad->work == 'private_work') ? 'selected' : '' }}>
                    موظف قطاع خاص
                </option>
                <option
                    value="free_work" {{ (old('dad_work') == 'free_work' || $kid->dad->work == 'free_work') ? 'selected' : '' }}>
                    أعمال حرة
                </option>
                <option
                    value="don't_work" {{ (old('dad_work') == "don't_work" || $kid->dad->work == "don't_work") ? 'selected' : '' }}>
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
            <img src="{{asset('dist/front/assets/images/medical 1.jpg')}}"/>
            <h3>بيانات صحية</h3>
        </div>
        <!-- dad_smoking -->
        <div class="medical-data w-100"
             @error('dad_smoking')
             style="border-color: red"
            @enderror >
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل الأب مدخن</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input
                        type="radio"
                        class="custom-control-input"
                        value="1"
                        name="dad_smoking"
                        @if(old('dad_smoking') == '1' || $kid->dad->smoking == '1') checked @endif />
                    <label class="custom-control-label"> نعم </label>

                    <input
                        type="radio"
                        class="custom-control-input comment-tab"
                        value="0"
                        name="dad_smoking"
                        @if(old('dad_smoking') == '0' || $kid->dad->smoking == '0') checked @endif />
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
                    <input
                        type="radio"
                        class="custom-control-input comment-tab"
                        value="1"
                        name="dad_obstruction"
                        @if(old('dad_obstruction') == '1' || $kid->dad->obstruction == '1') checked @endif

                    />
                    <label class="custom-control-label"> نعم </label>

                    <input
                        type="radio"
                        class="custom-control-input"
                        value="0"
                        name="dad_obstruction"
                        @if(old('dad_obstruction') == '0' || $kid->dad->obstruction == '0') checked @endif

                    />
                    <label class="custom-control-label">لا</label>
                </div>
            </div>
            <div class="comment">
                <input type="text" class="form-control"
                       placeholder="أذكر التعليق هنا..." name="dad_obstruction_com"
                       id="comment"
                       value="{{$kid->dad->obstruction_com??old('dad_obstruction_com')}}"
                       style="{{ ($kid->dad->obstruction != null && $kid->dad->obstruction == 1) || old('dad_obstruction') == '1' ? '' : 'visibility: hidden;' }}"
                    {{ ($kid->dad->obstruction != null && $kid->dad->obstruction == 1 )|| old('dad_obstruction') == '1'? '' : 'disabled' }} />
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
                    <input
                        type="radio"
                        class="custom-control-input comment-tab"
                        value="1"
                        name="dad_chronic_diseases"
                        @if(old('dad_chronic_diseases') == '1' || $kid->dad->chronic_diseases == '1') checked @endif

                    />
                    <label class="custom-control-label"> نعم </label>

                    <input
                        type="radio"
                        class="custom-control-input"
                        value="0"
                        name="dad_chronic_diseases"
                        @if(old('dad_chronic_diseases') == '0' || $kid->dad->chronic_diseases == '0') checked @endif
                    />
                    <label class="custom-control-label">لا</label>
                </div>
            </div>
            <div class="comment">
                <input type="text" class="form-control"
                       placeholder="أذكر التعليق هنا..." name="dad_chronic_diseases_com"
                       id="comment"
                       value="{{$kid->dad->chronic_diseases_com??old('dad_chronic_diseases_com')}}"
                       style="{{ ($kid->dad->chronic_diseases != null && $kid->dad->chronic_diseases == 1 )|| old('dad_chronic_diseases') == '1'? '' : 'visibility: hidden;' }}"
                    {{ ($kid->dad->chronic_diseases != null && $kid->dad->chronic_diseases == 1 )|| old('dad_chronic_diseases') == '1'? '' : 'disabled' }} />
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
                    <input
                        type="radio"
                        class="custom-control-input comment-tab"
                        value="1"
                        name="dad_genetic_diseases"
                        @if(old('dad_genetic_diseases') == '1' || $kid->dad->genetic_diseases == '1') checked @endif

                    />
                    <label class="custom-control-label"> نعم </label>

                    <input
                        type="radio"
                        class="custom-control-input"
                        value="0"
                        name="dad_genetic_diseases"
                        @if(old('dad_genetic_diseases') == '0' || $kid->dad->genetic_diseases == '0') checked @endif

                    />
                    <label class="custom-control-label">لا</label>
                </div>
            </div>
            <div class="comment">
                <input type="text" class="form-control"
                       placeholder="أذكر التعليق هنا..." name="dad_genetic_diseases_com"
                       id="comment"
                       value="{{$kid->dad->genetic_diseases_com??old('genetic_diseases_com')}}"
                       style="{{ ($kid->dad->genetic_diseases != null && $kid->dad->genetic_diseases == 1) || old('dad_genetic_diseases') == '1' ? '' : 'visibility: hidden;' }}"
                    {{ ($kid->dad->genetic_diseases != null && $kid->dad->genetic_diseases == 1) || old('dad_genetic_diseases') == '1' ? '' : 'disabled' }} />
            </div>
        </div>
        <!-- dad_mental_state -->
        <div class="medical-data w-100"
             @error('dad_mental_state')
             style="border-color: red"
             @enderror
             @error('dad_mental_state_com')
             style="border-color: red"
            @enderror>
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>ما هي الحالة النفسية للأب</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input
                        type="radio"
                        class="custom-control-input"
                        value="0"
                        name="dad_mental_state"
                        @if(old('dad_mental_state') == '0' || $kid->dad->mental_state == '0') checked @endif

                    />
                    <label class="custom-control-label"> طبيعي </label>

                    <input
                        type="radio"
                        class="custom-control-input comment-tab"
                        value="1"
                        name="dad_mental_state"
                        @if(old('dad_mental_state') == '1' || $kid->dad->mental_state == '1') checked @endif

                    />
                    <label class="custom-control-label"
                    >يعاني من مشاكل نفسية</label
                    >
                </div>
            </div>
            <div class="comment">
                <input type="text" class="form-control"
                       placeholder="أذكر التعليق هنا..." name="dad_mental_state_com"
                       id="comment"
                       value="{{$kid->dad->mental_state_com??old('dad_mental_state_com')}}"
                       style="{{ ($kid->dad->mental_state != null && $kid->dad->mental_state == 1) || old('dad_mental_state') == '1'? '' : 'visibility: hidden;' }}"
                    {{ ($kid->dad->mental_state != null && $kid->dad->mental_state == 1) || old('dad_mental_state') == '1'? '' : 'disabled' }} />
            </div>
        </div>

        <!-- dad_health_problems -->
        <div class="medical-data w-100"
             @error('dad_health_problems')
             style="border-color: red"
             @enderror
             @error('dad_health_problems_com')
             style="border-color: red"
            @enderror>
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل يعاني الأب من مشاكل صحية أخرى</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input
                        type="radio"
                        class="custom-control-input comment-tab"
                        value="1"
                        name="dad_health_problems"
                        @if(old('dad_health_problems') == '1' || $kid->dad->health_problems == '1') checked @endif

                    />
                    <label class="custom-control-label"> نعم </label>

                    <input
                        type="radio"
                        class="custom-control-input"
                        value="0"
                        name="dad_health_problems"
                        @if(old('dad_health_problems') == '0' || $kid->dad->health_problems == '0') checked @endif

                    />
                    <label class="custom-control-label">لا</label>
                </div>
            </div>
            <div class="comment">
                <input type="text" class="form-control"
                       placeholder="أذكر التعليق هنا..." name="dad_health_problems_com"
                       id="comment"
                       value="{{$kid->dad->health_problems_com??old('dad_health_problems_com')}}"
                       style="{{ ($kid->dad->health_problems != null && $kid->dad->health_problems == 1) || old('dad_health_problems') == '1'? '' : 'visibility: hidden;' }}"
                    {{ ($kid->dad->health_problems != null && $kid->dad->health_problems == 1) || old('dad_health_problems') == '1'? '' : 'disabled' }} />
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
                    <input
                        type="radio"
                        class="custom-control-input comment-tab"
                        value="good"
                        name="dad_communication"
                        @if(old('dad_communication') == 'good' || $kid->dad->communication == 'good') checked @endif

                    />
                    <label class="custom-control-label"> قوية </label>

                    <input
                        type="radio"
                        class="custom-control-input comment-tab"
                        value="medium"
                        name="dad_communication"
                        @if(old('dad_communication') == 'medium' || $kid->dad->communication == 'medium') checked @endif

                    />
                    <label class="custom-control-label">متوسطة</label>
                    <input
                        type="radio"
                        class="custom-control-input comment-tab"
                        value="week"
                        name="dad_communication"
                        @if(old('dad_communication') == 'week' || $kid->dad->communication == 'week') checked @endif

                    />
                    <label class="custom-control-label">ضعيفة</label>
                </div>
            </div>
            <div class="comment">
                <input
                    type="text" class="form-control" placeholder="أذكر التعليق هنا..."
                    name="dad_communication_com"
                    value="{{@$kid->dad->communication_com??old('dad_communication_com')}}"/>
            </div>
        </div>

    </div>
</div>
