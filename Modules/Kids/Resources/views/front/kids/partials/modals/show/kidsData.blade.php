<div id="kidDataShow" class="container tab-pane active">
    <div class="text-data">

        <div class="form-group">
            <label>الاسم كاملاً </label>
            <p class="form-control"> {{$kid->name}}
            </p>
        </div>

        <div class="form-group">
            <label>رقم الهوية</label>
            <p class="form-control">
                {{$kid->num}}
            </p>
        </div>

        <div class="form-group">
            <label> تاريخ الميلاد</label>
            <p class="form-control">
                {{$kid->date}}
            </p>
        </div>

        <div class="form-group">
            <label>مكان الميلاد</label>
            <p class="form-control">{{$kid->place_date}}</p>
        </div>

        <div class="form-group">
            <label>الجنس</label>
            <p class="form-control">
                @if($kid->gender == '1')
                    ذكر
                @else
                    انثي
                @endif
            </p>
        </div>
        
        <div class="form-group">
            <label>منطقة السكن</label>
            <p>{{$kid->area}}</p>
        </div>

        <div class="form-group">
            <label>الجنسية</label>
            <p class="form-control">
                {{$kid->country->name_ar}}
            </p>
        </div>

        <div class="form-group">
            <label>المدينة </label>
            <p>{{$kid->city->name_ar}}</p>
        </div>


        <div class="medical-data mt-4 w-100">
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل لدى الطفل اعاقات أخرى</h4>
                </div>
                <div class="custom-control custom-radio">
                    <p>
                        @if($kid->other_obstruction == '1')
                            نعم
                        @else
                            لا
                        @endif
                    </p>
                    <div class="comment">
                        <p>{{@$kid->other_obstruction_com}} </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="medical-data w-100">
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل لدى الطفل أمراض مزمنة</h4>
                </div>
                <div class="custom-control custom-radio">
                    <p>
                        @if($kid->chronic_diseases == '1')
                            نعم
                        @else
                            لا
                        @endif
                    </p>
                    <div class="comment">
                        <p>{{@$kid->chronic_diseases_com}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="medical-data w-100">
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل لدى الطفل أمراض وراثية</h4>
                </div>
                <div class="custom-control custom-radio">
                    <p>
                        @if($kid->genetic_diseases == '1')
                            نعم
                        @else
                            لا
                        @endif
                    </p>

                    <div class="comment">
                        <p> {{@$kid->genetic_diseases_com}} </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="medical-data w-100">
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل لدى الطفل مشاكل صحية أخرى</h4>
                </div>
                <div class="custom-control custom-radio">
                    <p>
                        @if($kid->health_problems == '1')
                            نعم
                        @else
                            لا
                        @endif
                    </p>
                    <div class="comment">
                        <p>{{@$kid->health_problems_com}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="medical-data w-100">
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل مراحل النمو عند الطفل طبيعية منذ الولادة</h4>
                </div>
                <div class="custom-control custom-radio">
                    <p>
                        @if($kid->growth_stage == '1')
                            نعم
                        @else
                            لا
                        @endif
                    </p>
                    <div class="comment">
                        <p>{{@$kid->growth_stage_com}}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
