<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>ABLLA وصل | الرسم العمودي لتقييم </title>
    <link rel="shortcut icon" type="image/svg" href="{{asset('dist/front/assets/images/headerlogo.png')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="a0nymous" referrerpolicy="0-referrer"/>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/albss.css') }}"/>
    <style>
        .garph-color span:first-child {
            left: 0%;
        }

        .garph-color span:nth-child(2) {
            right: 25%;
        }

        .garph-color span:nth-child(3) {
            right: 50%;
        }

        .garph-color span:nth-child(4) {
              right:  75%;
        }

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
    </style>
</head>

<body class="patiant-file">


@include('front.parts_auth.nav')

<!--nav-->
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
                <a href="{{route('kids.treatment-plans.index',$kid->id)}}"><i class="fa-solid fa-chevron-left"></i>
                    الخطط العلاجية و الجلسات
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <a><i class="fa-solid fa-chevron-left"></i>
                    الرسم العمودى لتقيم ABLLS
                </a>
            </li>
        </ol>
    </div>
</nav>
<!--nav-->

<!-- Create Form Html -->
@include('kids::front.kids.treatment-plans.partials.modals.create.create')
<!-- Create Form Html -->

<div class="wrapper">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-md-6">
                <div class="form-title mt-4 mb-4 ">
                    <img src="{{asset('dist/front/assets/images/Business, Chart.png')}}"/>
                    <h3> الرسم العمودى لتقيم ABLLSS</h3>
                </div>
            </div>

            {{--            <div class="col-md-6 d-flex align-items-center justify-content-md-end justify-content-start ">--}}
            {{--                <button class="border-0 edit-file mt-md-4 mb-md-4 mb-3 mt-2">--}}
            {{--                    <a href="{{ route('kids.treatment-plans.show', $kid->id) }}" class="add-new-appeals">--}}
            {{--                        <img src="{{asset('dist/front/assets/images/Business, Chart.png')}}" alt="">--}}
            {{--                        عرض الكل--}}
            {{--                    </a>--}}
            {{--                </button>--}}
        </div>


        <div class="col-12">
            <div class="tab-form">
                <!-- Start Display all sections -->
                <div class="dates row" style="border-radius: 8px;overflow: hidden;">
                    @foreach ($sessions as $item)
                        <div class="date col-lg-2 col-md-3 col-6 text-center"
                             style="background-color: {{$item->session->hex}};">
                            <h9
                                {{--class="session-date"--}}
                                data-id="{{$item->session->id}}"
                                style="cursor: pointer;font-size: 15px;">
                                <span> تقييم بتاريخ</span>
                                {{date('Y/m/d', strtotime($item->created_at))}}
                            </h9>
                        </div>
                    @endforeach
                </div>
                <!-- End Display all sections -->
  
                <div class="scroller-tab">
                    <div class="left" style="width: 50px !important;"><i class="fa-solid fa-arrow-left"></i></div>
                    <div class="right" style="width: 50px !important;" ><i class="fa-solid fa-arrow-right"></i></div>
                    <ul class="nav nav-tabs ablis-tabs" role="tablist" style="width: calc(100% - 100px); margin: auto;align-items:center;">
                        @foreach ($apps as $key => $val)
                            <li class="nav-item sessions-date" data-id="{{ $val->id }}">
                                <a class="nav-link {{ $val->name == $letr->name ? 'active' : '' }}"
                                   data-bs-toggle="tab"
                                   href="{{ url()->current() . "?app_Id=". $val->id}}">{{ $val->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="tab-content mt-5">
                    <div id="A" class="container tab-pane active tab-pane-ablis">
                        <br/>
                        <div style="height: 1250px!important;" class="letter-container">
                            <div class="B letterHover py-5">
                                <div class="letter-title text-center">
                                    <h3>({{$letr->name}}) التعاون وفعالية المعزز</h3>
                                </div>

                                <!--<div class="letter-graph d-flex mt-5 me-5">-->
                                <!--    <div style="width: 5%" ></div>-->
                                <!--    <div class="letter" style="width:80%; text-align: center; height: 0px!important;">-->

                                <!--        <div style="width: 52%; font-weight: bolder" class="d-flex flex-row bd-highlight letter-graph me-2">-->
                                <!--            <div style="width: 37%;" class="pe-5  bd-highlight">1</div>-->
                                <!--            <div style="width: 37%;" class="pe-5 bd-highlight">2</div>-->
                                <!--            <div style="width: 35%;" class="pe-5 bd-highlight">3</div>-->
                                <!--            <div style="width: 29%;" class="pe-5 bd-highlight">4</div>-->
                                <!--        </div>-->
                                <!--    </div>-->

                                <!--    <div class="letter" style="width:80%;padding-right: 60px; text-align: center; height: 0px!important;">-->

                                <!--        <div style="width: 55%; font-weight: bolder" class="d-flex flex-row bd-highlight letter-graph me-2">-->
                                <!--            <div style="width: 35%;" class="me-5  bd-highlight">1</div>-->
                                <!--            <div style="width: 35%;" class="me-5 bd-highlight">2</div>-->
                                <!--            <div style="width: 35%;" class="me-5 bd-highlight">3</div>-->
                                <!--            <div style="width: 25%;" class="me-5 bd-highlight">4</div>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</div>-->
                                <div class="letter-graph d-flex mt-5">
                                    <div class="letter" style="height:1100px;width:100%; text-align: center;">

                                        @foreach ($letr->Appale_Nums as $value)
                                            <div class="d-flex justify-content-around">
                                                <div class="question-element" style="position: relative; width:60px !important;">
                                                    <p>
                                                        <img
                                                            data-name="{{$value->name}}" data-id="{{$value->id}}"
                                                            class="editDate" height="20px" width="20px"
                                                            src="{{asset('dist/front/assets/images/Plus_Add.png')}}"
                                                            alt=""/>
                                                        {{$value->name}}
                                                    </p>

                                                    <div
                                                        style="top:30px!important;right:5px!important;min-width: 300px!important;"
                                                        class="letter-question">
                                                        <p>{{$value->quest}}</p>
                                                    </div>

                                                </div>
                                                <div class="graph" style="width: 80%;">
                                                    @php
                                                        $span1 = '#fff';
                                                        $span2 = '#fff';
                                                        $span3 = '#fff';
                                                        $span4 = '#fff';
                                                        $count = 0;
                                                    @endphp

                                                    @foreach ($nums as $ke => $val)
                                                        @foreach ($val->Anssessions as $key => $vall)
                                                            @if ($vall->ques_id == $value->id)
                                                                @if ($vall->ans_id !== null)
                                                                    @php
                                                                        $count ++;
                                                                    @endphp
                                                                    @if ($count == 1)
                                                                        @php
                                                                            $span1 = $vall->Usersessions->Session->hex;
                                                                        @endphp
                                                                    @endif
                                                                    @if ($count == 2)
                                                                        @php
                                                                            $span2 = $vall->Usersessions->Session->hex;
                                                                        @endphp
                                                                    @endif
                                                                    @if ($count == 3)
                                                                        @php
                                                                            $span3 = $vall->Usersessions->Session->hex;
                                                                        @endphp
                                                                    @endif
                                                                    @if ($count == 4)
                                                                        @php
                                                                            $span4 = $vall->Usersessions->Session->hex;
                                                                            $count == 0;
                                                                        @endphp
                                                                    @endif
                                                                    <div class="garph-color">
                                                                        <span class="line"
                                                                              style="background-color: {{$span4}};">
                                                                            <div class="line-0"></div>
                                                                        </span>
                                                                        <span class="line"
                                                                              style="background-color: {{$span2}};">
                                                                            <div class="line-0"></div>
                                                                        </span>
                                                                        <span class="line"
                                                                              style="background-color: {{$span3}};">
                                                                            <div class="line-0"></div>
                                                                        </span>
                                                                        <span class="line"
                                                                              style="background-color: {{$span1}};">
                                                                            <div class="line-0"></div>
                                                                        </span>
                                                                    </div>
                                                                    @else
                                                                    <div class="garph-color">
                                                                        <span class="line"
                                                                              style="background-color: {{$span4}};">
                                                                            <div class="line-0"></div>
                                                                        </span>
                                                                        <span class="line"
                                                                              style="background-color: {{$span2}};">
                                                                            <div class="line-0"></div>
                                                                        </span>
                                                                        <span class="line"
                                                                              style="background-color: {{$span3}};">
                                                                            <div class="line-0"></div>
                                                                        </span>
                                                                        <span class="line"
                                                                              style="background-color: {{$span1}};">
                                                                            <div class="line-0"></div>
                                                                        </span>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<!--footer-->
@include('front.parts.footer')
<!--footer-->
<script src="{{ asset('dist/front/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dist/front/assets/js/jquery-3.6.3.js') }}"></script>
<script src="{{ asset('dist/front/assets/js/app.js') }}"></script>

<script>
    // Start left and right
    let left = document.querySelector(".left");
    let right = document.querySelector(".right");
    let tabsList = document.querySelector(".ablis-tabs");

    let manageIcons = () => {
        if (tabsList.scrollLeft <= 20) {
            left.style.display = "flex";
        } else {
            left.style.display = "none";
        }
        let maxScrollValue = tabsList.scrollWidth - tabsList.clientWidth - 20;

        if (tabsList.scrollLeft <= maxScrollValue) {

            right.style.display = "flex";
        } else {

            right.style.display = "none";
        }
    }
    left.addEventListener("click", () => {

        tabsList.scrollLeft -= 200;
        manageIcons();
    })
    right.addEventListener("click", () => {

        tabsList.scrollLeft += 200;
        manageIcons();
    })
    tabsList.addEventListener("scroll", manageIcons)

    $(document).ready(function () {
        let questionElement = $(".question-element");
        let originalImageSrc = questionElement.find("img").attr("src");
        questionElement.hover(function () {

                $(this).children(".letter-question").toggle();
                $(this).find("img").attr("src", "{{asset('dist/front/assets/images/Plus, Add.png')}}");
            }, function () {

                $(this).children(".letter-question").toggle();
                $(this).find("img").attr("src", originalImageSrc);
            }
        );
    });
    // End left and right

    // Start display a session and character to graph
    $(document).on('click', ".session-date", function () {

        let id = $(this).data('id');
        window.location.href = "{{route('kids.treatment-plans.show',$kid->id)}}" + '/' + id
    });

    $(document).on('click', ".sessions-date", function () {
        let id = $(this).data('id');
        let link = "{{ url()->current() }}" + "?app=" + id
        window.location.href = link
    });

    // end display a session and character to graph
    let editDateList = document.querySelectorAll('.editDate');
    let fixedForm = document.querySelector(".fixed-form");
    let fixedFormRow = document.querySelector('.register-form .container .row');

    editDateList.forEach(function (editDate) {
        editDate.addEventListener('click', function () {
            let name = $(this).data('name');
            let id = $(this).data('id');

            $('#titleModel').text('المهمة ' + name)
            $('#task').val(id)

            fixedForm.style.display = "block";
        });
    });

    window.onclick = function (event) {
        if (event.target == fixedFormRow) {

            $('#target').val('')
            $('#stimulus').val('')
            $('#task').val('')
            fixedForm.style.display = "none";
        }
    };

</script>
@include('sweetalert::alert')
@include('sweetalert::validation-alert')
</body>

</html>
