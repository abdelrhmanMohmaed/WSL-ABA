<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>وصل | أضافة هدف من تقسم ال ABLLS</title>
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

        .createModel {
            display: none;
            position: fixed;
            background-color: rgba(0, 0, 0, 0.495);
            inset: 0;
            z-index: 9;
        }

        .createModel form {
            transform: scale(.8);
        }

        .model-body form .form-group label {
            text-align: right;
        }

        .btn-new-target {
            background: #834E9A;
            transition: 0.5s ease-in-out;
        }

        .btn-new-target:hover {
            color: black !important;
        }

        .btn-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
        }

        .dashboard-title h5 {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
</head>

<body class="patiant-file">

    @include('front.parts_auth.nav')
    <!-- Create Form Html -->
    @include('kids::front.kids.treatment-plans.partials.modals.create.create')
    <!-- Create Form Html -->

    <nav aria-label="breadcrumb mt-5 mb-5">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('welcome') }}">الرئيسية </a></li>
                <li class="breadcrumb-item"><a href="{{ route('kids.index') }}"><i
                            class="fa-solid fa-chevron-left"></i>ملفات
                        المرضي </a></li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="{{ route('kids.show', $kid->id) }}"><i class="fa-solid fa-chevron-"></i>
                        {{ $kid->name }}
                    </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="{{ route('kids.treatment-plans.index', $kid->id) }}"><i
                            class="fa-solid fa-chevron-left"></i>
                        الخطط العلاجية و الجلسات
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fa-solid fa-chevron-left"></i>
                    أضافة هدف من تقسم ال ABLLS
                </li>
            </ol>
        </div>
    </nav>

    <div class="wrapper">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="form-title mt-4 mb-4 ">
                        <img src="{{ asset('dist/front/assets/images/paint.png') }}" />
                        <h3> الرسم العمودى لتقيم ABLLS</h3>
                    </div>
                </div>
            </div>
            <div class="dates row" style="border-radius: 8px;overflow: hidden;">
                @foreach ($sessions as $key => $val)
                    <div class="date col-lg-2 col-md-3 col-6 text-center"
                        style="background-color: {{ $val->session->hex }};">

                        <h9>
                            <span> تقييم بتاريخ</span> {{ date('Y/m/d', strtotime($val->created_at)) }}
                        </h9>
                    </div>
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
                                        foreach ($letr->Appale_Nums as $value) {
                                            $total_boxes += count($value->Appale_Ques);
                                        }

                                        $num_items = count($letr->Appale_Nums);
                                        $num_columns = 3;
                                        $items_per_column = ceil($num_items / $num_columns);
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
                                                        $span_colors = array_fill(0, $num_boxes, '#FFFFFF');

                                                        foreach ($value->Appale_Ques as $index => $question) {
                                                            $currentColor = '#FFFFFF';
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

                                                                            for ($k = $index - 1; $k >= 0; $k--) {
                                                                                if ($span_colors[$k] == '#FFFFFF') {
                                                                                    $span_colors[$k] = $currentColor;
                                                                                } else {
                                                                                    break;
                                                                                }
                                                                            }
                                                                        }
                                                                        break;
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    @endphp

                                                    <div class="d-flex justify-content-around">
                                                        <div class="question-element"
                                                            style="position: relative; width: 54.07px; text-align: right">
                                                            <p>
                                                                <img data-name="{{ $value->name }}"
                                                                    data-id="{{ $value->id }}" class="storeBtn"
                                                                    height="20px" width="20px"
                                                                    src="{{ asset('dist/front/assets/images/Plus_Add.png') }}"
                                                                    alt="" />
                                                                {{ $value->name }}
                                                            </p>
                                                            <div class="letter-question">
                                                                <p>{{ $value->quest }}</p>
                                                            </div>
                                                        </div>

                                                        <div class="graph" style="width: 50%;">
                                                            <div class="garph-color"
                                                                style="--num-boxes: {{ $num_boxes }};">
                                                                @foreach ($value->Appale_Ques as $index => $question)
                                                                    @php
                                                                        $currentColor = $span_colors[$index];
                                                                    @endphp
                                                                    <span class="line"
                                                                        style="width: {{ $box_width }}%; background-color: {{ $currentColor }};">
                                                                        <div class="line-0"></div>
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

        $(document).ready(function() {
            let questionElement = $(".question-element");
            let originalImageSrc = questionElement.find("img").attr("src");
            questionElement.hover(function() {

                $(this).children(".letter-question").toggle();
                $(this).find("img").attr("src", "{{ asset('dist/front/assets/images/Plus, Add.png') }}");
            }, function() {

                $(this).children(".letter-question").toggle();
                $(this).find("img").attr("src", originalImageSrc);
            });
        });
        // End left and right

        // Start display a session and character to graph
        $(document).on('click', ".sessions-date", function() {
            let id = $(this).data('id');
            let link = "{{ url()->current() }}" + "?app=" + id
            window.location.href = link
        });


        // Start Create Model
        let closeBtns = document.querySelectorAll(".btn-close");
        let cancelButtons = document.querySelectorAll(".btn-cancel");

        let storeBtn = document.querySelectorAll(".storeBtn");
        let createModel = document.querySelector(".createModel");
        storeBtn.forEach(function(createItem) {
            createItem.addEventListener('click', function() {
                let id = $(this).data('id');
                let name = $(this).data('name');
                console.log(id, name);

                $('#titleModel').text('المهمة ' + name)
                $('#appeal').val(id)

                createModel.style.display = "block";
            });
        });

        window.onclick = function(event) {

            if (Array.from(cancelButtons).includes(event.target) || Array.from(closeBtns).includes(event.target)) {

                $('.target').val('')
                $('.goal').val('')

                createModel.style.display = "none";
            }
        }
    </script>
</body>

</html>
