<div id="familyMenuEdit" class="container tab-pane fade">
    <br />

    <div class="text-data">
        <div class="form-title">
            <img src="{{ asset('dist/front/assets/images/personal-information.jpg') }}" />
            <h3>بيانات الأسرة</h3>
        </div>
        <div class="form-group" style="flex-basis: 100%">
            <label>عدد أفراد الاسره</label>
            <input class="form-control" value="{{ $kid->family->num_of ?? old('family_num_of') }}" type="number"
                name="family_num_of" placeholder="{{ $kid->family->num_of ? '' : 'قم بادخال عدد أفراد الاسره' }}">

            @error('family_num_of')
                <span class="text-danger">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="form-group" style="flex-basis: 100%">
            <label>عدد الأشقاء الذكور</label>

            <input class="form-control" value="{{ $kid->family->num_of_pro ?? old('family_num_of_pro') }}"
                type="number" name="family_num_of_pro"
                placeholder="{{ $kid->family->num_of_pro ? '' : 'قم بادخال عدد الأشقاء الذكور' }}">

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

            <input class="form-control" value="{{ $kid->family->num_of_sis ?? old('family_num_of_sis') }}"
                type="number" name="family_num_of_sis"
                placeholder="{{ $kid->family->num_of_sis ? '' : 'قم بادخال عدد الأشقاء الاناث' }}">

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

            <input class="form-control" value="{{ $kid->family->sort_of ?? old('family_sort_of') }}" type="number"
                name="family_sort_of" placeholder="{{ $kid->family->sort_of ? '' : 'قم بادخال ترتيبة بين الأشقاء' }}">
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
                <option disabled selected>اختر الاجابة...</option>
                <option value="no" @if (old('family_bro_autism') == 'no' || $kid->family->bro_autism == 'no') selected @endif>
                    لا، لا يوجد
                </option>
                <option value="bro_autism" @if (old('family_bro_autism') == 'bro_autism' || $kid->family->bro_autism == 'bro_autism') selected @endif>
                    نعم، لديه شقيق يعاني من التوحد
                </option>
                <option value="many_bro_autism" @if (old('family_bro_autism') == 'many_bro_autism' || $kid->family->bro_autism == 'many_bro_autism') selected @endif>
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
                <option disabled selected>اختر الاجابة...</option>
                <option value="no" @if (old('family_has_twins') == 'no' || $kid->family->has_twins == 'no') selected @endif>
                    لا، لا يوجد
                </option>
                <option value="yes_bro_autism" @if (old('family_has_twins') == 'yes_bro_autism' || $kid->family->has_twins == 'yes_bro_autism') selected @endif>
                    نعم، ويعاني من التوحد
                </option>
                <option value="no_bro_autism" @if (old('family_has_twins') == 'no_bro_autism' || $kid->family->has_twins == 'no_bro_autism') selected @endif>
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
                <option disabled selected>اختر الحالة الاجتماعية للأسرة الأسرة...</option>
                <option value="mum_dad_together" @if (old('family_marital_status') == 'mum_dad_together' || $kid->family->marital_status == 'mum_dad_together') selected @endif>
                    الوالدان على علاقتهما الزوجية
                </option>
                <option value="mum_dad_divorce" @if (old('family_marital_status') == 'mum_dad_divorce' || $kid->family->marital_status == 'mum_dad_divorce') selected @endif>
                    الوالدان منفصلان
                </option>
                <option value="dad_died" @if (old('family_marital_status') == 'dad_died' || $kid->family->marital_status == 'dad_died') selected @endif>
                    الأب متوفي
                </option>
                <option value="mum_died" @if (old('family_marital_status') == 'mum_died' || $kid->family->marital_status == 'mum_died') selected @endif>
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
            <label>مع من يسكن الطفل</label>
            <select name="family_with_live" class="form-control familyWithLive">
                <option disabled selected> اختر مع من يسكن الطفل...</option>

                <option value="parenthood" @if (old('family_with_live') == 'parenthood' || $kid->family->with_live == 'parenthood') selected @endif>
                    مع والديه
                </option>
                <option value="dad" @if (old('family_with_live') == 'dad' || $kid->family->with_live == 'dad') selected @endif>
                    مع الأب
                </option>
                <option value="mom" @if (old('family_with_live') == 'mom' || $kid->family->with_live == 'mom') selected @endif>
                    مع الأم
                </option>
                <option value="other" @if (old('family_with_live') == 'other' || $kid->family->with_live == 'other') selected @endif>
                    أخرى
                </option>
            </select>

            <div id="family_with_live_com"
                style="{{ old('family_with_live') == 'other' || $kid->family->with_live == 'other' ? 'display: block;' : 'display: none;' }}">
                <input type="text" value="{{ old('family_with_live_com') ?? $kid->family->with_live_comm }}"
                    class="form-control" placeholder="أذكر التعليق هنا..." name="family_with_live_com" id="comment"
                    {{ old('family_with_live') == 'other' || $kid->family->with_live == 'other' ? '' : 'disabled' }} />
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
                <option disabled selected>اختر متوسط دخل الأسرة...</option>
                <option value="0" @if (old('family_income') == '0' || $kid->family->income == '0') selected @endif>
                    لا يوجد دخل
                </option>
                <option value="4000" @if (old('family_income') == '4000' || $kid->family->income == '4000') selected @endif>
                    أقل من 4,000 ريال
                </option>
                <option value="4,000 - 10,000" @if (old('family_income') == '4,000 - 10,000' || $kid->family->income == '4,000 - 10,000') selected @endif>
                    4,000 - 10,000 ريال
                </option>
                <option value="10,000 - 15,000" @if (old('family_income') == '10,000 - 15,000' || $kid->family->income == '10,000 - 15,000') selected @endif>
                    10,000 - 15,000 ريال
                </option>
                <option value="15,000 - 20,000" @if (old('family_income') == '15,000 - 20,000' || $kid->family->income == '15,000 - 20,000') selected @endif>
                    15,000 - 20,000 ريال
                </option>
                <option value="20,000" @if (old('family_income') == '20,000' || $kid->family->income == '20,000') selected @endif>
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
