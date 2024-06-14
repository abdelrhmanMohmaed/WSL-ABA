<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>وصل | الأهداف المنجزة</title>
    <link rel="shortcut icon" type="image/svg" href="{{ asset('dist/front/assets/images/headerlogo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/plan.css') }}">

    <style>
        .delete-model,
        .report-model {
            position: fixed;
            height: 100vh;
            display: none;
            background-color: rgba(0, 0, 0, 0.5);
            inset: 0;
            z-index: 100;
        }

        /* Form container styles */
        .delete-form form,
        .report-form form {
            transform: scale(.9);
            transition: transform 0.3s ease;
        }

        .btn-new-target {
            padding: 12px 24px;
            background: #834e9a;
            border-radius: 8px;
            color: #fff;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .btn-new-target:hover {
            background-color: #6d3f7b;
            color: #fff !important;
        }

        /* Close button styles */
        .btn-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <!--header-->
    @include('front.parts_auth.nav')
    <!-- Models -->
    @include('kids::front.kids.goals.partials.modals.delete')
    @include('kids::front.kids.goals.accomplishedGoals.partials.modals.report')
    <!-- Models -->

    <!-- nav -->
    <nav aria-label="breadcrumb mt-5 mb-5">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('welcome') }}">الرئيسية </a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="{{ route('welcome') }}">
                        <i class="fa-solid fa-chevron-left"></i> لوحة
                        التحكم
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('kids.index') }}"><i
                            class="fa-solid fa-chevron-left"></i>ملفات
                        المرضي </a></li>
                <li class="breadcrumb-item"><a href="{{ route('kids.show', $kid->id) }}">
                        <i class="fa-solid fa-chevron-left"></i>
                        {{ $kid->name }}
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('kids.treatment-plans.index', $kid->id) }}">
                        <i class="fa-solid fa-chevron-left"></i>
                        الخطط العلاجية و الجلسات
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><i class="fa-solid fa-chevron-left"></i>
                    الأهداف المنجزة
                </li>
            </ol>
        </div>
    </nav>
    <!-- nav -->

    <div class="wrapper">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-md-5">
                    <div class="form-title mt-4 mb-4">
                        <img src="{{ asset('dist/front/assets/images/checkmark.png') }}" />
                        <h3>الأهداف المنجزة</h3>
                    </div>
                </div>

                @forelse($goals as $item)
                    <div class="col-12 d-flex justify-content-center mb-4">
                        <div class="container-plan d-flex flex-column align-items-center rounded py-4 w-100">
                            <div class="w-100 px-4">
                                <span class="d-block fw-bold fs-5 mb-2">المهمة</span>

                                <div class="row g-2 mb-3">
                                    <div class="col-md-1 col-3">
                                        <input type="text" value="{{ $item->appeal->name }}"
                                            class="form-control text-center" disabled
                                            style="background-color: #E0F2F3;">
                                    </div>

                                    <div class="col-md-11 col-9">
                                        <input type="text" value="{{ $item->appeal->quest }}" class="form-control"
                                            disabled style="background-color: #E0F2F3;">
                                    </div>
                                </div>

                                <span class="d-block fw-bold fs-5 mb-2">الهدف</span>

                                <div class="row g-2 mb-3">

                                    <div class="col-md-8 col-12">
                                        <input type="text" value="{{ $item->target }}" class="form-control" disabled
                                            style="background-color: #F3F7F7;">
                                    </div>


                                    <div class="col-md-2 col-6">
                                        <button data-id="{{ $item->id }}" data-name="{{ $item->appeal->name }}"
                                            data-target="{{ $item->target }}"
                                            data-description="{{ $item->description }}"
                                            data-mastery="{{ $item->mastery }}"
                                            class="form-control text-center reportItem"
                                            style="background-color: #F3F7F7;">
                                            <i class="fa-regular fa-rectangle-list"></i>
                                            التقرير
                                        </button>
                                    </div>


                                    <div class="col-md-2 col-6">
                                        <button data-id="{{ $item->id }}"
                                            class="form-control text-center deleteItem text-danger"
                                            style="background-color: #F3F7F7;">
                                            <img class="ms-2"
                                                src="{{ asset('dist/front/assets/images/delete-bin.png') }}" />
                                            حذف
                                        </button>
                                    </div>
                                </div>
                                <br>
                                <hr>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="d-flex justify-content-center">
                        <div class=" d-flex justify-content-center rounded py-4">
                            <div class="text-center">
                                <span style="font-weight: bolder;font-size: 25px">لم يتم اضافة أى هدف تم انجازة حتى
                                    الان!</span>
                                <br>
                                <span style="color: #C4C4C4;font-size: 15px">الرجاء الرجوع خطوه للخلف اضافة هدف تم
                                    انجازة</span>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!--footer-->
    @include('front.parts.footer')
    <!--footer-->

    <script src="{{ asset('dist/front/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/front/assets/js/jquery-3.6.3.js') }}"></script>
    <script src="{{ asset('dist/front/assets/js/app.js') }}"></script>
    <script src="{{ asset('vendor\realrashid\sweet-alert\resources\js\sweetalert.all.js') }}"></script>


    <script>
        let closeBtns = document.querySelectorAll(".btn-close");
        let cancelButtons = document.querySelectorAll(".btn-cancel");

        // Start Report Model
        let reportItem = document.querySelectorAll('.reportItem');
        let reportModel = document.querySelector(".report-model");

        reportItem.forEach(function(reportPlanDate) {
            reportPlanDate.addEventListener('click', function() {
                let id = $(this).data('id');
                let name = $(this).data('name');
                let target = $(this).data('target');
                let description = $(this).data('description');
                let mastery = $(this).data('mastery');

                if (mastery == '1') {
                    mastery = 'أتقن';
                } else {
                    mastery = 'لم يتقن';
                }

                let title = "&nbsp;&nbsp;&nbsp;&nbsp;المهمة " + name;
                $('.titleModel').html(title);
                $('.target').val(target)
                $('.description').val(description)
                $('.mastery').val(mastery)

                reportModel.style.display = "block";
            });
        });
        // End Report Model

        // Start Delete Model
        let deleteDateList = document.querySelectorAll('.deleteItem');
        let deleteModel = document.querySelector(".delete-model");

        deleteDateList.forEach(function(deleteDate) {
            deleteDate.addEventListener('click', function() {
                let id = $(this).data('id');
                $('.goal').val(id)

                deleteModel.style.display = "block";
            });
        });
        // End Delete Model


        window.onclick = function(event) {
            if (Array.from(cancelButtons).includes(event.target) || Array.from(closeBtns).includes(event.target)) {
                $('.target').val('')
                $('.goal').val('')

                deleteModel.style.display = "none";

                reportModel.style.display = "none";
            }
        };
    </script>

    @include('sweetalert::alert')
    @include('sweetalert::validation-alert')
</body>

</html>
