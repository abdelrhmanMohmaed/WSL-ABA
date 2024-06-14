<div id="familyMenu" class="container tab-pane fade">
    <br/>
    <!-- family_num_of -->
    <div class="text-data">
        <div class="form-title">
            <img
                src="{{ asset('dist/front/assets/images/personal-information.jpg') }}"/>
            <h3>بيانات الأسرة</h3>
        </div>

        <!--family_num_of -->
        <div class="form-group" style="flex-basis: 100%">
            <label>عدد أفراد الاسره</label>
            <input class="form-control" value="{{old('family_num_of')}}" type="number" name="family_num_of"
                   placeholder="قم بادخال عدد أفراد الاسره">
            @error('family_num_of')
            <span class="text-danger">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                       {{ $message }}
                 </span>
            @enderror
        </div>

        <!-- family_num_of_pro -->
        <div class="form-group" style="flex-basis: 100%">
            <label>عدد الأشقاء الذكور</label>
            <input class="form-control" value="{{old('family_num_of_pro')}}" type="number" name="family_num_of_pro"
                   placeholder="قم بادخال عدد الأشقاء الذكور">
            @error('family_num_of_pro')
            <span class="text-danger">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                       {{ $message }}
                 </span>
            @enderror
        </div>

        <!-- family_num_of_sis -->
        <div class="form-group" style="flex-basis: 100%">
            <label>عدد الأشقاء الاناث </label>
            <input class="form-control" value="{{old('family_num_of_sis')}}" type="number" name="family_num_of_sis"
                   placeholder="قم بادخال عدد الأشقاء الاناث">
            @error('family_num_of_sis')
            <span class="text-danger">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                       {{ $message }}
                 </span>
            @enderror
        </div>

        <!-- family_sort_of -->
        <div class="form-group" style="flex-basis: 100%">
            <label>ترتيب الطفل بين أشقاءه </label>
            <input class="form-control" value="{{old('family_sort_of')}}" type="number" name="family_sort_of"
                   placeholder="قم بادخال ترتيبة بين الأشقاء">
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
                <option selected disabled>اختر الاجابة...</option>
                <option value="no" @selected(old('family_bro_autism')=='no')>
                    لا، لا يوجد
                </option>
                <option value="bro_autism " @selected(old('family_bro_autism')=='bro_autism')>
                    نعم، لديه شقيق يعاني من التوحد
                </option>
                <option value="many_bro_autism" @selected(old('family_bro_autism')=='many_bro_autism')>
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
                <option selected disabled>اختر الاجابة...</option>
                <option value="no" @selected(old('family_has_twins')=="no")>
                    لا، لا يوجد
                </option>
                <option value="yes_bro_autism" @selected(old('family_has_twins')=="yes_bro_autism")>
                    نعم، ويعاني من التوحد
                </option>
                <option value="no_bro_autism" @selected(old('family_has_twins')=="no_bro_autism")>
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
                <option selected disabled>اختر الحالة الاجتماعية للأسرة الأسرة...</option>
                <option value="mum_dad_together" @selected(old('family_marital_status')== 'mum_dad_together')>
                    الوالدان على علاقتهما الزوجية
                </option>
                <option value="mum_dad_divorce" @selected(old('family_marital_status')== 'mum_dad_divorce')>
                    الوالدان منفصلان
                </option>
                <option value="dad_died" @selected(old('family_marital_status')=='dad_died')>
                    الأب متوفي
                </option>
                <option value="mum_died" @selected(old('family_marital_status')=='mum_died')>
                    الأم متوفاه
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
        <div class="form-group pb-2" style="flex-basis: 100%"
             @error('family_with_live')
             style="border-color: red !important;"
             @enderror
             @error('family_with_live_com')
             style="border-color: red !important;"
            @enderror
        >
            <label>مع من يسكن الطفل</label>
            <select class="form-control" name="family_with_live" id="familyWithLive">
                <option selected disabled>
                    اختر مع من يسكن الطفل...
                </option>
                <option value="parenthood" {{ old('family_with_live') == "parenthood" ? 'selected' : '' }}>
                    مع والديه
                </option>
                <option value="dad" {{ old('family_with_live') == "dad" ? 'selected' : '' }}>
                    مع الأب
                </option>
                <option value="mom" {{ old('family_with_live') == "mom" ? 'selected' : '' }}>
                    مع الأم
                </option>
                <option value="other" {{ old('family_with_live') == "other" ? 'selected' : '' }}>أخرى</option>

            </select>

            <div id="family_with_live_com"
                 style="{{ old('family_with_live') == 'other' ? 'display: block;' : 'display: none;' }}">
                <input type="text"
                       value="{{ old('family_with_live_com') }}"
                       class="form-control" placeholder="أذكر التعليق هنا..." name="family_with_live_com"
                       id="comment"
                    {{ old('family_with_live') == 'other' ? '' : 'disabled' }} />
            </div>

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
                <option selected disabled>اختر متوسط دخل الأسرة...</option>
                <option value="0" @selected(old('family_income')=="4000" &&old('family_income')!= null )>
                    لا يوجد دخل
                </option>
                <option value="4000" @selected(old('family_income')=="4000")>
                    أقل من 4,000 ريال
                </option>
                <option value="4,000 - 10,000" @selected(old('family_income')=="4,000 - 10,000")>
                    4,000 - 10,000 ريال
                </option>
                <option value="10,000 - 15,000" @selected(old('family_income')=="10,000 - 15,000")>
                    10,000 - 15,000 ريال
                </option>
                <option value="15,000 - 20,000" @selected(old('family_income')=='15,000 - 20,000')>
                    15,000 - 20,000 ريال
                </option>
                <option value="20,000" @selected(old('family_income')=='20,000')>
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
