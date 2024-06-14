<div id="motherDataShow" class="container tab-pane fade">
    <div class="text-data">

        <div class="form-group">
            <label>الاسم كاملاً </label>
            <p class="form-control">
                {{$kid->mom->name}}
            </p>
        </div>

        <div class="form-group">
            <label>رقم الهوية</label>
            <p class="form-control">{{$kid->mom->num}}</p>
        </div>

        <div class="form-group">
            <label> تاريخ الميلاد</label>
            <p class="form-control">{{$kid->mom->date}}</p>
        </div>

        <div class="form-group">
            <label>الحالة الاجتماعية</label>
            <p class="form-control">
                @if($kid->mom->marital_status == 'married')
                    متزوجة
                @endif
                @if($kid->mom->marital_status == 'divorce')
                    مطلقة
                @endif
                @if($kid->mom->marital_status == 'Widower')
                    أرملة
                @endif
            </p>
        </div>

        <div class="form-group">
            <label> رقم التواصل</label>
            <p class="form-control">{{$kid->mom->phone}}</p>
        </div>

        <div class="form-group">
            <label>المستوى التعليمي</label>
            <p class="form-control">
                @if($kid->mom->learning == 'none')
                    أمّي
                @endif
                @if($kid->mom->learning == 'primary')
                    ابتدائي
                @endif
                @if($kid->mom->learning == 'middle')
                    متوسط
                @endif
                @if($kid->mom->learning == 'secondary')
                    ثانوي
                @endif
                @if($kid->mom->learning == 'diploma')
                    دبلوم
                @endif
                @if($kid->mom->learning == 'Bachelor')
                    بكالوريس
                @endif
                @if($kid->mom->learning == 'Master')
                    ماجستير
                @endif
                @if($kid->mom->learning == 'doctor')
                    دكتوراه
                @endif
            </p>
        </div>

        <div class="form-group">
            <label> طبيعة العمل</label>
            <p class="form-control">
                @if($kid->mom->work == 'public_work')
                    موظف حكومي
                @endif
                @if($kid->mom->work == 'private_work')
                    موظف قطاع خاص
                @endif
                @if($kid->mom->work == 'free_work')
                    أعمال حرة
                @endif
                @if($kid->mom->work == "don't_work")
                    لا يعمل
                @endif</p>
        </div>


        <div class="medical-data mt-3 w-100">
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title ">
                    <h4>هل الأم مدخنة</h4>
                </div>
                <div class="custom-control custom-radio ">
                    <p>
                        @if($kid->mom->smoking == '1')
                            نعم
                        @elseif($kid->mom->smoking == '0' && $kid->mom->smoking != null)
                            لا
                        @endif
                    </p>
                </div>
            </div>
        </div>

        <div class="medical-data w-100">
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل لدى الأم إعاقة</h4>
                </div>
                <div class="custom-control custom-radio">

                    <p>
                        @if($kid->mom->obstruction == '1')
                            نعم
                        @elseif($kid->mom->obstruction == '0' && $kid->mom->obstruction != null)
                            لا
                        @endif
                    </p>
                    <div class="comment">
                        <p>{{@$kid->mom->obstruction_com}} </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="medical-data w-100">
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل تعاني الأم من أمراض مزمنة</h4>
                </div>
                <div class="custom-control custom-radio">
                    <p>
                        @if($kid->mom->chronic_diseases == '1')
                            نعم
                        @elseif($kid->mom->chronic_diseases == '0' && $kid->mom->chronic_diseases != null)
                            لا
                        @endif
                    </p>
                    <div class="comment">
                        <p>
                            {{@$kid->mom->hronic_diseases_com}}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="medical-data w-100">
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل تعاني الأم من أمراض وراثية</h4>
                </div>
                <div class="custom-control custom-radio">

                    <p>
                        @if($kid->mom->genetic_diseases == '1')
                            نعم
                        @elseif($kid->mom->genetic_diseases == '0' && $kid->mom->genetic_diseases != null)
                            لا
                        @endif
                    </p>
                    <div class="comment">
                        <p>{{@$kid->mom->genetic_diseases_com}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="medical-data w-100">
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل تعاني الأم من مشاكل صحية أخرى</h4>
                </div>
                <div class="custom-control custom-radio">
                    <p>
                        @if($kid->mom->health_problems == '1')
                            نعم
                        @elseif($kid->mom->health_problems == '0' && $kid->mom->health_problems != null)
                            لا
                        @endif
                    </p>
                    <div class="comment">
                        <p>{{$kid->mom->health_problems_com}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="medical-data w-100">
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>ما هي الحالة النفسية للأم</h4>
                </div>
                <div class="custom-control custom-radio">
                    <p>
                        @if($kid->mom->mental_state == '1')
                            نعم
                        @elseif($kid->mom->mental_state == '0' && $kid->mom->mental_state != null)
                            لا
                        @endif
                    </p>

                    <div class="comment">
                        <p>{{$kid->mom->mental_state_com}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="medical-data w-100">
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>ما هي درجة تواصل الأم مع الطفل</h4>
                </div>
                <div class="custom-control custom-radio">
                    <p>
                        @if($kid->mom->communication == 'good')
                            قوية
                        @endif
                        @if($kid->mom->communication == 'medium')
                            متوسطة
                        @endif
                        @if($kid->mom->communication == 'week')
                            ضعيفة
                        @endif
                    </p>
                    <div class="comment">
                        <p>{{$kid->mom->communication_com}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="medical-data w-100">
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل الحمل بالطفل كان</h4>
                </div>
                <div class="custom-control custom-radio">
                    <p> @if($kid->mom->pregnancy == '0')
                            طبيعي
                        @endif
                        @if($kid->mom->pregnancy == 2)
                            اطفال أنابيب
                        @endif
                        @if($kid->mom->pregnancy == 1)
                            أخرى
                        @endif
                    </p>

                    <div class="comment">
                        <p>{{@$kid->mom->pregnancy_com}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="medical-data w-100">
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>كم كانت أشهر الحمل بالطفل</h4>
                </div>
                <div class="custom-control custom-radio">
                    <p>
                        {{$kid->mom->pregnancy_month}}
                        @if($kid->mom->pregnancy_month != null)
                        شهور
                            @endif
                    </p>
                </div>
            </div>
        </div>

        <div class="medical-data w-100">
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل كانت هناك مشاكل صحية أثناء الحمل</h4>
                </div>
                <div class="custom-control custom-radio">
                    <p> @if($kid->mom->pregnancy_problems == '1')
                            نعم
                        @elseif($kid->mom->pregnancy_problems == '0' && $kid->mom->pregnancy_problems != null)
                            لا
                        @endif
                    </p>
                    <div class="comment">
                        <p>{{@$kid->mom->pregnancy_problems_com}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="medical-data w-100">
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل كانت ولادة الطفل</h4>
                </div>
                <div class="custom-control custom-radio">
                    <p>
                        @if($kid->mom->birth_status == '1')
                            طبيعية
                        @elseif($kid->mom->birth_status == '0' && $kid->mom->birth_status != null)
                            قيصرية
                        @endif
                    </p>
                    <div class="comment">
                        <p>{{@$kid->mom->birth_status_com}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="medical-data w-100">
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل كانت هناك مشاكل أثناء الولادة</h4>
                </div>
                <div class="custom-control custom-radio">
                    <p>
                        @if($kid->mom->birth_problems == '1')
                            نعم
                        @endif

                        @if($kid->mom->birth_problems == '0' && $kid->mom->birth_status != null)
                            لا
                        @endif
                    </p>
                    <div class="comment">
                        <p>{{@$kid->mom->birth_problems_com}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="medical-data w-100">
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل كانت هناك مشاكل بعد الولادة</h4>
                </div>
                <div class="custom-control custom-radio">

                    <p>
                        @if($kid->mom->birth_after_problems == '1')
                            نعم
                        @elseif($kid->mom->birth_after_problems == '0' && $kid->mom->birth_after_problems != null)
                            لا
                        @endif
                    </p>

                    <div class="comment">
                        <p>{{@$kid->mom->birth_after_problems_com}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="medical-data w-100">
            <div class="questions d-flex justify-content-between">
                <div class="medical-data-title">
                    <h4>هل الرضاعة كانت طبيعية</h4>
                </div>
                <div class="custom-control custom-radio">
                    <p>
                        @if($kid->mom->lactation == '1')
                            نعم
                        @elseif($kid->mom->lactation == '0' && $kid->mom->lactation != null)
                            لا
                        @endif
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>
