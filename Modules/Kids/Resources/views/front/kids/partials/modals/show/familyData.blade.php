<div id="familyDataShow" class="container tab-pane fade">
    <div class="text-data">

        <div class="form-group family-data">
            <label>عدد أفراد الاسره</label>
            <p>
                {{$kid->family->num_of}}
            </p>
        </div>

        <div class="form-group family-data">
            <label>عدد الأشقاء الذكور</label>
            <p>
                {{$kid->family->num_of_pro}}
            </p>
        </div>

        <div class="form-group family-data">
            <label>عدد الأشقاء الاناث </label>
            <p>
                {{$kid->family->num_of_sis}}
            </p>
        </div>

        <div class="form-group family-data">
            <label> الطفل بين أشقاءه</label>
            <p>
                {{$kid->family->sort_of}}
            </p>
        </div>

        <div class="form-group family-data">
            <label>هل لدى الطفل شقيق يعاني من التوحد </label>
            <p>
                @if($kid->family->bro_autism == 'no')
                    لا، لا يوجد
                @endif
                @if($kid->family->bro_autism == 'bro_autism')
                    لديه شقيق يعاني من التوحد
                @endif
                @if($kid->family->bro_autism == 'many_bro_autism')
                    أكتر من شقيق يعاني من التوحد
                @endif
            </p>
        </div>

        <div class="form-group family-data">
            <label> هل لدى الطفل توأم</label>
            <p>
                @if($kid->family->has_twins == 'no')
                    لا، لا يوجد
                @endif
                @if($kid->family->has_twins == 'yes_bro_autism')
                    ويعاني من التوحد
                @endif
                @if($kid->family->has_twins == 'no_bro_autism')
                    عم، ولكنه لا يعاني من التوحد
                @endif
            </p>
        </div>

        <div class="form-group family-data">
            <label>الحالة الاجتماعية للأسرة</label>
            <p>
                @if($kid->family->marital_status == 'mum_dad_together')
                    دان على علاقتهما الزوجية
                @endif
                @if($kid->family->marital_status == 'mum_dad_divorce')
                    الوالدان منفصلان
                @endif
                @if($kid->family->marital_status == 'dad_died')
                    الأب متوفي
                @endif
                @if($kid->family->marital_status == 'mum_died')
                    الأم متوفي
                @endif
                @if($kid->family->marital_status == 'other')
                    أخري
                @endif
            </p>
        </div>

        <div class="form-group family-data">
            <label>مع من يسكن الطفل</label>
            <p>
                @if($kid->family->with_live == 'parenthood')
                    مع والديه
                @endif
                @if($kid->family->with_live == 'dad')
                    مع الأب
                @endif
                @if($kid->family->with_live == 'mom')
                    مع الأم
                @endif
                @if($kid->family->with_live == 'other')
                    أخرى
                @endif
            </p>
        </div>

        <div class="form-group family-data">
            <label>متوسط دخل الأسرة الشهري</label>
            <p>
                @if($kid->family->income == '0')
                    لا يوجد دخل
                @endif
                @if($kid->family->income == '4000')
                    أقل من 4,000 ريال
                @endif
                @if($kid->family->income == '4,000 - 10,000')
                    4,000 - 10,000 ريال
                @endif
                @if($kid->family->income == '10,000 - 15,000')
                    10,000 - 15,000 ريال
                @endif
                @if($kid->family->income == '15,000 - 20,000')
                    15,000 - 20,000 ريال
                @endif
                @if($kid->family->income ==  '20,000')
                    أكثر من 20,000 ريال
                @endif
            </p>
        </div>

    </div>
</div>
