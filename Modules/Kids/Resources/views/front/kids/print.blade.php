<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> وصل | بيانات المريض ({{ $kid->name }})</title>

    <link rel="shortcut icon" type="image/svg" href="{{ asset('dist/front/assets/images/headerlogo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="a0nymous" referrerpolicy="0-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/family-form.css') }}" />

    <style>
        /* @media print { */

        .main-header,
        #footer,
        .nav-report,
        .print-div,
        #menu {
            display: none !important;
        }

        .form-control {
            height: 42px !important;
        }

        .medical-data {
            height: 100px !important;
        }

        .page-break {
            page-break-before: always;
        }

        /* } */
    </style>
</head>

<body>
    @include('front.parts_auth.nav')

    <div class="tab-form">
        <div class="container">
            <div class="row align-items-center">

                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#kidDataShow">بيانات الطفل</a>
                    </li>
                </ul>
                <div id="kidDataPrint" class="container tab-pane active">
                    <div class="text-data">

                        <div class="form-group">
                            <label>الاسم كاملاً </label>
                            <p class="form-control"> {{ $kid->name }}
                            </p>
                        </div>

                        <div class="form-group">
                            <label>رقم الهوية</label>
                            <p class="form-control">
                                {{ $kid->num }}
                            </p>
                        </div>

                        <div class="form-group">
                            <label> تاريخ الميلاد</label>
                            <p class="form-control">
                                {{ $kid->date }}
                            </p>
                        </div>

                        <div class="form-group">
                            <label>مكان الميلاد</label>
                            <p class="form-control">{{ $kid->place_date }}</p>
                        </div>

                        <div class="form-group">
                            <label>الجنس</label>
                            <p class="form-control">
                                @if ($kid->gender == '1')
                                    ذكر
                                @else
                                    انثي
                                @endif
                            </p>
                        </div>

                        <div class="form-group">
                            <label>الجنسية</label>
                            <p class="form-control">{{ $kid->nationality }}</p>
                        </div>

                        <div class="form-group">
                            <label>الدولة</label>
                            <p class="form-control">
                                {{ $kid->country->name_ar }}
                            </p>
                        </div>

                        <div class="form-group">
                            <label>المدينة </label>
                            <p class="form-control">{{ $kid->city->name_ar }}</p>
                        </div>

                        <div class="form-group">
                            <label>رقم التواصل </label>
                            <p class="form-control">{{ $kid->phone }}</p>
                        </div>


                        <div class="medical-data mt-4 w-100">
                            <div class="questions d-flex justify-content-between">
                                <div class="medical-data-title">
                                    <h4>هل لدى الطفل اعاقات أخرى</h4>
                                </div>
                                <div class="custom-control custom-radio">
                                    <p>
                                        @if ($kid->other_obstruction == '1')
                                            نعم
                                        @else
                                            لا
                                        @endif
                                    </p>
                                    <div class="comment">
                                        <p>{{ @$kid->other_obstruction_com }} </p>
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
                                        @if ($kid->chronic_diseases == '1')
                                            نعم
                                        @else
                                            لا
                                        @endif
                                    </p>
                                    <div class="comment">
                                        <p>{{ @$kid->chronic_diseases_com }}</p>
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
                                        @if ($kid->genetic_diseases == '1')
                                            نعم
                                        @else
                                            لا
                                        @endif
                                    </p>

                                    <div class="comment">
                                        <p> {{ @$kid->genetic_diseases_com }} </p>
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
                                        @if ($kid->health_problems == '1')
                                            نعم
                                        @else
                                            لا
                                        @endif
                                    </p>
                                    <div class="comment">
                                        <p>{{ @$kid->health_problems_com }}</p>
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
                                        @if ($kid->growth_stage == '1')
                                            نعم
                                        @else
                                            لا
                                        @endif
                                    </p>
                                    <div class="comment">
                                        <p>{{ @$kid->growth_stage_com }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="page-break"></div>

                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#fatherDataShow">بيانات الأب</a>
                    </li>
                </ul>
                <div id="fatherDataPrint" class="container tab-pane active">
                    <div class="text-data">

                        <div class="form-group">
                            <label>الاسم كاملاً </label>
                            <p class="form-control">
                                {{ $kid->dad->name }}</p>
                        </div>

                        <div class="form-group">
                            <label>رقم الهوية</label>
                            <p class="form-control">{{ $kid->dad->num }} </p>
                        </div>

                        <div class="form-group">
                            <label> تاريخ الميلاد</label>
                            <p class="form-control">{{ $kid->dad->date }} </p>
                        </div>

                        <div class="form-group">
                            <label>الحالة الاجتماعية</label>
                            <p class="form-control">
                                @if ($kid->dad->marital_status == 'married')
                                    متزوج
                                @endif
                                @if ($kid->dad->marital_status == 'divorce')
                                    مطلق
                                @endif

                                @if ($kid->dad->marital_status == 'Widower')
                                    أرمل
                                @endif
                            </p>
                        </div>

                        <div class="form-group">
                            <label> رقم التواصل</label>
                            <p class="form-control">{{ $kid->dad->phone }}</p>
                        </div>

                        <div class="form-group">
                            <label>المستوى التعليمي</label>
                            <p class="form-control">
                                @if ($kid->dad->learning == 'none')
                                    أمّي
                                @endif
                                @if ($kid->dad->learning == 'primary')
                                    ابتدائي
                                @endif
                                @if ($kid->dad->learning == 'middle')
                                    متوسط
                                @endif
                                @if ($kid->dad->learning == 'secondary')
                                    ثانوي
                                @endif
                                @if ($kid->dad->learning == 'diploma')
                                    دبلوم
                                @endif
                                @if ($kid->dad->learning == 'Bachelor')
                                    بكالوريس
                                @endif
                                @if ($kid->dad->learning == 'Master')
                                    ماجستير
                                @endif
                                @if ($kid->dad->learning == 'doctor')
                                    دكتوراه
                                @endif
                            </p>
                        </div>

                        <div class="form-group">
                            <label> طبيعة العمل</label>
                            <p class="form-control">
                                @if ($kid->dad->work == 'public_work')
                                    موظف حكومي
                                @endif
                                @if ($kid->dad->work == 'private_work')
                                    موظف قطاع خاص
                                @endif
                                @if ($kid->dad->work == 'free_work')
                                    أعمال حرة
                                @endif
                                @if ($kid->dad->work == "don't_work")
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
                                        @if ($kid->dad->smoking == '1')
                                            نعم
                                        @elseif($kid->dad->smoking == '0' && $kid->dad->smoking != null)
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
                                        @if ($kid->dad->obstruction == '1')
                                            نعم
                                        @elseif($kid->dad->obstruction == '0' && $kid->dad->obstruction != null)
                                            لا
                                        @endif
                                    </p>
                                    <div class="comment">
                                        <p>{{ @$kid->dad->obstruction_com }} </p>
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
                                        @if ($kid->dad->chronic_diseases == '1')
                                            نعم -
                                        @elseif($kid->dad->chronic_diseases == '0' && $kid->dad->chronic_diseases != null)
                                            لا
                                        @endif
                                    </p>
                                    <div class="comment">
                                        <p>{{ @$kid->dad->chronic_diseases_com }} </p>
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
                                        @if ($kid->dad->genetic_diseases == '1')
                                            نعم
                                        @elseif($kid->dad->genetic_diseases == '0' && $kid->dad->genetic_diseases != null)
                                            لا
                                        @endif
                                    </p>
                                    <div class="comment">
                                        <p>{{ @$kid->dad->genetic_diseases_com }} </p>
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
                                        @if ($kid->dad->mental_state == '1')
                                            يعاني من مشاكل نفسية
                                        @elseif($kid->dad->mental_state == '0' && $kid->dad->mental_state != null)
                                            طبيعي
                                        @endif
                                    </p>
                                    <div class="comment">
                                        <p>{{ @$kid->dad->mental_state_com }} </p>
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
                                    <p>
                                        @if ($kid->dad->health_problems == '1')
                                            نعم
                                        @elseif($kid->dad->health_problems == '0' && $kid->dad->health_problems != null)
                                            لا
                                        @endif
                                    </p>
                                    <div class="comment">
                                        <p>{{ @$kid->dad->health_problems_com }} </p>
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
                                        @if ($kid->dad->communication == 'good')
                                            قوية
                                        @endif
                                        @if ($kid->dad->communication == 'medium')
                                            متوسطة
                                        @endif
                                        @if ($kid->dad->communication == 'week')
                                            ضعيفة
                                        @endif
                                    </p>
                                    <div class="comment">
                                        <p>{{ @$kid->dad->communication_com }} </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- <div class="page-break"></div> --}}

                <ul class="nav nav-tabs" role="tablist" style="margin-top: 100px">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#motherDataShow">
                            بيانات الأم</a>
                    </li>
                </ul>
                <div id="motherDataPrint" class="container tab-pane active">
                    <div class="text-data">

                        <div class="form-group">
                            <label>الاسم كاملاً </label>
                            <p class="form-control">
                                {{ $kid->mom->name }}
                            </p>
                        </div>

                        <div class="form-group">
                            <label>رقم الهوية</label>
                            <p class="form-control">{{ $kid->mom->num }}</p>
                        </div>

                        <div class="form-group">
                            <label> تاريخ الميلاد</label>
                            <p class="form-control">{{ $kid->mom->date }}</p>
                        </div>

                        <div class="form-group">
                            <label>الحالة الاجتماعية</label>
                            <p class="form-control">
                                @if ($kid->mom->marital_status == 'married')
                                    متزوجة
                                @endif
                                @if ($kid->mom->marital_status == 'divorce')
                                    مطلقة
                                @endif
                                @if ($kid->mom->marital_status == 'Widower')
                                    أرملة
                                @endif
                            </p>
                        </div>

                        <div class="form-group">
                            <label> رقم التواصل</label>
                            <p class="form-control">{{ $kid->mom->phone }}</p>
                        </div>

                        <div class="form-group">
                            <label>المستوى التعليمي</label>
                            <p class="form-control">
                                @if ($kid->mom->learning == 'none')
                                    أمّي
                                @endif
                                @if ($kid->mom->learning == 'primary')
                                    ابتدائي
                                @endif
                                @if ($kid->mom->learning == 'middle')
                                    متوسط
                                @endif
                                @if ($kid->mom->learning == 'secondary')
                                    ثانوي
                                @endif
                                @if ($kid->mom->learning == 'diploma')
                                    دبلوم
                                @endif
                                @if ($kid->mom->learning == 'Bachelor')
                                    بكالوريس
                                @endif
                                @if ($kid->mom->learning == 'Master')
                                    ماجستير
                                @endif
                                @if ($kid->mom->learning == 'doctor')
                                    دكتوراه
                                @endif
                            </p>
                        </div>

                        <div class="form-group">
                            <label> طبيعة العمل</label>
                            <p class="form-control">
                                @if ($kid->mom->work == 'public_work')
                                    موظف حكومي
                                @endif
                                @if ($kid->mom->work == 'private_work')
                                    موظف قطاع خاص
                                @endif
                                @if ($kid->mom->work == 'free_work')
                                    أعمال حرة
                                @endif
                                @if ($kid->mom->work == "don't_work")
                                    لا يعمل
                                @endif
                            </p>
                        </div>


                        <div class="medical-data mt-3 w-100">
                            <div class="questions d-flex justify-content-between">
                                <div class="medical-data-title ">
                                    <h4>هل الأم مدخنة</h4>
                                </div>
                                <div class="custom-control custom-radio ">
                                    <p>
                                        @if ($kid->mom->smoking == '1')
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
                                        @if ($kid->mom->obstruction == '1')
                                            نعم
                                        @elseif($kid->mom->obstruction == '0' && $kid->mom->obstruction != null)
                                            لا
                                        @endif
                                    </p>
                                    <div class="comment">
                                        <p>{{ @$kid->mom->obstruction_com }} </p>
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
                                        @if ($kid->mom->chronic_diseases == '1')
                                            نعم
                                        @elseif($kid->mom->chronic_diseases == '0' && $kid->mom->chronic_diseases != null)
                                            لا
                                        @endif
                                    </p>
                                    <div class="comment">
                                        <p>
                                            {{ @$kid->mom->hronic_diseases_com }}
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
                                        @if ($kid->mom->genetic_diseases == '1')
                                            نعم
                                        @elseif($kid->mom->genetic_diseases == '0' && $kid->mom->genetic_diseases != null)
                                            لا
                                        @endif
                                    </p>
                                    <div class="comment">
                                        <p>{{ @$kid->mom->genetic_diseases_com }}</p>
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
                                        @if ($kid->mom->health_problems == '1')
                                            نعم
                                        @elseif($kid->mom->health_problems == '0' && $kid->mom->health_problems != null)
                                            لا
                                        @endif
                                    </p>
                                    <div class="comment">
                                        <p>{{ $kid->mom->health_problems_com }}</p>
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
                                        @if ($kid->mom->mental_state == '1')
                                            نعم
                                        @elseif($kid->mom->mental_state == '0' && $kid->mom->mental_state != null)
                                            لا
                                        @endif
                                    </p>

                                    <div class="comment">
                                        <p>{{ $kid->mom->mental_state_com }}</p>
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
                                        @if ($kid->mom->communication == 'good')
                                            قوية
                                        @endif
                                        @if ($kid->mom->communication == 'medium')
                                            متوسطة
                                        @endif
                                        @if ($kid->mom->communication == 'week')
                                            ضعيفة
                                        @endif
                                    </p>
                                    <div class="comment">
                                        <p>{{ $kid->mom->communication_com }}</p>
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
                                    <p>
                                        @if ($kid->mom->pregnancy == '0')
                                            طبيعي
                                        @endif
                                        @if ($kid->mom->pregnancy == 2)
                                            اطفال أنابيب
                                        @endif
                                        @if ($kid->mom->pregnancy == 1)
                                            أخرى
                                        @endif
                                    </p>

                                    <div class="comment">
                                        <p>{{ @$kid->mom->pregnancy_com }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="page-break"></div>

                        <div class="medical-data w-100">
                            <div class="questions d-flex justify-content-between">
                                <div class="medical-data-title">
                                    <h4>كم كانت أشهر الحمل بالطفل</h4>
                                </div>
                                <div class="custom-control custom-radio">
                                    <p>
                                        {{ $kid->mom->pregnancy_month }}
                                        @if ($kid->mom->pregnancy_month != null)
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
                                    <p>
                                        @if ($kid->mom->pregnancy_problems == '1')
                                            نعم
                                        @elseif($kid->mom->pregnancy_problems == '0' && $kid->mom->pregnancy_problems != null)
                                            لا
                                        @endif
                                    </p>
                                    <div class="comment">
                                        <p>{{ @$kid->mom->pregnancy_problems_com }}</p>
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
                                        @if ($kid->mom->birth_status == '1')
                                            طبيعية
                                        @elseif($kid->mom->birth_status == '0' && $kid->mom->birth_status != null)
                                            قيصرية
                                        @endif
                                    </p>
                                    <div class="comment">
                                        <p>{{ @$kid->mom->birth_status_com }}</p>
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
                                        @if ($kid->mom->birth_problems == '1')
                                            نعم
                                        @endif

                                        @if ($kid->mom->birth_problems == '0' && $kid->mom->birth_status != null)
                                            لا
                                        @endif
                                    </p>
                                    <div class="comment">
                                        <p>{{ @$kid->mom->birth_problems_com }}</p>
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
                                        @if ($kid->mom->birth_after_problems == '1')
                                            نعم
                                        @elseif($kid->mom->birth_after_problems == '0' && $kid->mom->birth_after_problems != null)
                                            لا
                                        @endif
                                    </p>

                                    <div class="comment">
                                        <p>{{ @$kid->mom->birth_after_problems_com }}</p>
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
                                        @if ($kid->mom->lactation == '1')
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

                <div class="page-break"></div>

                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#familyDataShow">بيانات الأسرة</a>
                    </li>
                </ul>
                <div id="familyDataPrint" class="container tab-pane active">
                    <div class="text-data">

                        <div class="form-group family-data">
                            <label>عدد أفراد الاسره</label>
                            <p class="form-control">
                                {{ $kid->family->num_of }}
                            </p>
                        </div>

                        <div class="form-group family-data">
                            <label>عدد الأشقاء الذكور</label>
                            <p class="form-control">
                                {{ $kid->family->num_of_pro }}
                            </p>
                        </div>

                        <div class="form-group family-data">
                            <label>عدد الأشقاء الاناث </label>
                            <p class="form-control">
                                {{ $kid->family->num_of_sis }}
                            </p>
                        </div>

                        <div class="form-group family-data">
                            <label> الطفل بين أشقاءه</label>
                            <p class="form-control">
                                {{ $kid->family->sort_of }}
                            </p>
                        </div>

                        <div class="form-group family-data">
                            <label>هل لدى الطفل شقيق يعاني من التوحد </label>
                            <p class="form-control">
                                @if ($kid->family->bro_autism == 'no')
                                    لا، لا يوجد
                                @endif
                                @if ($kid->family->bro_autism == 'bro_autism')
                                    لديه شقيق يعاني من التوحد
                                @endif
                                @if ($kid->family->bro_autism == 'many_bro_autism')
                                    أكتر من شقيق يعاني من التوحد
                                @endif
                            </p>
                        </div>

                        <div class="form-group family-data">
                            <label> هل لدى الطفل توأم</label>
                            <p class="form-control">
                                @if ($kid->family->has_twins == 'no')
                                    لا، لا يوجد
                                @endif
                                @if ($kid->family->has_twins == 'yes_bro_autism')
                                    ويعاني من التوحد
                                @endif
                                @if ($kid->family->has_twins == 'no_bro_autism')
                                    عم، ولكنه لا يعاني من التوحد
                                @endif
                            </p>
                        </div>

                        <div class="form-group family-data">
                            <label>الحالة الاجتماعية للأسرة</label>
                            <p class="form-control">
                                @if ($kid->family->marital_status == 'mum_dad_together')
                                    دان على علاقتهما الزوجية
                                @endif
                                @if ($kid->family->marital_status == 'mum_dad_divorce')
                                    الوالدان منفصلان
                                @endif
                                @if ($kid->family->marital_status == 'dad_died')
                                    الأب متوفي
                                @endif
                                @if ($kid->family->marital_status == 'mum_died')
                                    الأم متوفي
                                @endif
                                @if ($kid->family->marital_status == 'other')
                                    أخري
                                @endif
                            </p>
                        </div>

                        <div class="form-group family-data">
                            <label>مع من يسكن الطفل</label>
                            <p class=" ">
                                @if ($kid->family->with_live == 'parenthood')
                                    مع والديه
                                @endif
                                @if ($kid->family->with_live == 'dad')
                                    مع الأب
                                @endif
                                @if ($kid->family->with_live == 'mom')
                                    مع الأم
                                @endif
                                @if ($kid->family->with_live == 'other')
                                    أخرى
                                @endif
                            </p>
                            <p class="form-control"> {{ @$kid->family->with_live_comm }} </p>
                        </div>

                        <div class="form-group family-data">
                            <label>متوسط دخل الأسرة الشهري</label>
                            <p class="form-control">
                                @if ($kid->family->income == '0')
                                    لا يوجد دخل
                                @endif
                                @if ($kid->family->income == '4000')
                                    أقل من 4,000 ريال
                                @endif
                                @if ($kid->family->income == '4,000 - 10,000')
                                    4,000 - 10,000 ريال
                                @endif
                                @if ($kid->family->income == '10,000 - 15,000')
                                    10,000 - 15,000 ريال
                                @endif
                                @if ($kid->family->income == '15,000 - 20,000')
                                    15,000 - 20,000 ريال
                                @endif
                                @if ($kid->family->income == '20,000')
                                    أكثر من 20,000 ريال
                                @endif
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.onload = function() {
            window.print();
        }

        window.onafterprint = function() {
            if (!window.matchMedia) return;

            var mediaQueryList = window.matchMedia('print');
            if (!mediaQueryList.matches) {

                window.history.back();
            }
        };
    </script>
</body>

</html>
