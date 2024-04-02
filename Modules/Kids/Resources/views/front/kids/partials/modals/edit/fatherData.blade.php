<div id="fatherMenuEdit" class="container tab-pane fade">
    <br/>

    <div class="text-data">
        <div class="form-title">
            <img src="{{asset('dist/front/assets/images/personal-information.jpg')}}"/>
            <h3>بيانات أساسية</h3>
        </div>

        <div class="form-group">
            <label>الاسم كاملاً </label>
            <input type="text" class="form-control"
                   name="dad_name" value="{{$kid->dad->name}}"/>
            @error('dad_name')
            <span class="text-danger">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                       {{ $message }}
                 </span>
            @enderror
        </div>

        <div class="form-group">
            <label>رقم الهوية</label>
            <input type="number" class="form-control" name="dad_num" value="{{$kid->dad->num}}"/>

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
                class="form-control datePicker" type="text"  value="{{$kid->dad->date}}" name="dad_date"/>
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
                <option disabled>اختر الحالة الاجتماعية...</option>
                <option value="married"
                        @if($kid->dad->marital_status == 'married') selected @endif>
                    متزوج
                </option>
                <option value="divorce"
                        @if($kid->dad->marital_status == 'divorce') selected @endif>
                    مطلق
                </option>
                <option value="Widower"
                        @if($kid->dad->marital_status == 'Widower') selected @endif>
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
            <input type="text" class="form-control" name="dad_phone" value="{{$kid->dad->phone}}"/>
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
                <option disabled>اختر المستوى التعليمي...</option>
                <option value="none" @if($kid->dad->learning == 'none') selected @endif>
                    أمّي
                </option>
                <option value="primary"
                        @if($kid->dad->learning == 'primary') selected @endif>
                    ابتدائي
                </option>
                <option value="middle" @if($kid->dad->learning == 'middle') selected @endif>
                    متوسط
                </option>
                <option value="secondary"
                        @if($kid->dad->learning == 'secondary') selected @endif>
                    ثانوي
                </option>
                <option value="diploma"
                        @if($kid->dad->learning == 'diploma') selected @endif>دبلوم
                </option>
                <option value="Bachelor"
                        @if($kid->dad->learning == 'Bachelor') selected @endif>
                    بكالوريس
                </option>
                <option value="Master" @if($kid->dad->learning == 'Master') selected @endif>
                    ماجستير
                </option>
                <option value="doctor" @if($kid->dad->learning == 'doctor') selected @endif>
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
            <select class="form-control" name="dad_work">
                <option disabled>اختر طبيعة العمل...</option>
                <option value="public_work"
                        @if($kid->dad->work == 'public_work') selected @endif>
                    موظف حكومي
                </option>
                <option value="private_work"
                        @if($kid->dad->work == 'private_work') selected @endif>
                    موظف قطاع خاص
                </option>
                <option value="free_work"
                        @if($kid->dad->work == 'free_work') selected @endif >
                    أعمال حرة
                </option>
                <option value="don't_work"
                        @if($kid->dad->work == "don't_work") selected @endif>
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
            @enderror
        >
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
                        @if($kid->dad->smoking == '1') checked @endif

                    />
                    <label class="custom-control-label"> نعم </label>

                    <input
                        type="radio"
                        class="custom-control-input comment-tab"
                        value="0"
                        name="dad_smoking"
                        @if($kid->dad->smoking == '0') checked @endif

                    />
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
                        @if($kid->dad->obstruction == '1') checked @endif

                    />
                    <label class="custom-control-label"> نعم </label>

                    <input
                        type="radio"
                        class="custom-control-input"
                        value="0"
                        name="dad_obstruction"
                        @if($kid->dad->obstruction == '0') checked @endif

                    />
                    <label class="custom-control-label">لا</label>
                </div>
            </div>
            <div class="comment">
                <input type="text" class="form-control"
                       placeholder="أذكر التعليق هنا..." name="dad_obstruction_com"
                       id="comment"
                       value="{{$kid->dad->obstruction_com}}"
                       style="{{ $kid->dad->obstruction != null && $kid->dad->obstruction == 1 ? '' : 'visibility: hidden;' }}"
                    {{ $kid->dad->obstruction != null && $kid->dad->obstruction == 1 ? '' : 'disabled' }} />
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
                        @if($kid->dad->chronic_diseases == '1') checked @endif

                    />
                    <label class="custom-control-label"> نعم </label>

                    <input
                        type="radio"
                        class="custom-control-input"
                        value="0"
                        name="dad_chronic_diseases"
                        @if($kid->dad->chronic_diseases == '0') checked @endif
                    />
                    <label class="custom-control-label">لا</label>
                </div>
            </div>
            <div class="comment">
                <input type="text" class="form-control"
                       placeholder="أذكر التعليق هنا..." name="dad_chronic_diseases_com"
                       id="comment"
                       value="{{$kid->dad->chronic_diseases_com}}"
                       style="{{ $kid->dad->chronic_diseases != null && $kid->dad->chronic_diseases == 1 ? '' : 'visibility: hidden;' }}"
                    {{ $kid->dad->chronic_diseases != null && $kid->dad->chronic_diseases == 1 ? '' : 'disabled' }} />
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
                        @if($kid->dad->genetic_diseases == '1') checked @endif

                    />
                    <label class="custom-control-label"> نعم </label>

                    <input
                        type="radio"
                        class="custom-control-input"
                        value="0"
                        name="dad_genetic_diseases"
                        @if($kid->dad->genetic_diseases == '0') checked @endif

                    />
                    <label class="custom-control-label">لا</label>
                </div>
            </div>
            <div class="comment">
                <input type="text" class="form-control"
                       placeholder="أذكر التعليق هنا..." name="dad_genetic_diseases_com"
                       id="comment"
                       value="{{$kid->dad->genetic_diseases_com}}"
                       style="{{ $kid->dad->genetic_diseases != null && $kid->dad->genetic_diseases == 1 ? '' : 'visibility: hidden;' }}"
                    {{ $kid->dad->genetic_diseases != null && $kid->dad->genetic_diseases == 1 ? '' : 'disabled' }} />
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
                    <input
                        type="radio"
                        class="custom-control-input"
                        value="0"
                        name="dad_mental_state"
                        @if($kid->dad->mental_state == '0') checked @endif

                    />
                    <label class="custom-control-label"> طبيعي </label>

                    <input
                        type="radio"
                        class="custom-control-input comment-tab"
                        value="1"
                        name="dad_mental_state"
                        @if($kid->dad->mental_state == '1') checked @endif

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
                       value="{{$kid->dad->mental_state_com}}"
                       style="{{ $kid->dad->mental_state != null && $kid->dad->mental_state == 1 ? '' : 'visibility: hidden;' }}"
                    {{ $kid->dad->mental_state != null && $kid->dad->mental_state == 1 ? '' : 'disabled' }} />
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
                    <input
                        type="radio"
                        class="custom-control-input comment-tab"
                        value="1"
                        name="dad_health_problems"
                        @if($kid->dad->health_problems == '1') checked @endif

                    />
                    <label class="custom-control-label"> نعم </label>

                    <input
                        type="radio"
                        class="custom-control-input"
                        value="0"
                        name="dad_health_problems"
                        @if($kid->dad->health_problems == '0') checked @endif

                    />
                    <label class="custom-control-label">لا</label>
                </div>
            </div>
            <div class="comment">
                <input type="text" class="form-control"
                       placeholder="أذكر التعليق هنا..." name="dad_health_problems_com"
                       id="comment"
                       value="{{$kid->dad->health_problems_com}}"
                       style="{{ $kid->dad->health_problems != null && $kid->dad->health_problems == 1 ? '' : 'visibility: hidden;' }}"
                    {{ $kid->dad->health_problems != null && $kid->dad->health_problems == 1 ? '' : 'disabled' }} />
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
                        @if($kid->dad->communication == 'good') checked @endif

                    />
                    <label class="custom-control-label"> قوية </label>

                    <input
                        type="radio"
                        class="custom-control-input comment-tab"
                        value="medium"
                        name="dad_communication"
                        @if($kid->dad->communication == 'medium') checked @endif

                    />
                    <label class="custom-control-label">متوسطة</label>
                    <input
                        type="radio"
                        class="custom-control-input comment-tab"
                        value="week"
                        name="dad_communication"
                        @if($kid->dad->communication == 'week') checked @endif

                    />
                    <label class="custom-control-label">ضعيفة</label>
                </div>
            </div>
            <div class="comment">
                <input
                    type="text" class="form-control" placeholder="أذكر التعليق هنا..."
                    name="dad_communication_com"
                    value="{{@$kid->dad->communication_com}}" />
            </div>
        </div>

    </div>
</div>
