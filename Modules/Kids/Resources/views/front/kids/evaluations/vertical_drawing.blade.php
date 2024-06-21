<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>وصل | الرسم العمودي للتقييم </title>
    <link rel="shortcut icon" type="image/svg" href="{{ asset('dist/front/assets/images/headerlogo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="a0nymous" referrerpolicy="0-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/albss.css') }}" />
    <style>
        .garph-color span:first-child {
            left: 0;
        }

        .garph-color span:nth-child(1) {
            right: 0%;
        }

        .garph-color span:nth-child(2) {
            right: calc(100% - (var(--num-boxes) - 1) * calc(100% / var(--num-boxes)));
        }

        .garph-color span:nth-child(3) {
            right: 50%;
        }

        .garph-color span:nth-child(4) {
            right: 75%;
        }

        .garph-color:not(:last-child) {
            display: none;
        }

        .question-element p {
            margin-bottom: 0;
        }

        .garph-color span {
            border: 0.1px solid rgb(0, 0, 0);
            width: calc(100% / var(--num-boxes));
            display: inline-block;
            text-align: center;
            background-color: #ffffff;
            flex: 1;
            padding: 5px;
            height: 40px;
        }

        .letter-questions {
            position: absolute;
            top: 30px;
            right: 5px;
            background: #F2F2F2;
            width: 180px;
            border-radius: 8px;
            display: none;
            cursor: pointer;
            z-index: 10;
        }

        .letter-questions p {
            margin-bottom: 0px !important;
            cursor: pointer;
            font-size: 14px;
        }
    </style>
</head>

<body class="patiant-file">

    @include('front.parts_auth.nav')

    <!--breadcrumb-->
    <nav aria-label="breadcrumb mt-5 mb-5">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('welcome') }}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ route('kids.index') }}">
                        <i class="fa-solid fa-chevron-left"></i>ملفات المرضي
                    </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="{{ route('kids.show', $kid->id) }}">
                        <i class="fa-solid fa-chevron-left"></i>
                        {{ $kid->name }}
                    </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="{{ route('kids.evaluation', $kid->id) }}">
                        <i class="fa-solid fa-chevron-left"></i>
                        تقيم المريض
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fa-solid fa-chevron-left"></i>
                    الرسم العمودي للتقييم
                </li>
            </ol>
        </div>
    </nav>

    <div class="wrapper">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="form-title mt-4 mb-4 ">
                        <img src="{{ asset('dist/front/assets/images/statistical-graphic.png') }}" />
                        <h3>الرسم العمودى للتقيم</h3>
                    </div>
                </div>

                <div class="col-md-6 d-flex align-items-center justify-content-md-end justify-content-start ">
                    <button class="add-session border-0 mt-md-4 mb-md-4 mb-3 mt-2">
                        <a class="text-dark fw-bold d-inline-block py-3 px-4 text-center rounded-3 text-decoration-none"
                            href="{{ route('kids.evaluate.appeals.create', $kid->id) }}?session={{ $countSession + 1 }}"
                            target="_blank" style="background: #58b8c2">
                            <img src="{{ asset('dist/front/assets/images/plus.png') }}" alt="" width="22"
                                height="22">
                            إضافة تقييم جديد
                        </a>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="wrapper">
        <div class="container">

            <div class="dates row" style="border-radius: 8px;overflow: hidden;">
                @foreach ($sessions as $key => $val)
                    <a href="{{ route('kids.evaluate.appeals.report', ['kid' => $kid->id, 'userSession' => $val->id]) }}"
                        class="date col-lg-2 col-md-3 col-6 text-center text-dark text-decoration-none"
                        style="background-color: {{ $val->session->hex }};">

                        <h9>
                            <span> تقييم بتاريخ</span> {{ date('Y/m/d', strtotime($val->created_at)) }}
                        </h9>
                    </a>
                @endforeach
            </div>

            <div class="scroller-tab">
                <div class="left" style="width: 50px !important;"><i class="fa-solid fa-arrow-left"></i></div>
                <div class="right" style="width: 50px !important;"><i class="fa-solid fa-arrow-right"></i>
                </div>
                <ul class="nav nav-tabs ablis-tabs" role="tablist"
                    style="width: calc(100% - 100px); margin: auto;align-items:center;">
                    @foreach ($apps as $key => $val)
                        @if ($val->id != 26)
                            <li class="nav-item sessions-date" data-id="{{ $val->id }}">
                                <a class="nav-link {{ $val->name == $letr->name ? 'active' : '' }}"
                                    data-bs-toggle="tab"
                                    href="{{ url()->current() . '?app_Id=' . $val->id }}">{{ $val->name }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>

            <div class="row tab-content mt-5">
                <div id="A" class="container tab-pane active tab-pane-ablis">
                    <br />
                    <div class="letter-container">
                        <div class="B letterHover py-5">
                            <div class="letter-title text-center mt-2 mb-5">
                                <h3>({{ $letr->name }}) التعاون وفعالية المعزز</h3>
                            </div>

                            <div class="letter-graph">
                                <div class="letter mb-5" style="height: auto;">
                                    @php
                                        $total_boxes = 0;
                                        // حساب العدد الإجمالي للمربعات
                                        foreach ($letr->Appale_Nums as $value) {
                                            $total_boxes += count($value->Appale_Ques);
                                        }

                                        $num_items = count($letr->Appale_Nums);
                                        $num_columns = 3; // تحديد عدد الأعمدة لكل صف
                                        $items_per_column = ceil($num_items / $num_columns); // حساب عدد العناصر لكل عمود
                                    @endphp

                                    <div class="row">
                                        @for ($column = 0; $column < $num_columns; $column++)
                                            <div class="col-md-4">
                                                @php
                                                    $start = $column * $items_per_column;
                                                    $end = min($start + $items_per_column, $num_items);
                                                @endphp

                                                @for ($item = $start; $item < $end; $item++)
                                                    @php
                                                        $value = $letr->Appale_Nums[$item];
                                                        $num_boxes = count($value->Appale_Ques);
                                                        $box_width = 100 / $num_boxes;
                                                        $span_colors = array_fill(0, $num_boxes, '#FFFFFF'); // الافتراضي لون الخلفية أبيض

                                                        // تحديث الألوان بناءً على الإجابات الموجودة
                                                        foreach ($value->Appale_Ques as $index => $question) {
                                                            $currentColor = '#FFFFFF'; // اللون الافتراضي
                                                            foreach ($nums as $ke => $val) {
                                                                foreach ($val->Anssessions as $key => $vall) {
                                                                    if (
                                                                        $vall->ques_id == $value->id &&
                                                                        $vall->ans_id == $question->id
                                                                    ) {
                                                                        if ($span_colors[$index] == '#FFFFFF') {
                                                                            $currentColor =
                                                                                $vall->Usersessions->Session->hex;
                                                                            $span_colors[$index] = $currentColor;

                                                                            // تحديث الألوان للأسئلة السابقة أيضًا إذا كانت لا تحتوي على لون
                                                                            for ($k = $index - 1; $k >= 0; $k--) {
                                                                                if ($span_colors[$k] == '#FFFFFF') {
                                                                                    $span_colors[$k] = $currentColor;
                                                                                } else {
                                                                                    break; // انقطاع التحديث إذا وجد لون سابق
                                                                                }
                                                                            }
                                                                        }
                                                                        break; // انقطاع التحقق بعد العثور على إجابة
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    @endphp

                                                    <div class="d-flex justify-content-around">
                                                        <div class="question-element"
                                                            style="position: relative; width: 24px !important;">
                                                            <p>{{ $value->name }}</p>
                                                            <div class="letter-question">
                                                                <p>{{ $value->quest }}</p>
                                                            </div>
                                                        </div>

                                                        <div class="graph" style="width: 50%;">
                                                            <div class="garph-color"
                                                                style="--num-boxes: {{ $num_boxes }};">
                                                                @foreach ($value->Appale_Ques as $index => $question)
                                                                    @php
                                                                        // تحقق مما إذا كان السؤال تم تلوينه بالفعل
                                                                        $currentColor = $span_colors[$index];
                                                                    @endphp
                                                                    <span class="line question-elements"
                                                                        style="width: {{ $box_width }}%; background-color: {{ $currentColor }};">
                                                                        <div class="line-0"></div>
                                                                        <div class="letter-questions">
                                                                            <p>{{ $question->name }}</p>
                                                                        </div>
                                                                    </span>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endfor
                                            </div>
                                        @endfor
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

    <script type="text/javascript">
        $(".question-element").hover(function() {
            $(this).children(".letter-question").toggle();
        })
        $(".question-elements").hover(function() {
            $(this).children(".letter-questions").toggle();
        })
        $('.toggle-ques').on('click', function() {
            $(this).toggleClass("up");
            $(this).parent().parent().children('.ablis-answer').toggle();
        });

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

        tabsList.addEventListener("scroll", manageIcons);

        $(document).on('click', ".sessions-date", function() {

            let id = $(this).data('id');
            let link = "{{ url()->current() }}" + "?app_Id=" + id
            window.location.href = link
        });
    </script>
</body>

</html>
