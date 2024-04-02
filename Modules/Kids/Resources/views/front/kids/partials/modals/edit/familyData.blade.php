<div id="familyMenuEdit" class="container tab-pane fade">
    <br/>

    <div class="text-data">
        <div class="form-title">
            <img src="{{asset('dist/front/assets/images/personal-information.jpg')}}"/>
            <h3>بيانات الأسرة</h3>
        </div>

        <div class="form-group family-data">
            <label>عدد أفراد الاسره</label>
            <select name="family_num_of" class="form-control">
                <option disabled >اختر عدد أفراد الأسرة...</option>
                <option value="1" @if($kid->family->num_of == '1') selected @endif>1
                </option>
                <option value="2" @if($kid->family->num_of == '2') selected @endif>2
                </option>
                <option value="3" @if($kid->family->num_of == '3') selected @endif>3
                </option>
                <option value="4" @if($kid->family->num_of == '4') selected @endif>4
                </option>
                <option value="5" @if($kid->family->num_of == '5') selected @endif>5
                </option>
                <option value="6" @if($kid->family->num_of == '6') selected @endif>6
                </option>
                <option value="7" @if($kid->family->num_of == '7') selected @endif>7
                </option>
                <option value="8" @if($kid->family->num_of == '8') selected @endif>8
                </option>
                <option value="9" @if($kid->family->num_of == '9') selected @endif>9
                </option>
                <option value="10" @if($kid->family->num_of == '10') selected @endif>10
                </option>
            </select>
            @error('family_num_of')
            <span class="text-danger">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                       {{ $message }}
                 </span>
            @enderror
        </div>

        <div class="form-group family-data">
            <label>عدد الأشقاء الذكور</label>
            <select name="family_num_of_pro" class="form-control">
                <option disabled>اختر عدد الأشقاء الذكور...</option>
                <option value="1" @if($kid->family->num_of_pro == '1') selected @endif>1
                </option>
                <option value="2" @if($kid->family->num_of_pro == '2') selected @endif>2
                </option>
                <option value="3" @if($kid->family->num_of_pro == '3') selected @endif>3
                </option>
                <option value="4" @if($kid->family->num_of_pro == '4') selected @endif>4
                </option>
                <option value="5" @if($kid->family->num_of_pro == '5') selected @endif>5
                </option>
                <option value="6" @if($kid->family->num_of_pro == '6') selected @endif>6
                </option>
                <option value="7" @if($kid->family->num_of_pro == '7') selected @endif>7
                </option>
                <option value="8" @if($kid->family->num_of_pro == '8') selected @endif>8
                </option>
                <option value="9" @if($kid->family->num_of_pro == '9') selected @endif>9
                </option>
                <option value="10" @if($kid->family->num_of_pro == '10') selected @endif>
                    10
                </option>
            </select>
            @error('family_num_of_pro')
            <span class="text-danger">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                       {{ $message }}
                 </span>
            @enderror
        </div>

        <!-- family_num_of_sis -->
        <div class="form-group family-data">
            <label>عدد الأشقاء الاناث </label>
            <select name="family_num_of_sis" class="form-control">
                <option disabled>اختر عدد الأشقاء الاناث...</option>
                <option value="1" @if($kid->family->num_of_sis == '1') selected @endif>1
                </option>
                <option value="2" @if($kid->family->num_of_sis == '2') selected @endif>2
                </option>
                <option value="3" @if($kid->family->num_of_sis == '3') selected @endif>3
                </option>
                <option value="4" @if($kid->family->num_of_sis == '4') selected @endif>4
                </option>
                <option value="5" @if($kid->family->num_of_sis == '5') selected @endif>5
                </option>
                <option value="6" @if($kid->family->num_of_sis == '6') selected @endif>6
                </option>
                <option value="7" @if($kid->family->num_of_sis == '7') selected @endif>7
                </option>
                <option value="8" @if($kid->family->num_of_sis == '8') selected @endif>8
                </option>
                <option value="9" @if($kid->family->num_of_sis == '9') selected @endif>9
                </option>
                <option value="10" @if($kid->family->num_of_sis == '10') selected @endif>
                    10
                </option>
            </select>

            @error('family_num_of_sis')
            <span class="text-danger">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                       {{ $message }}
                 </span>
            @enderror
        </div>

        <!-- family_sort_of -->
        <div class="form-group family-data">
            <label>ترتيب الطفل بين أشقاءه </label>
            <select name="family_sort_of" class="form-control">
                <option disabled>اختر ترتيب الطفل بين أشقاءه...</option>
                <option value="1" @if($kid->family->sort_of == '1') selected @endif>1
                </option>
                <option value="2" @if($kid->family->sort_of == '2') selected @endif>2
                </option>
                <option value="3" @if($kid->family->sort_of == '3') selected @endif>3
                </option>
                <option value="4" @if($kid->family->sort_of == '4') selected @endif>4
                </option>
                <option value="5" @if($kid->family->sort_of == '5') selected @endif>5
                </option>
                <option value="6" @if($kid->family->sort_of == '6') selected @endif>6
                </option>
                <option value="7" @if($kid->family->sort_of == '7') selected @endif>7
                </option>
                <option value="8" @if($kid->family->sort_of == '8') selected @endif>8
                </option>
                <option value="9" @if($kid->family->sort_of == '9') selected @endif>9
                </option>
                <option value="10" @if($kid->family->sort_of == '10') selected @endif>10
                </option>
            </select>
            @error('family_sort_of')
            <span class="text-danger">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                       {{ $message }}
                 </span>
            @enderror
        </div>

        <!-- family_bro_autism -->
        <div class="form-group family-data">
            <label>هل لدى الطفل شقيق يعاني من التوحد </label>
            <select name="family_bro_autism" class="form-control">
                <option disabled>اختر الاجابة...</option>
                <option value="no" @if($kid->family->bro_autism == 'no') selected @endif>
                    لا، لا يوجد
                </option>
                <option value="bro_autism"
                        @if($kid->family->bro_autism == 'bro_autism') selected @endif>
                    نعم، لديه شقيق يعاني من التوحد
                </option>
                <option

                    value="many_bro_autism"
                    @if($kid->family->bro_autism == 'many_bro_autism') selected @endif>
                    نعم، لديه أكتر من شقيق يعاني من التوحد
                </option>
            </select>
            @error('family_bro_autism')
            <span class="text-danger">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                       {{ $message }}
                 </span>
            @enderror
        </div>

        <!-- family_has_twins -->
        <div class="form-group family-data">
            <label> هل لدى الطفل توأم</label>
            <select name="family_has_twins" class="form-control">
                <option disabled>اختر الاجابة...</option>
                <option value="no" @if($kid->family->has_twins == 'no') selected @endif>
                    لا، لا يوجد
                </option>
                <option value="yes_bro_autism"
                        @if($kid->family->has_twins == 'yes_bro_autism') selected @endif>
                    نعم، ويعاني من التوحد
                </option>
                <option value="no_bro_autism"
                        @if($kid->family->has_twins == 'no_bro_autism') selected @endif>
                    نعم، ولكنه لا يعاني من التوحد
                </option>
            </select>
            @error('family_has_twins')
            <span class="text-danger">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                       {{ $message }}
                 </span>
            @enderror
        </div>

        <!-- family_marital_status -->
        <div class="form-group family-data">
            <label>الحالة الاجتماعية للأسرة</label>
            <select name="family_marital_status" class="form-control">
                <option disabled>اختر الحالة الاجتماعية للأسرة الأسرة...</option>
                <option value="mum_dad_together"
                        @if($kid->family->marital_status == 'mum_dad_together') selected @endif >
                    الوالدان على علاقتهما الزوجية
                </option>
                <option value="mum_dad_divorce"
                        @if($kid->family->marital_status == 'mum_dad_divorce') selected @endif >
                    الوالدان منفصلان
                </option>
                <option value="dad_died"
                        @if($kid->family->marital_status == 'dad_died') selected @endif >
                    الأب متوفي
                </option>
                <option value="mum_died"
                        @if($kid->family->marital_status == 'mum_died') selected @endif >
                    الأم متوفاه
                </option>
                <option value="other"
                        @if($kid->family->marital_status == 'other') selected @endif >
                    أخرى
                </option>
            </select>
            @error('family_marital_status')
            <span class="text-danger">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                       {{ $message }}
                 </span>
            @enderror
        </div>

        <!-- family_with_live -->
        <div class="form-group family-data">
            <label>الحالة الاجتماعية للأسرة</label>
            <select name="family_with_live" class="form-control">
                <option disabled> اختر مع من يسكن الطفل...</option>

                <option value="parenthood"
                        @if($kid->family->family_with_live == 'parenthood') selected> @endif >
                    مع والديه
                </option>
                <option value="dad"
                        @if($kid->family->family_with_live == 'dad') selected> @endif >
                    مع الأب
                </option>
                <option value="mom"
                        @if($kid->family->family_with_live == 'mom') selected> @endif >
                    مع الأم
                </option>
                <option value="other"
                        @if($kid->family->family_with_live == 'other') selected> @endif>
                    أخرى
                </option>
            </select>

            @error('family_with_live')
            <span class="text-danger">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                       {{ $message }}
                 </span>
            @enderror
        </div>

        <!-- family_income -->
        <div class="form-group family-data">
            <label>متوسط دخل الأسرة الشهري</label>
            <select class="form-control" name="family_income" id="">
                <option disabled>اختر متوسط دخل الأسرة...</option>
                <option value="0" @if($kid->family->income == '0') selected @endif>
                    لا يوجد دخل
                </option>
                <option value="4000" @if($kid->family->income == '4000') selected @endif>
                    أقل من 4,000 ريال
                </option>
                <option value="4,000 - 10,000"
                        @if($kid->family->income == '4,000 - 10,000') selected @endif>
                    4,000 - 10,000 ريال
                </option>
                <option value="10,000 - 15,000"
                        @if($kid->family->income == '10,000 - 15,000') selected @endif>
                    10,000 - 15,000 ريال
                </option>
                <option value="15,000 - 20,000"
                        @if($kid->family->income == '15,000 - 20,000') selected @endif>
                    15,000 - 20,000 ريال
                </option>
                <option value="20,000"
                        @if($kid->family->income == '20,000') selected @endif>
                    أكثر من 20,000 ريال
                </option>
            </select>

            @error('family_income')
            <span class="text-danger">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                       {{ $message }}
                 </span>
            @enderror
        </div>

    </div>
</div>
