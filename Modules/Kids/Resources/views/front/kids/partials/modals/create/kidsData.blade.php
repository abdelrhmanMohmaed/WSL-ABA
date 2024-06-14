<div id="kidsMenu" class="container tab-pane active">
    <br />

    <div class="text-data">
        <div class="form-title">
            <img src="{{ asset('dist/front/assets/images/personal-information.jpg') }}" />
            <h3>بيانات أساسية</h3>
        </div>

        <div class="form-group">
            <label for="name">الاسم كاملاً </label>
            <input id="name" type="text" name="name" placeholder="أدخل اسم كاملاً..." class="form-control"
                value="{{ old('name') }}" />
            @error('name')
                <span class="text-danger">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label>رقم الهوية</label>
            <input type="number" class="form-control" placeholder="أدخل رقم الهوية..." value="{{ old('num') }}"
                name="num" maxlength="14" />
            @error('num')
                <span class="text-danger">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="form-group form-date">
            <label> تاريخ الميلاد</label>
            <input class="form-control datePicker" placeholder="أدخل تاريخ الميلاد..." value="{{ old('date') }}"
                type="text" name="date" />
            <img src="{{ asset('dist/front/assets/images/calender.png') }}" class="datepickerimg mt-1" width="20px"
                alt="">
            @error('date')
                <span class="text-danger">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label>مكان الميلاد</label>
            <input type="text" class="form-control" value="{{ old('place_date') }}" name="place_date"
                placeholder="أدخل مكان الميلاد..." />
            @error('place_date')
                <span class="text-danger">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="gender">الجنس</label>
            <select name="gender" id="gender" class="form-control">
                <option selected disabled>اختر الجنس...</option>
                <option value="1" @selected(old('gender') == 1 && old('gender') != null)>ذكر</option>
                <option value="0" @selected(old('gender') == 0 && old('gender') != null)>أنثي</option>
            </select>
            @error('gender')
                <span class="text-danger">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="form-group" style="position:relative;">
            <label>الجنسية</label>
            <input id="name" type="text" name="nationality" placeholder="أدخل الجنسية..." class="form-control"
                value="{{ old('nationality') }}" />
            @error('nationality')
                <span class="text-danger">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="form-group" style="position:relative;">
            <label>الدولة</label>
            <select name="country_id" class="form-control js-example-basic-single country">
                <option selected disabled>اختار الدولة...</option>
                @foreach ($countries as $item)
                    <option value="{{ $item->id }}" @selected(old('country_id') == $item->id)>{{ $item->name_ar }}</option>
                @endforeach
            </select>
            @error('country_id')
                <span class="text-danger">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                    {{ $message }}
                </span>
            @enderror
        </div>


        <div class="form-group" style="position:relative">
            <label>المدينة </label>

            <select name="city_id" class="form-control cities js-example-basic-single">
                <option disabled selected>قم باختيار الدولة من ثمة المدينة ...</option>
                <!-- Display by ajax request -->
            </select>
            @error('city_id')
                <span class="text-danger">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="name">رقم التواصل </label>
            <input type="tel" name="phone" placeholder="+0965612546" class="form-control"
                value="{{ old('phone') }}" />
            @error('phone')
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

        <!-- other_obstruction -->
        <div class="medical-data w-100"
            @error('other_obstruction')
             style="border-color: red"
             @enderror
            @error('other_obstruction_com')
             style="border-color: red"
            @enderror>
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل لدى الطفل اعاقات أخرى</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input comment-tab" value="1"
                        name="other_obstruction"
                        {{ old('other_obstruction') != null && old('other_obstruction') == 1 ? 'checked' : '' }} />
                    <label class="custom-control-label"> نعم </label>

                    <input type="radio" class="custom-control-input" value="0" name="other_obstruction"
                        {{ old('other_obstruction') != null && old('other_obstruction') == 0 ? 'checked' : '' }} />
                    <label class="custom-control-label">لا</label>
                </div>
            </div>
            <div class="comment">
                <input type="text" class="form-control" placeholder="أذكر التعليق هنا..."
                    name="other_obstruction_com" id="comment" value="{{ old('other_obstruction_com') }}"
                    style="{{ old('other_obstruction') != null && old('other_obstruction') == 1 ? '' : 'visibility: hidden;' }}"
                    {{ old('other_obstruction') != null && old('other_obstruction') == 1 ? '' : 'disabled' }} />
            </div>
        </div>

        <!-- chronic_diseases -->
        <div class="medical-data w-100"
            @error('chronic_diseases')
             style="border-color: red"
             @enderror
            @error('chronic_diseases_com')
             style="border-color: red"
            @enderror>
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل لدى الطفل أمراض مزمنة</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input comment-tab" value="1"
                        name="chronic_diseases"
                        {{ old('chronic_diseases') != null && old('chronic_diseases') == 1 ? 'checked' : '' }} />
                    <label class="custom-control-label"> نعم </label>

                    <input type="radio" class="custom-control-input" value="0" name="chronic_diseases"
                        {{ old('chronic_diseases') != null && old('chronic_diseases') == 0 ? 'checked' : '' }} />
                    <label class="custom-control-label">لا</label>
                </div>
            </div>
            <div class="comment">
                <input type="text" class="form-control" placeholder="أذكر التعليق هنا..."
                    name="chronic_diseases_com" id="comment" value="{{ old('chronic_diseases_com') }}"
                    style="{{ old('chronic_diseases') != null && old('chronic_diseases') == 1 ? '' : 'visibility: hidden;' }}"
                    {{ old('chronic_diseases') != null && old('chronic_diseases') == 1 ? '' : 'disabled' }} />
            </div>
        </div>

        <!-- genetic_diseases -->
        <div class="medical-data w-100"
            @error('genetic_diseases')
             style="border-color: red"
             @enderror
            @error('genetic_diseases_com')
             style="border-color: red"
            @enderror>
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل لدى الطفل أمراض وراثية</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input comment-tab" value="1"
                        name="genetic_diseases"
                        {{ old('genetic_diseases') != null && old('genetic_diseases') == 1 ? 'checked' : '' }} />
                    <label class="custom-control-label"> نعم </label>

                    <input type="radio" class="custom-control-input" value="0" name="genetic_diseases"
                        {{ old('genetic_diseases') != null && old('genetic_diseases') == 0 ? 'checked' : '' }} />
                    <label class="custom-control-label">لا</label>

                </div>
            </div>
            <div class="comment">
                <input type="text" class="form-control" placeholder="أذكر التعليق هنا..."
                    name="genetic_diseases_com" id="comment" value="{{ old('genetic_diseases_com') }}"
                    style="{{ old('genetic_diseases') != null && old('genetic_diseases') == 1 ? '' : 'visibility: hidden;' }}"
                    {{ old('genetic_diseases') != null && old('genetic_diseases') == 1 ? '' : 'disabled' }} />
            </div>
        </div>

        <!-- health_problems -->
        <div class="medical-data w-100"
            @error('health_problems')
             style="border-color: red"
             @enderror
            @error('health_problems_com')
             style="border-color: red"
            @enderror>
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل لدى الطفل مشاكل صحية أخرى</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input comment-tab" value="1"
                        name="health_problems"
                        {{ old('health_problems') != null && old('health_problems') == 1 ? 'checked' : '' }} />
                    <label class="custom-control-label">نعم</label>

                    <input type="radio" class="custom-control-input" value="0" name="health_problems"
                        {{ old('health_problems') != null && old('health_problems') == 0 ? 'checked' : '' }} />
                    <label class="custom-control-label">لا</label>
                </div>
            </div>
            <div class="comment">
                <input type="text" class="form-control" placeholder="أذكر التعليق هنا..."
                    name="health_problems_com" id="comment" value="{{ old('health_problems_com') }}"
                    style="{{ old('health_problems') != null && old('health_problems') == 1 ? '' : 'visibility: hidden;' }}"
                    {{ old('health_problems') != null && old('health_problems') == 1 ? '' : 'disabled' }} />
            </div>
        </div>

        <!-- growth_stage -->
        <div class="medical-data w-100"
            @error('growth_stage')
             style="border-color: red"
             @enderror
            @error('growth_stage_com')
             style="border-color: red"
            @enderror>
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل مراحل النمو عند الطفل طبيعية منذ الولادة</h4>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input comment-tab" value="0"
                        name="growth_stage"
                        {{ old('growth_stage') != null && old('growth_stage') == 0 ? 'checked' : '' }} />
                    <label class="custom-control-label">نعم</label>

                    <input type="radio" class="custom-control-input" value="1" name="growth_stage"
                        {{ old('growth_stage') != null && old('growth_stage') == 1 ? 'checked' : '' }} />
                    <label class="custom-control-label">لا</label>
                </div>
            </div>
            <div class="comment">
                <input type="text" class="form-control" placeholder="أذكر التعليق هنا..." name="growth_stage_com"
                    id="comment" value="{{ old('growth_stage_com') }}"
                    style="{{ old('growth_stage') != null && old('growth_stage') == 1 ? '' : 'visibility: hidden;' }}"
                    {{ old('growth_stage') != null && old('growth_stage') == 1 ? '' : 'disabled' }} />
            </div>
        </div>
    </div>
</div>
