<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>وصل | تقييم ABLLS</title>
    <link rel="shortcut icon" type="image/svg" href="{{ asset('dist/front/assets/images/headerlogo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/albs.css') }}" />
    <style>
        .btn:hover {
            border: 2px solid #834e9a;
            color: #834e9a;
            background-color: #fff;
        }

        .btn {
            padding: 12px 24px;
            background: #834e9a;
            background-color: rgb(131, 78, 154);
            border-radius: 8px;
            color: #fff;
            transition: 0.5 s ease-in-out;

        }

        textarea {
            background: rgba(0, 0, 0, 0.02);
            border: 1px solid rgba(0, 0, 0, 0.06);
            border-radius: 8px;
            padding: 25px;
            margin: 25px 0px;
            width: 100%;
            min-height: 300px;
            outline: none;
        }
    </style>
</head>

<body class="patiant-file">
    <!--header-->
    @include('front.parts_auth.nav')

    <!--Nav-->
    <nav aria-label="breadcrumb mt-5 mb-5">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('welcome') }}">الرئيسية </a></li>
                <li class="breadcrumb-item"><a href="{{ route('kids.index') }}">
                        <i class="fa-solid fa-chevron-left"></i>ملفات
                        المرضي
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
                <li class="breadcrumb-item" aria-current="page">
                    <a href="{{ route('kids.evaluate.appeals.vertical-draw', $kid->id) }}">
                        <i class="fa-solid fa-chevron-left"></i>
                        الرسم العمودي للتقييم
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fa-solid fa-chevron-left"></i>
                    تقيم ABLLS
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
                        <h3> تقييم ABLLS</h3>
                    </div>
                </div>

                <div class="col-md-6 d-flex align-items-center justify-content-md-end justify-content-start">
                    <button type="submit" class="border-0 edit-file mt-md-4 mb-md-4 mb-3 mt-2 me-3">
                        <a href="{{ route('kids.evaluate.appeals.vertical-draw', $kid->id) }}" target="_blank">
                            <img src="{{ asset('dist/front/assets/images/paint.png') }}" alt="">الرسم العمودي
                            للتقييم
                        </a>
                    </button>
                </div>

                <div class="col-12">
                    <div class="tab-form">
                        <div class="dates row" style="border-radius: 8px;overflow: hidden;">
                            @foreach ($sessions as $key => $val)
                                @if ($loop->last)
                                    <div class="date col-lg-2 col-md-3 col-6 text-center"
                                        style="background-color: {{ $val->session->hex }};">
                                        <div class="close" data-id="{{ $val->session->id }}"
                                            style="top:0 !important;">
                                            <i class="fa-solid fa-xmark"></i>
                                        </div>
                                        <h9 class="sessions-date " data-id="{{ $val->session->id }}"
                                            style="cursor: pointer;font-size: 15px;">
                                            <span> تقييم بتاريخ</span>
                                            {{ date('Y/m/d', strtotime($val->created_at)) }}
                                        </h9>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <form action="{{ route('kids.evaluate.appeals.store', $kid->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="scroller-tab">
                                <div class="left" style="width: 50px !important;">
                                    <i class="fa-solid fa-arrow-left"></i>
                                </div>
                                <div class="right" style="width: 50px !important;">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </div>
                                <ul class="nav nav-tabs ablis-tabs" role="tablist"
                                    style="width: calc(100% - 100px); margin: auto;align-items:center;">
                                    <input type="hidden" name="Session" value="{{ $userSessions->Session->id }}">
                                    @foreach ($userSessions->Appsessions as $key => $val)
                                        @if ($val->Appale->id != 26)
                                            <li class="nav-item">
                                                <a class="nav-link {{ $val->Appale->name == 'A' ? 'active' : '' }}"
                                                    data-bs-toggle="tab"
                                                    href="#{{ $val->Appale->name }}">{{ $val->Appale->name }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Tab panes -->
                            <div class="tab-content mt-5">
                                @foreach ($userSessions->Appsessions as $key => $val)
                                    <div id="{{ $val->Appale->name }}"
                                        class="container tab-pane {{ $val->Appale->name == 'A' ? 'active' : 'fade' }} tab-pane-ablis">
                                        <br />

                                        <div class="ablis-title">
                                            <h3> ({{ $val->Appale->name }}) التعاون وفعالية المعزز</h3>
                                        </div>

                                        <div class="ablis-content-wrapper">
                                            @foreach ($val->Anssessions as $kee => $num)
                                                <input type="hidden" name="ques[{{ $num->Appale_Nums->id }}]"
                                                    value="{{ $num->Appale_Nums->id }}">

                                                <input type="hidden" name="ans[{{ $num->Appale_Nums->id }}]">

                                                <div class="ablis-content">
                                                    <div class="ablis-question">
                                                        <div class="letter-ques">
                                                            <P>{{ $num->Appale_Nums->name }}</P>
                                                        </div>
                                                        <div class="question">
                                                            <p>{{ $num->Appale_Nums->quest }}</p>
                                                        </div>

                                                        <div class="c-rating-wrapper numbers-ques">

                                                            @foreach ($num->Appale_Nums->Appale_Ques as $ke => $quest)
                                                                @if ($num->ans_old_id != null)
                                                                    @if ($num->ans_old_id >= $quest->id)
                                                                        <!-- have a color yet -->
                                                                        <span class="stars"
                                                                            style="display: {{ $num->ans_old_id > $quest->id ? 'block' : 'block' }} !important;background-color: teal;"
                                                                            data-quest="{{ $num->Appale_Nums->id }}"
                                                                            data-count="{{ $loop->iteration }}"
                                                                            data-id="{{ $quest->id }}">{{ $ke + 1 }}
                                                                        </span>
                                                                    @else
                                                                        <!-- not have a color but before this have have a color yet -->
                                                                        <span class="star"
                                                                            style="display: {{ $num->ans_id > $quest->id ? 'block' : 'block' }} !important;background-color: {{ $num->ans_id >= $quest->id ? $userSessions->Session->hex : '' }};"
                                                                            data-count="{{ $loop->iteration }}"
                                                                            data-quest="{{ $num->Appale_Nums->id }}"
                                                                            data-id="{{ $quest->id }}">{{ $ke + 1 }}
                                                                        </span>
                                                                    @endif
                                                                @else
                                                                    <!-- No span have a color yet -->
                                                                    <span class="star"
                                                                        style="background-color: {{ $num->ans_id >= $quest->id ? $userSessions->Session->hex : '' }};"
                                                                        data-quest="{{ $num->Appale_Nums->id }}"
                                                                        data-count="{{ $loop->iteration }}"
                                                                        data-id="{{ $quest->id }}">{{ $ke + 1 }}
                                                                    </span>
                                                                @endif
                                                            @endforeach
                                                        </div>

                                                        <div class="toggle-ques">
                                                            <img src="{{ asset('dist/front/assets/images/arrow.png') }}"
                                                                class="toggle-img" alt="">
                                                        </div>
                                                    </div>

                                                    <div class="ablis-answer">
                                                        @foreach ($num->Appale_Nums->Appale_Ques as $ke => $quest)
                                                            <div class="answer">
                                                                <div class="ans-num">
                                                                    <p>{{ $ke + 1 }}</p>
                                                                </div>
                                                                <div class="answer-text">
                                                                    <p>{{ $quest->name }}</p>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="" style="position:relative;">
                                            <h4 class="font-weight-bold">الملاحظات :</h4>
                                            <textarea id="placeholder-teaxtarea" name="desc[{{ $val->Appale->id }}]" class="textarea">{{ $val->desc }}</textarea>
                                        </div>

                                        <textarea class="hiddenEvaluationReport" name="hiddenEvaluationReport" style="display: none;"></textarea>
                                    </div>
                                @endforeach

                                <div class="p-3">
                                    <div class="bg-white rounded-4 p-3">
                                        <h4 class="fw-medium">تقرير التقييم:</h4>
                                        <textarea class="p-3 rounded-3 w-100 mh-100" id="evaluationReport" name="evaluationReport"
                                            placeholder="التقرير العام"></textarea>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn mt-5 w-50 m-auto">حفظ</button>
                                </div>
                            </div>
                        </form>
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
    <script src="{{ asset('vendor\realrashid\sweet-alert\resources\js\sweetalert.all.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#evaluationReport').on('input', function() {
                $('.hiddenEvaluationReport').val($(this).val());
            });
        });

        $('.toggle-ques').on('click', function() {

            $(this).toggleClass("up");
            $(this).parent().parent().children('.ablis-answer').toggle();
        });

        let numbersQues = document.querySelectorAll(".numbers-ques");

        numbersQues.forEach((numberQues) => {

            numberQues.addEventListener("onmouseover", function() {
                // console.log(numberQues);
            })
        })
    </script>

    <script>
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
    </script>

    <script>
        let numbersques = document.querySelectorAll(".numbers-ques");

        for (let i = 0; i < numbersques.length; i++) {

            for (let j = 0; j < numbersques[i].length; j++) {

                console.log(numbersques[i][j].childNodes);
            }
        }

        $('.star').on('click', function() {
            var id = $(this).data('id');
            var quest = $(this).data('quest');

            $(`input[name='ans[${quest}]']`).val(id);

            // Get the data-id of the clicked element
            var clickedId = $(this).data('id');

            $(this).siblings('.star').each(function() {
                var siblingId = $(this).data('id');

                if (siblingId < clickedId) {
                    $(this).css("background-color", "{{ $userSessions->Session->hex }}");
                } else {
                    // Reset the background color for siblings with greater or equal data-id values
                    $(this).css("background-color", "initial");
                }
            });

            // Change the background color of the clicked element
            $(this).css("background-color", "{{ $userSessions->Session->hex }}");
        });
        // Get all elements with class "close" 

        // Destroy session
        $(".close").click(function() {
            let id = $(this).data("id");
            $.ajax({
                url: "{{ route('kids.evaluate.appeals.destroy') }}",
                type: 'post',
                data: {
                    _token: '{{ csrf_token() }}',
                    "session_id": id,
                    "id": '{{ $kid->id }}',
                },
                success: function() {
                    const closeButtons = document.querySelectorAll('.close');
                    // Add click event listener to each close button
                    closeButtons.forEach(closeButton => {
                        closeButton.addEventListener('click', function() {
                            // Get the parent element with class "date"
                            const dateElement = this.closest('.date');
                            // Remove the parent element if found
                            if (dateElement) {
                                dateElement.remove();
                            }
                        });
                        window.location.href =
                            "{{ route('kids.evaluate.appeals.create', $kid->id) }}"
                    });
                }
            });
        });
    </script>

    @include('sweetalert::alert')
    @include('sweetalert::validation-alert')
</body>

</html>
