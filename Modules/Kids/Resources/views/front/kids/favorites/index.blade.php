<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>وصل | تقيم المفضلات</title>
    <link rel="shortcut icon" type="image/svg" href="{{asset('dist/front/assets/images/headerlogo.png')}}">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/albss.css')}}"/>
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/favorite.css')}}"/>
    <style>
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
            width: 90%;
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

        .patiant-file .SS-btn a {
            color: #000;
            background: #F3F7F7;
            border-radius: 8px;
            font-weight: 900;
            font-size: 18px;
            line-height: 25px;
            display: inline-block;
            width: 170px;
            height: 64px;
            /*padding: 15px 20px;*/
            text-align: center;
            text-decoration: none;
        }
    </style>
</head>
<body class="patiant-file">
<!--header-->
@include('front.parts_auth.nav')

<!--breadcrumb-->
<nav aria-label="breadcrumb mt-5 mb-5">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('welcome')}}">الرئيسية </a></li>
            <li class="breadcrumb-item"><a href="{{route('kids.index')}}"><i class="fa-solid fa-chevron-left"></i>ملفات
                    المرضي </a></li>
            <li class="breadcrumb-item" aria-current="page">
                <a href="{{route('kids.show',$kid->id)}}"><i class="fa-solid fa-chevron-left"></i>
                    {{ $kid->name}}
                </a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
                <a href="{{route('kids.evaluation',$kid->id)}}"><i class="fa-solid fa-chevron-left"></i>
                    تقيم المريض
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <i class="fa-solid fa-chevron-left"></i>
                تقيم المفضلات
            </li>
        </ol>
    </div>
</nav>


<div class="wrapper">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5 ">
                <div class="form-title mt-4 mb-4">
                    <img src="{{asset('dist/front/assets/images/rating.png')}}"/>
                    <h3> تقييم المفضلات</h3>
                </div>
            </div>

            <div class="col-md-7 d-flex align-items-center justify-content-md-end justify-content-start">
                <button class="border-0 edit-file mx-1">
                    <a href="{{route('kids.evaluate.favorites.create',$kid->id)}}" class="add-new-appeals"> <img
                            src="{{asset('dist/front/assets/images/plus.png')}}" alt=""> إضافة
                        تقييم
                        مفضلات جديد
                    </a>
                </button>
                @empty(!$favorite)
                    <button class="border-0 edit-file mx-1">
                        <a href="{{route('kids.evaluate.favorites.show',$kid->id)}}" class="add-new-appeals">
                            <img src="{{asset('dist/front/assets/images/folder-archive-box.png')}}" alt="">
                            المفضلات السابقة
                        </a>
                    </button>

                    <button class="editDate edit-file border-0 SF-btn mx-1">
                        <a>
                            <img id="favorite" data-id="{{@$favorite->id}}"
                                 src="{{asset('dist/front/assets/images/edit.png')}}"
                                 style="margin:auto;"/>
                            تعديل التاريخ
                        </a>
                    </button>

                    <button onclick="window.print()" class="border-0 edit-file mx-1">
                        <a class="">
                            <i class="fas fa-print fa-xl"></i>
                        </a>
                    </button>
                    @include('kids::front.kids.favorites.partials.modals.edit')
                @endif
            </div>

            @empty(!$favorite)
                <div style="background-color: #F8FCFC!important;" class="tab-content">
                    <div class="container">
                        <div class="text-data">
                            <div class="fw-bold">
                                <h5 style="font-weight: 1000!important; font-size: 20px;">ارشادات المفضلات</h5>
                                <div class="m-2 mt-3">
                                    1- {{@$favorite->frist_instruction}}
                                </div>
                                <div class="m-2 mt-3">
                                    2- {{@$favorite->second_instruction}}
                                </div>
                                <div class="m-2 mt-3">
                                    3- {{@$favorite->third_instruction}}
                                </div>
                                <div class="m-2 mt-3">
                                    4- {{@$favorite->fourth_instruction}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="background-color: #F8FCFC!important;" class="tab-content mt-5">
                    <div class="container">
                        <div class="text-data">
                            <div class="fw-bold">
                                <h5 class="fw-bold">نسب المفضلات</h5>

                                <div class="col-md-12 text-center">
                                    <div class="SS-btn my-3 d-flex">
                                        <a style="background-color: #58b8c2;padding-top:20px; font-weight: 900; font-size: 18px;">
                                            المفضل
                                        </a>
                                        <a style="padding-top:20px" class="percent mx-2">
                                            {{@$favorite->frist_name??'المفضل'}}
                                        </a>
                                        <a style="padding-top:20px" class="percent mx-2">
                                            {{@$favorite->second_name??'المفضل'}}
                                        </a>
                                        <a style="padding-top:20px" class="percent mx-2">
                                            {{@$favorite->third_name??'المفضل'}}
                                        </a>
                                        <a style="padding-top:20px" class="percent mx-2">
                                            {{@$favorite->fourth_name??'المفضل'}}
                                        </a>
                                        <a style="padding-top:20px" class="percent mx-2">
                                            {{@$favorite->fifth_name??'المفضل'}}
                                        </a>
                                        <a style="padding-top:20px" class="percent mx-2">
                                            {{@$favorite->sixth_name??'المفضل'}}
                                        </a>
                                    </div>

                                    <div style="font-weight: 1000; font-size: 20px;" class="SS-btn d-flex">
                                        <a style="background-color: #58b8c2;padding-top:20px; font-weight: 900; font-size: 18px;">
                                            النسبة %
                                        </a>
                                        <a style="padding-top:20px" class="percent mx-2">
                                            {{@$favorite->frist_percentage}}
                                        </a>
                                        <a style="padding-top:20px" class="percent mx-2">
                                            {{@$favorite->second_percentage}}
                                        </a>
                                        <a style="padding-top:20px" class="percent mx-2">
                                            {{@$favorite->third_percentage}}
                                        </a>
                                        <a style="padding-top:20px" class="percent mx-2">
                                            {{@$favorite->fourth_percentage}}
                                        </a>
                                        <a style="padding-top:20px" class="percent mx-2">
                                            {{@$favorite->fifth_percentage}}
                                        </a>
                                        <a style="padding-top:20px" class="percent mx-2">
                                            {{@$favorite->sixth_percentage}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="background-color: #F8FCFC!important;" class="tab-content mt-5">
                    <div class="container">
                        <div class="text-data">
                            <div class="fw-bold">
                                <h5 class="fw-bold">الرسم العمودى لتقيم المفضلات</h5>
                                <div class="d-flex justify-content-center mt-5">
                                    <canvas id="myChart" width="400" height="130" class="w-75"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="d-flex justify-content-center pt-5">
                    <div class=" d-flex justify-content-center rounded py-4">
                        <div class="text-center">
                            <span style="font-weight: bolder;font-size: 25px">لم يتم اضافة أى مفضلة حتى الان!</span>
                            <br>
                            <span
                                style="color: #C4C4C4;font-size: 15px">أضغط على زر أضافة مفضلة الاضافة المفضبة الاولى</span>
                        </div>
                    </div>
                </div>
            @endif
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
    const ctx = document.getElementById('myChart').getContext('2d');

    const percentages = [];

    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                "{{@$favorite->sixth_name??'المفضل السادسة'}}",
                "{{@$favorite->fifth_name??'المفضل الخامسة'}}",
                "{{@$favorite->fourth_name??'المفضل الرابعة'}}",
                "{{@$favorite->third_name??'المفضل الثالثة'}}",
                "{{@$favorite->second_name??'المفضل الثانية'}}",
                "{{@$favorite->frist_name??'المفضل الاولى'}}"
            ],
            datasets: [{
                label: '', // Remove the title
                barPercentage: 0.5,
                barThickness: 200,
                maxBarThickness: 30,
                minBarLength: 0,
                data: [
                    {{@$favorite->sixth_percentage??'0'}},
                    {{@$favorite->fifth_percentage??'0'}},
                    {{@$favorite->fourth_percentage??'0'}},
                    {{@$favorite->third_percentage??'0'}},
                    {{@$favorite->second_percentage??'0'}},
                    {{@$favorite->frist_percentage??'0'}},
                    50, 60, 70, 80, 90, 100],
                backgroundColor: '#C8A2C8', // Set the background color to #FFFF
                borderWidth: 0 // Remove the border color
            }]
        },
        options: {
            scales: {
                x: {
                    grid: {
                        display: false // Remove display of X-axis grid lines
                    },
                    ticks: {
                        font: {
                            weight: 'bold' // Make the X-axis ticks bold
                        }
                    }
                },
                y: {
                    position: 'right', // Set the position of Y-axis to 'right'
                    max: 100,
                    ticks: {
                        font: {
                            weight: 'bold' // Make the Y-axis ticks bold
                        }
                    },
                    grid: {
                        display: true // Display Y-axis grid lines
                    }
                }
            },
            plugins: {
                tooltip: {
                    enabled: false // Disable the tooltip
                }, legend: {
                    display: false // إزالة عرض موديل الألوان
                }
            }
        }
    });
    let fixedForm = document.querySelector(".fixed-form");
    let editDate = document.querySelector('.editDate');
    let fixedFormRow = document.querySelector('.register-form .container .row');

    editDate.addEventListener('click', function () {
        let id = $('#favorite').data('id');
        $('#favoriteId').val(id);
        fixedForm.style.display = "block";
    })
    window.onclick = function (event) {

        if (event.target == fixedFormRow) {
            fixedForm.style.display = "none";
        }
    }
</script>

@include('sweetalert::alert')
@include('sweetalert::validation-alert')
</body>
</html>
