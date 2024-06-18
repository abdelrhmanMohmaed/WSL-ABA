<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>وصل | تقيم المفضلات</title>
    <link rel="shortcut icon" type="image/svg" href="{{ asset('dist/front/assets/images/headerlogo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/albss.css') }}" />

    <style>
        .edit-model {
            position: fixed;
            height: 100vh;
            display: none;
            background-color: rgba(0, 0, 0, 0.5);
            inset: 0;
            z-index: 100;
        }

        .edit-form form {
            transform: scale(.9);
            transition: transform 0.3s ease;
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
            background-color: #FFFF;
            color: #834e9a !important;
            border: #834e9a solid 1px;
        }

        /* Close button styles */
        .btn-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
        }
        .custom-bg {
            background-color: #F8FCFC !important;
        }

        .styled-input {
            background-color: #F8FCFC !important;
            border: 0 solid #F8FCFC !important;
        }

        @media print {
            .main-header,
            #footer,
            nav,
            .buttons,
            #menu {
                display: none !important;
            }
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
                <li class="breadcrumb-item"><a href="{{ route('welcome') }}">الرئيسية </a></li>
                <li class="breadcrumb-item"><a href="{{ route('kids.index') }}"><i
                            class="fa-solid fa-chevron-left"></i>ملفات
                        المرضي </a></li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="{{ route('kids.show', $kid->id) }}"><i class="fa-solid fa-chevron-left"></i>
                        {{ $kid->name }}
                    </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="{{ route('kids.evaluation', $kid->id) }}"><i class="fa-solid fa-chevron-left"></i>
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
                <div class="col-md-5">
                    <div class="form-title mt-4 mb-4">
                        <img src="{{ asset('dist/front/assets/images/rating.png') }}" />
                        <h3> تقييم المفضلات</h3>
                    </div>
                </div>

                <div class="buttons col-md-7 d-flex align-items-center justify-content-md-end justify-content-start">
                    <button class="border-0 edit-file mx-1">
                        <a href="{{ route('kids.evaluate.favorites.create', $kid->id) }}" class="add-new-appeals"> <img
                                src="{{ asset('dist/front/assets/images/plus.png') }}" alt=""> إضافة
                            تقييم
                            مفضلات جديد
                        </a>
                    </button>
                    @empty(!$favorite)
                        <button class="border-0 edit-file mx-1">
                            <a href="{{ route('kids.evaluate.favorites.show', $kid->id) }}" class="add-new-appeals">
                                <img src="{{ asset('dist/front/assets/images/folder-archive-box.png') }}" alt="">
                                المفضلات السابقة
                            </a>
                        </button>

                        <button class="editItem edit-file border-0 SF-btn mx-1">

                            <a>
                                <img id="favorite" data-id="{{ @$favorite->id }}"
                                    data-date="{{ $favorite->create_date }}"
                                    src="{{ asset('dist/front/assets/images/edit.png') }}" style="margin:auto;" />
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

                        <div class="container mt-5 custom-bg">
                            <div class="px-2 py-3">
                                <div class="text-data">
                                    <div class="fw-bold">
                                        <h5 class="fw-bolder">ارشادات المفضلات</h5>
                                        <div class="form-row mb-2">
                                            <div class="d-flex">
                                                <label for="firstInstruction" class="mt-1 ms-2">1-</label>
                                                <input name="firstInstruction" id="firstInstruction" type="text"
                                                    class="form-control styled-input" value="{{ @$favorite->frist_instruction }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-row align-items-center mb-2">
                                            <div class="d-flex">
                                                <label for="secondInstruction" class="mt-1 ms-2">2-</label>
                                                <input name="secondInstruction" id="secondInstruction" type="text"
                                                    class="form-control styled-input" value="{{$favorite->second_instruction}}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-row align-items-center mb-2">
                                            <div class="d-flex">
                                                <label for="thirdInstruction" class="mt-1 ms-2">3-</label>
                        
                                                <input name="thirdInstruction" id="thirdInstruction" type="text"
                                                    class="form-control styled-input" value="{{$favorite->third_instruction}}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-row align-items-center mb-2">
                                            <div class="d-flex">
                                                <label for="fourthInstruction" class="mt-1 ms-2">4-</label>
                        
                                                <input name="fourthInstruction" id="fourthInstruction" type="text"
                                                    class="form-control styled-input" value="{{$favorite->fourth_instruction}}" disabled>
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
                                        <h5 class="fw-bold">نسب المفضلات</h5>

                                        <div class="col-md-12 text-center">
                                            <div class="SS-btn my-3 d-flex">
                                                <a
                                                    style="background-color: #58b8c2;padding-top:20px; font-weight: 900; font-size: 18px;">
                                                    المفضل
                                                </a>
                                                <a style="padding-top:20px" class="percent mx-2">
                                                    {{ @$favorite->frist_name ?? 'المفضل' }}
                                                </a>
                                                <a style="padding-top:20px" class="percent mx-2">
                                                    {{ @$favorite->second_name ?? 'المفضل' }}
                                                </a>
                                                <a style="padding-top:20px" class="percent mx-2">
                                                    {{ @$favorite->third_name ?? 'المفضل' }}
                                                </a>
                                                <a style="padding-top:20px" class="percent mx-2">
                                                    {{ @$favorite->fourth_name ?? 'المفضل' }}
                                                </a>
                                                <a style="padding-top:20px" class="percent mx-2">
                                                    {{ @$favorite->fifth_name ?? 'المفضل' }}
                                                </a>
                                                <a style="padding-top:20px" class="percent mx-2">
                                                    {{ @$favorite->sixth_name ?? 'المفضل' }}
                                                </a>
                                            </div>

                                            <div style="font-weight: 1000; font-size: 20px;" class="SS-btn d-flex">
                                                <a
                                                    style="background-color: #58b8c2;padding-top:20px; font-weight: 900; font-size: 18px;">
                                                    النسبة %
                                                </a>
                                                <a style="padding-top:20px" class="percent mx-2">
                                                    {{ @$favorite->frist_percentage }}
                                                </a>
                                                <a style="padding-top:20px" class="percent mx-2">
                                                    {{ @$favorite->second_percentage }}
                                                </a>
                                                <a style="padding-top:20px" class="percent mx-2">
                                                    {{ @$favorite->third_percentage }}
                                                </a>
                                                <a style="padding-top:20px" class="percent mx-2">
                                                    {{ @$favorite->fourth_percentage }}
                                                </a>
                                                <a style="padding-top:20px" class="percent mx-2">
                                                    {{ @$favorite->fifth_percentage }}
                                                </a>
                                                <a style="padding-top:20px" class="percent mx-2">
                                                    {{ @$favorite->sixth_percentage }}
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
                                    <span style="color: #C4C4C4;font-size: 15px">أضغط على زر أضافة مفضلة الاضافة المفضبة
                                        الاولى</span>
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

            <script src="{{ asset('dist/front/assets/js/bootstrap.bundle.min.js') }}"></script>
            <script src="{{ asset('dist/front/assets/js/jquery-3.6.3.js') }}"></script>
            <script src="{{ asset('dist/front/assets/js/app.js') }}"></script>
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            <script src="{{ asset('vendor\realrashid\sweet-alert\resources\js\sweetalert.all.js') }}"></script>

            <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

            <script>
                const ctx = document.getElementById('myChart').getContext('2d');

                const percentages = [];

                const myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: [
                            "{{ @$favorite->sixth_name ?? 'المفضل السادسة' }}",
                            "{{ @$favorite->fifth_name ?? 'المفضل الخامسة' }}",
                            "{{ @$favorite->fourth_name ?? 'المفضل الرابعة' }}",
                            "{{ @$favorite->third_name ?? 'المفضل الثالثة' }}",
                            "{{ @$favorite->second_name ?? 'المفضل الثانية' }}",
                            "{{ @$favorite->frist_name ?? 'المفضل الاولى' }}"
                        ],
                        datasets: [{
                            label: '', // Remove the title
                            barPercentage: 0.5,
                            barThickness: 200,
                            maxBarThickness: 30,
                            minBarLength: 0,
                            data: [
                                {{ @$favorite->sixth_percentage ?? '0' }},
                                {{ @$favorite->fifth_percentage ?? '0' }},
                                {{ @$favorite->fourth_percentage ?? '0' }},
                                {{ @$favorite->third_percentage ?? '0' }},
                                {{ @$favorite->second_percentage ?? '0' }},
                                {{ @$favorite->frist_percentage ?? '0' }},
                                50, 60, 70, 80, 90, 100
                            ],
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
                            },
                            legend: {
                                display: false // إزالة عرض موديل الألوان
                            }
                        }
                    }
                });

                let closeBtns = document.querySelectorAll(".btn-close");
                let cancelButtons = document.querySelectorAll(".btn-cancel");
                // Start Accomplished Plan Model
                let editItem = document.querySelector('.editItem');
                let editModel = document.querySelector(".edit-model");

                editItem.addEventListener('click', function() {

                    let id = $('#favorite').data('id');
                    let createDate = $('#favorite').data('date');
                    console.log(createDate);
                    $('#favoriteId').val(id);
                    $('#favoriteDate').val(createDate);

                    editModel.style.display = "block";
                });
                // End Accomplished Plan Model
                window.onclick = function(event) {
                    if (Array.from(cancelButtons).includes(event.target) || Array.from(closeBtns).includes(event.target)) {

                        $('#favoriteId').val('');
                        $('#favoriteDate').val('');
                        editModel.style.display = "none";
                    }
                };
            </script>

            @include('sweetalert::alert')
            @include('sweetalert::validation-alert')
        </body>

        </html>
