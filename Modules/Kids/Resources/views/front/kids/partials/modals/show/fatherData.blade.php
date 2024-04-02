<div id="fatherDataShow" class="container tab-pane fade">
    <div class="text-data">

        <div class="form-group">
            <label>الاسم كاملاً </label>
            <p class="form-control">
                {{$kid->dad->name}}</p>
        </div>

        <div class="form-group">
            <label>رقم الهوية</label>
            <p class="form-control">{{$kid->dad->num}} </p>
        </div>

        <div class="form-group">
            <label> تاريخ الميلاد</label>
            <p class="form-control">{{$kid->dad->date}} </p>
        </div>

        <div class="form-group">
            <label>الحالة الاجتماعية</label>
            <p class="form-control">
                @if($kid->dad->marital_status == 'married')
                    متزوج
                @endif
                @if($kid->dad->marital_status == 'divorce')
                    مطلق
                @endif

                @if($kid->dad->marital_status == 'Widower')
                    أرمل
                @endif
            </p>
        </div>

        <div class="form-group">
            <label> رقم التواصل</label>
            <p class="form-control">{{$kid->dad->phone}}</p>
        </div>

        <div class="form-group">
            <label>المستوى التعليمي</label>
            <p class="form-control">
                @if($kid->dad->learning == 'none')
                    أمّي
                @endif
                @if($kid->dad->learning == 'primary')
                    ابتدائي
                @endif
                @if($kid->dad->learning == 'middle')
                    متوسط
                @endif
                @if($kid->dad->learning == 'secondary')
                    ثانوي
                @endif
                @if($kid->dad->learning == 'diploma')
                    دبلوم
                @endif
                @if($kid->dad->learning == 'Bachelor')
                    بكالوريس
                @endif
                @if($kid->dad->learning == 'Master')
                    ماجستير
                @endif
                @if($kid->dad->learning == 'doctor')
                    دكتوراه
                @endif
            </p>
        </div>

        <div class="form-group">
            <label> طبيعة العمل</label>
            <p class="form-control">
                @if($kid->dad->work == 'public_work')
                    موظف حكومي
                @endif
                @if($kid->dad->work == 'private_work')
                    موظف قطاع خاص
                @endif
                @if($kid->dad->work == 'free_work')
                    أعمال حرة
                @endif
                @if($kid->dad->work == "don't_work")
                    لا يعمل
                @endif
            </p>
        </div>


        <div class="medical-data mt-3 w-100">
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل الأب مدخن</h4>
                </div>
                <div class="custom-control custom-radio">
                    <p>
                        @if($kid->dad->smoking == '1')
                            نعم
                        @else
                            لا
                        @endif
                    </p>
                </div>
            </div>
        </div>

        <div class="medical-data w-100">
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل لدى الأب إعاقة</h4>
                </div>
                <div class="custom-control custom-radio">
                    <p>
                        @if($kid->dad->obstruction == '1')
                            نعم
                        @else
                            لا
                        @endif
                    </p>
                    <div class="comment">
                        <p>{{@$kid->dad->obstruction_com}} </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="medical-data w-100">
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل يعاني الأب من أمراض مزمنة</h4>
                </div>
                <div class="custom-control custom-radio">
                    <p>
                        @if($kid->dad->chronic_diseases == '1')
                            نعم  -
                        @else
                            لا
                        @endif
                    </p>
                    <div class="comment">
                        <p>{{@$kid->dad->chronic_diseases_com}} </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="medical-data w-100">
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل يعاني الأب من أمراض وراثية</h4>
                </div>
                <div class="custom-control custom-radio">
                    <p>
                        @if($kid->dad->genetic_diseases == '1')
                            نعم
                        @else
                            لا
                        @endif
                    </p>
                    <div class="comment">
                        <p>{{@$kid->dad->genetic_diseases_com}} </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="medical-data w-100">
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>ما هي الحالة النفسية للأب</h4>
                </div>
                <div class="custom-control custom-radio">
                    <p>
                        @if($kid->dad->mental_state == '1')
                            يعاني من مشاكل نفسية
                        @else
                            طبيعي
                        @endif
                    </p>
                    <div class="comment">
                        <p>{{@$kid->dad->mental_state_com}} </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="medical-data w-100">
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل يعاني الأب من مشاكل صحية أخرى</h4>
                </div>
                <div class="custom-control custom-radio">
                    <p> @if($kid->dad->health_problems == '1')
                            نعم
                        @else
                            لا
                        @endif
                    </p>
                    <div class="comment">
                        <p>{{@$kid->dad->health_problems_com}} </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="medical-data w-100">
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>ما هي درجة تواصل الأب مع الطفل</h4>
                </div>
                <div class="custom-control custom-radio">
                    <p>
                        @if($kid->dad->communication == 'good')
                            قوية
                        @endif
                        @if($kid->dad->communication == 'medium')
                            متوسطة
                        @endif
                        @if($kid->dad->communication == 'week')
                            ضعيفة
                        @endif
                    </p>
                    <div class="comment">
                        <p>{{@$kid->dad->communication_com}} </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
