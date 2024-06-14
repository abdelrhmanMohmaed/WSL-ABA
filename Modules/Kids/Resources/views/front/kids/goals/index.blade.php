<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>وصل | الأهداف تحت التدريب</title>
    <link rel="shortcut icon" type="image/svg" href="{{ asset('dist/front/assets/images/headerlogo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/plan.css') }}">
    <style>
        /* General styles for the fixed form */
        .fixed-form,
        .edit-model,
        .delete-model,
        .accomplishedPlan-model {
            position: fixed;
            height: 100vh;
            display: none;
            background-color: rgba(0, 0, 0, 0.5);
            inset: 0;
            z-index: 100;
        }

        /* Form container styles */
        .edit-model form,
        .delete-form form,
        .accomplishedPlan-form form {
            transform: scale(.9);
            transition: transform 0.3s ease;
        }

        .edit-form form .form-group label {
            text-align: right;
        }

        /* New target button styles */
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

        /* Responsive styles */
        @media (max-width: 768px) {
            .edit-model form {
                width: 90%;
                padding: 1rem;
            }
        }

        @media (max-width: 576px) {
            .edit-model form {
                width: 95%;
                padding: 1rem;
            }
        }
    </style>
</head>

<body>
    <!--header-->
    @include('front.parts_auth.nav')

    <!-- Models -->
    @include('kids::front.kids.goals.partials.modals.edit')
    @include('kids::front.kids.goals.partials.modals.delete')
    @include('kids::front.kids.goals.partials.modals.accomplishedGoals')
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
                    الأهداف تحت التدريب
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
                        <img src="{{ asset('dist/front/assets/images/Search.png') }}" />
                        <h3 class="ms-2">الأهداف تحت التدريب</h3>
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
                                    <div class="col-12">
                                        <input type="text" value="{{ $item->target }}" class="form-control" disabled
                                            style="background-color: #F3F7F7;">
                                    </div>
                                </div>

                                <span class="d-block fw-bold fs-5 mb-2">المثير SD</span>

                                <div class="row g-2 mb-3">

                                    <div class="col-md-4 col-12">
                                        <input type="text" value="{{ $item->stimulus }}" class="form-control"
                                            disabled style="background-color: #F3F7F7;">
                                    </div>

                                    <div class="col-md-2 col-6">
                                        <a href="{{ route('kids.treatment-plans.goals.sessions.index', [$kid->id, $item->id]) }}"
                                            class="form-control text-center" style="background-color: #F3F7F7;">
                                            <img class="me-2" width="24" height="24"
                                                src="{{ asset('dist/front/assets/images/User,Profile.png') }}" />
                                            الجلسات
                                        </a>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <a href="{{ route('kids.treatment-plans.goals.charts.index', [$kid->id, $item->id]) }}"
                                            class="form-control text-center" style="background-color: #F3F7F7;">
                                            <img class="me-2" width="24" height="24"
                                                src="{{ asset('dist/front/assets/images/paint.png') }}" /> الرسم
                                            البياني
                                        </a>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <button class="form-control text-center accomplishedPlanItem"
                                            style="background-color: #F3F7F7;" data-id="{{ $item->id }}"
                                            data-name="{{ $item->appeal->name }}" data-target="{{ $item->target }}">
                                            <img class="me-2" width="24" height="24"
                                                src="{{ asset('dist/front/assets/images/checkmark.png') }}" />
                                            تم ألانجاز
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-6 position-relative">
                                        <button class="form-control text-center table-menu-button"
                                            style="background-color: #F3F7F7;" onclick="toggleMenu(event)">
                                            <img class="me-2"
                                                src="{{ asset('dist/front/assets/images/dots-menu.png') }}" /> المزيد
                                        </button>
                                        <div class="table-menu-dropdown"
                                            style="display: none; position: absolute; top: 100%; left: 0; z-index: 1;">
                                            <p class="editItem" data-id="{{ $item->id }}"
                                                data-name="{{ $item->appeal->name }}"
                                                data-target="{{ $item->target }}" style="cursor: pointer;">
                                                <a>
                                                    <img src="{{ asset('dist/front/assets/images/edit.png') }}"
                                                        width="20px" height="20px" alt=""> تعديل
                                                </a>
                                            </p>
                                            <p class="deleteItem" data-id="{{ $item->id }}"
                                                style="cursor: pointer;">
                                                <a>
                                                    <img src="{{ asset('dist/front/assets/images/delete-bin.png') }}"
                                                        width="20px" height="20px" alt=""> حذف
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 d-flex justify-content-center">
                        <div class="d-flex justify-content-center rounded py-4">
                            <div class="text-center">
                                <span class="d-block fw-bold fs-4">لم يتم اضافة أى هدف حتى الان!</span>
                                <span class="text-muted fs-6">الرجاء الرجوع خطوه للخلف واختيار اضافة هدف</span>
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
        function toggleMenu(event) {
            $(event.target).closest('.table-menu-button').siblings('.table-menu-dropdown').slideToggle();
        }

        let closeBtns = document.querySelectorAll(".btn-close");
        let cancelButtons = document.querySelectorAll(".btn-cancel");

        // Start edit model
        let editModel = document.querySelector(".edit-model");
        let editDateList = document.querySelectorAll('.editItem');
        editDateList.forEach(function(editDate) {
            editDate.addEventListener('click', function() {
                let id = $(this).data('id');
                let name = $(this).data('name');
                let target = $(this).data('target');

                let title = "&nbsp;&nbsp;&nbsp;&nbsp;المهمة " + name;
                $('.titleModel').html(title);
                $('.target').val(target)
                $('.goal').val(id)

                editModel.style.display = "block";
            });
        });
        // End edit model
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
        // Start Accomplished Plan Model
        let accomplishedPlanItem = document.querySelectorAll('.accomplishedPlanItem');
        let accomplishedPlanModel = document.querySelector(".accomplishedPlan-model");

        accomplishedPlanItem.forEach(function(accomplishedPlanDate) {
            accomplishedPlanDate.addEventListener('click', function() {
                let id = $(this).data('id');
                let name = $(this).data('name');
                let target = $(this).data('target');

                let title = "&nbsp;&nbsp;&nbsp;&nbsp;المهمة " + name;
                $('.titleModel').html(title);
                $('.target').val(target)
                $('.goal').val(id)

                accomplishedPlanModel.style.display = "block";
            });
        });
        // End Accomplished Plan Model

        window.onclick = function(event) {
            if (Array.from(cancelButtons).includes(event.target) || Array.from(closeBtns).includes(event.target)) {
                $('.target').val('')
                $('.goal').val('')

                editModel.style.display = "none";
                deleteModel.style.display = "none";
                accomplishedPlanModel.style.display = "none";
            }
        };
    </script>

    @include('sweetalert::alert')
    @include('sweetalert::validation-alert')
</body>

</html>
