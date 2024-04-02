<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>وصل | الأهداف تحت التدريب</title>
    <link rel="shortcut icon" type="image/svg" href="{{asset('dist/front/assets/images/headerlogo.png')}}">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/plan.css')}}">
    <style>

        /*    */
        .fixed-form {
            position: fixed;
            height: 100vh;
            display: none;
            background-color: rgba(0, 0, 0, 0.495);
            inset: 0;
            z-index: 99999;
        }

        .fixed-form .container {
            max-width: 100%;
            padding: 0;
        }

        .fixed-form form {
            width: 50%;
            margin: 10px auto;
            background-color: #fff;
            border-radius: 20px;
            transform: scale(.8);
        }

        .btn-blue {
            background-color: #58B8C2 !important;
        }

        .register-form form .form-group label {
            font-weight: 500;
            font-size: 16px;
            line-height: 28px;
            color: #171215;
            margin-bottom: 4px;
            display: block;
            text-align: right;
        }

        .form_item .form-group {
            width: 48%;
        }

        form .form-group {
            margin-top: 12px;
        }

        .register-form form .form-group input {
            width: 100%;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 10px;
        }

        form .form-group input {
            width: 70%;
            margin: auto;
        }

        .number-block {
            width: 80%;
            margin: 0 auto;
        }

        .number-block .number {
            display: inline-block;
            width: 25%;
            text-align: center;
        }
        /*     */

        /*    */
        .accomplishedPlan-form {
            position: fixed;
            height: 100vh;
            display: none;
            background-color: rgba(0, 0, 0, 0.495);
            inset: 0;
            z-index: 99999;
        }

        .accomplishedPlan-form .container {
            max-width: 100%;
            padding: 0;
        }

        .accomplishedPlan-form form {
            width: 50%;
            margin: 10px auto;
            background-color: #fff;
            border-radius: 20px;
            transform: scale(.8);
        }

        .btn-blue {
            background-color: #58B8C2 !important;
        }

        .accomplishedPlan-form-register form .form-group label {
            font-weight: 500;
            font-size: 16px;
            line-height: 28px;
            color: #171215;
            margin-bottom: 4px;
            display: block;
            text-align: right;
        }

        .form_item .form-group {
            width: 48%;
        }

        form .form-group {
            margin-top: 12px;
        }

        .accomplishedPlan-form-register form .form-group input {
            width: 100%;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 10px;
        }

        form .form-group input {
            width: 70%;
            margin: auto;
        }

        .number-block {
            width: 80%;
            margin: 0 auto;
        }

        .number-block .number {
            display: inline-block;
            width: 25%;
            text-align: center;
        }
        /*     */

        /*     */
        .delete-form {
            position: fixed;
            height: 100vh;
            display: none;
            background-color: rgba(0, 0, 0, 0.495);
            inset: 0;
            z-index: 99999;
        }

        .delete-form .container {
            max-width: 100%;
            padding: 0;
        }

        .delete-form form {
            width: 25%;
            margin: 10px auto;
            background-color: #fff;
            border-radius: 20px;
            transform: scale(.8);
        }

        .btn-blue {
            background-color: #58B8C2 !important;
        }

        .register-form form .form-group label {
            font-weight: 500;
            font-size: 16px;
            line-height: 28px;
            color: #171215;
            margin-bottom: 4px;
            display: block;
            text-align: right;
        }

        .form_item .form-group {
            width: 48%;
        }

        form .form-group {
            margin-top: 12px;
        }

        .register-form form .form-group input {
            width: 100%;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 10px;
        }

        form .form-group input {
            width: 70%;
            margin: auto;
        }

        .number-block {
            width: 80%;
            margin: 0 auto;
        }

        .number-block .number {
            /*display: inline-block;*/
            width: 25%;
            text-align: center;
        }

    </style>
</head>
<body>
<!--header-->
@include('front.parts_auth.nav')

<!-- nav -->
<nav aria-label="breadcrumb mt-5 mb-5">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('welcome')}}">الرئيسية </a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{route('welcome')}}">
                    <i class="fa-solid fa-chevron-left"></i> لوحة
                    التحكم
                </a>
            </li>
            <li class="breadcrumb-item"><a href="{{route('kids.index')}}"><i class="fa-solid fa-chevron-left"></i>ملفات
                    المرضي </a></li>
            <li class="breadcrumb-item"><a href="{{route('kids.show',$kid->id)}}">
                    <i class="fa-solid fa-chevron-left"></i>
                    {{ $kid->name}}
                </a>
            </li>
            <li class="breadcrumb-item"><a href="{{route('kids.treatment-plans.index',$kid->id)}}">
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

<!-- forms -->
@include('kids::front.kids.goals.partials.modals.edit')
@include('kids::front.kids.goals.partials.modals.delete')
@include('kids::front.kids.goals.partials.modals.accomplishedGoals')
<!-- forms -->


<div class="wrapper">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5">
                <div class="form-title mt-4 mb-4">
                    <img src="{{asset('dist/front/assets/images/Search.png')}}"/>
                    <h3>الأهداف تحت التدريب</h3>
                </div>
            </div>
            @forelse($goals as $item)
                <div class="d-flex justify-content-center">
                    <div class="container-plan d-flex justify-content-center rounded py-4">
                        <div style="width: 92%">
                        <span style="font-weight: bolder;font-size: 20px">
                        المهمة
                        </span>
                            <br>

                            <div class="d-flex row">
                                <div class="col-md-1">
                                    <input style="background-color: #E0F2F3;" disabled type="text" value="{{$item->appeal->name}}"
                                           id="disabledTextInput"
                                           class="form-control text-center" placeholder="Disabled input">
                                </div>
                                <div class="col-md-11">
                                    <input style="background-color: #E0F2F3;" disabled type="text" value="{{$item->appeal->quest}}"
                                           id="disabledTextInput"
                                           class="form-control" placeholder="Disabled input">
                                </div>
                            </div>
                            <br>
                            <span style="font-weight: bolder;font-size: 20px">
                                الهدف
                            </span>
                            <br>

                            <div class="d-flex row">
                                <div class="col-md-12">
                                    <input style="background-color: #F3F7F7;" disabled type="text" value="{{$item->target}}" id="disabledTextInput"
                                           class="form-control" placeholder="Disabled input">
                                </div>
                            </div>
                            <br>
                            <span style="font-weight: bolder;font-size: 20px">
                        المثير SD
                        </span>
                            <br>

                            <div style="width: 1122px;" class="d-flex row">

                                <div class="block-of-container">
                                    <input style="background-color: #F3F7F7;" disabled type="text" value="{{$item->stimulus}}" id="disabledTextInput"
                                           class="form-control" placeholder="Disabled input">
                                </div>

                                <div class="block-of-container">
                                    <a style="background-color: #F3F7F7;" href="{{route('kids.treatment-plans.goals.sessions.index',[$kid->id,$item->id])}}"
                                       class="form-control text-center">
                                        <img class="ms-2"
                                             src="{{asset('dist/front/assets/images/User,Profile.png')}}"/>
                                        الجلسات
                                    </a>
                                </div>

                                <div class="block-of-container">
                                    <a style="background-color: #F3F7F7;"  href="{{route('kids.treatment-plans.goals.charts.index',[$kid->id,$item->id])}}"
                                       class="form-control text-center ">
                                        <img class="ms-2"
                                             src="{{asset('dist/front/assets/images/paint.png')}}"/>
                                        الرسم البيانى
                                    </a>
                                </div>

                                <div class="block-of-container">
                                    <button style="background-color: #F3F7F7;" class="form-control text-center accomplishedPlan"
                                            data-id="{{$item->id}}"
                                            data-name="{{$item->appeal->name}}"
                                            data-target="{{$item->target}}">

                                        <img class="ms-2"
                                             src="{{asset('dist/front/assets/images/checkmark-big-square.png')}}"/>
                                        تم ألانجاز
                                    </button>
                                </div>

                                <div class="block-of-container">
                                    <button style="background-color: #F3F7F7;cursor: pointer" class="form-control text-center table-menu-button"
                                            onclick="toggleMenu(event)">
                                        <img class="ms-2" src="{{asset('dist/front/assets/images/dots-menu.png')}}"/>
                                        المزيد
                                    </button>

                                    <div class="table-menu-dropdown">
                                        <p class="editPlan"
                                           data-id="{{$item->id}}"
                                           data-name="{{$item->appeal->name}}"
                                           data-target="{{$item->target}}"
                                           style="cursor: pointer">
                                            <a>
                                                <img src="{{asset('dist/front/assets/images/edit.png')}}" width="20px"
                                                     height="20px" alt="">
                                                تعديل
                                            </a>
                                        </p>

                                        <p class="deletePlan"
                                           data-id="{{$item->id}}"
                                           style="cursor: pointer">
                                            <a>
                                                <img src="{{asset('dist/front/assets/images/delete-bin.png')}}"
                                                     width="20px"
                                                     height="20px" alt="">
                                                حذف
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
                <div class="d-flex justify-content-center">
                    <div class=" d-flex justify-content-center rounded py-4">
                        <div class="text-center">
                            <span style="font-weight: bolder;font-size: 25px">لم يتم اضافة أى هدف حتى الان!</span>
                            <br>
                            <span
                                style="color: #C4C4C4;font-size: 15px">الرجاء الرجوع خطوه للخلف واختيار اضافة هدف</span>
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

<script src="{{asset('dist/front/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('dist/front/assets/js/jquery-3.6.3.js')}}"></script>
<script src="{{asset('dist/front/assets/js/app.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{asset('vendor\realrashid\sweet-alert\resources\js\sweetalert.all.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>


<script>
    function toggleMenu(event) {
        $(event.target).siblings('.table-menu-dropdown').slideToggle();
    }

    let editDateList = document.querySelectorAll('.editPlan');
    let fixedForm = document.querySelector(".fixed-form");
    let fixedFormRow = document.querySelector('.register-form .container .row');
    let close = document.getElementById('close');

    editDateList.forEach(function (editDate) {
        editDate.addEventListener('click', function () {
            let id = $(this).data('id');
            let name = $(this).data('name');
            let target = $(this).data('target');

            $('.titleModel').text('المهمة ' + name)
            $('.target').val(target)
            $('.goal').val(id)

            fixedForm.style.display = "block";
        });
    });
    //
    let accomplishedPlanDateList = document.querySelectorAll('.accomplishedPlan');
    let accomplishedPlanFixedForm = document.querySelector(".accomplishedPlan-form");
    let accomplishedPlanFixedFormRow = document.querySelector('.accomplishedPlan-register-form .container .row');

    accomplishedPlanDateList.forEach(function (accomplishedPlanDate) {
        accomplishedPlanDate.addEventListener('click', function () {
            let id = $(this).data('id');
            let name = $(this).data('name');
            let target = $(this).data('target');

            $('.titleModel').text('المهمة ' + name)
            $('.target').val(target)
            $('.goal').val(id)

            accomplishedPlanFixedForm.style.display = "block";
        });
    });
    //
    let deleteDateList = document.querySelectorAll('.deletePlan');
    let deleteForm = document.querySelector(".delete-form");
    let deleteFormRow = document.querySelector('.delete-form .container .row');

    deleteDateList.forEach(function (deleteDate) {
        deleteDate.addEventListener('click', function () {
            let id = $(this).data('id');
            $('.goal').val(id)

            deleteForm.style.display = "block";
        });
    });

    window.onclick = function (event) {
        if (event.target == fixedFormRow || event.target == accomplishedPlanFixedFormRow || event.target == close) {
            $('.target').val('')
            $('.goal').val('')
            fixedForm.style.display = "none";
            accomplishedPlanFixedForm.style.display = "none";
            deleteForm.style.display = "none";
        }
    };
</script>

@include('sweetalert::alert')
@include('sweetalert::validation-alert')
</body>
</html>
