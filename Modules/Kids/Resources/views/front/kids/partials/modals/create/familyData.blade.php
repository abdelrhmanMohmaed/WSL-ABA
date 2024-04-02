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
        <div class="form-group family-data">
            <label>عدد أفراد الاسره</label>
            <select name="family_num_of" class="form-control">
                <option selected disabled>اختر عدد أفراد الأسرة...</option>
                <option value="1" @selected(old('family_num_of')==1)>1</option>
                <option value="2" @selected(old('family_num_of')==2)>2</option>
                <option value="3" @selected(old('family_num_of')==3)>3</option>
                <option value="4" @selected(old('family_num_of')==4)>4</option>
                <option value="5" @selected(old('family_num_of')==5)>5</option>
                <option value="6" @selected(old('family_num_of')==6)>6</option>
                <option value="7" @selected(old('family_num_of')==7)>7</option>
                <option value="8" @selected(old('family_num_of')==8)>8</option>
                <option value="9" @selected(old('family_num_of')==9)>9</option>
                <option value="10" @selected(old('family_num_of')==10)>10</option>
            </select>
            @error('family_num_of')
            <span class="text-danger">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                       {{ $message }}
                 </span>
            @enderror
        </div>

        <!-- family_num_of_pro -->
        <div class="form-group family-data">
            <label>عدد الأشقاء الذكور</label>
            <select name="family_num_of_pro" class="form-control">
                <option selected disabled>اختر عدد الأشقاء الذكور...</option>
                <option value="1" @selected(old('family_num_of_pro')==1)>1</option>
                <option value="2" @selected(old('family_num_of_pro')==2)>2</option>
                <option value="3" @selected(old('family_num_of_pro')==3)>3</option>
                <option value="4" @selected(old('family_num_of_pro')==4)>4</option>
                <option value="5" @selected(old('family_num_of_pro')==5)>5</option>
                <option value="6" @selected(old('family_num_of_pro')==6)>6</option>
                <option value="7" @selected(old('family_num_of_pro')==7)>7</option>
                <option value="8" @selected(old('family_num_of_pro')==8)>8</option>
                <option value="9" @selected(old('family_num_of_pro')==9)>9</option>
                <option value="10"@selected(old('family_num_of_pro')==10)>10</option>
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
                <option selected disabled>اختر عدد الأشقاء الاناث...</option>
                <option value="1" @selected(old('family_num_of_sis')==1)>1</option>
                <option value="2" @selected(old('family_num_of_sis')==2)>2</option>
                <option value="3" @selected(old('family_num_of_sis')==3)>3</option>
                <option value="4" @selected(old('family_num_of_sis')==4)>4</option>
                <option value="5" @selected(old('family_num_of_sis')==5)>5</option>
                <option value="6" @selected(old('family_num_of_sis')==6)>6</option>
                <option value="7" @selected(old('family_num_of_sis')==7)>7</option>
                <option value="8" @selected(old('family_num_of_sis')==8)>8</option>
                <option value="9" @selected(old('family_num_of_sis')==9)>9</option>
                <option value="10" @selected(old('family_num_of_sis')==10)>10</option>
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
                <option selected disabled>اختر ترتيب الطفل بين أشقاءه...</option>
                <option value="1" @selected(old('family_sort_of')==1)>1</option>
                <option value="2" @selected(old('family_sort_of')==2)>2</option>
                <option value="3" @selected(old('family_sort_of')==3)>3</option>
                <option value="4" @selected(old('family_sort_of')==4)>4</option>
                <option value="5" @selected(old('family_sort_of')==5)>5</option>
                <option value="6" @selected(old('family_sort_of')==6)>6</option>
                <option value="7" @selected(old('family_sort_of')==7)>7</option>
                <option value="8" @selected(old('family_sort_of')==8)>8</option>
                <option value="9" @selected(old('family_sort_of')==9)>9</option>
                <option value="10" @selected(old('family_sort_of')==10)>10</option>
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
                <option selected disabled>اختر الاجابة...</option>
                <option value="no" @selected(old('family_bro_autism')=='no')>
                    لا، لا يوجد
                </option>
                <option value="bro_autism" @selected(old('family_bro_autism')=='bro_autism')>
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
                <option value="other" @selected(old('family_marital_status')=='other')>
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
            <label>مع من يسكن الطفل</label>
            <select class="form-control" name="family_with_live" id="">
                <option selected disabled>
                    اختر مع من يسكن الطفل...
                </option>
                <option value="parenthood" @selected(old('family_with_live')=="parenthood")>
                    مع والديه
                </option>
                <option value="dad" @selected(old('family_with_live')=="dad")>
                    مع الأب
                </option>
                <option value="mom" @selected(old('family_with_live')=="mom")>
                    مع الأم
                </option>
                <option value="other" @selected(old('family_with_live')=="other")>أخرى</option>
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
