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
    </style>
</head>

<body class="patiant-file">

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
                    <a href="{{ route('kids.show', $kid->id) }}"><i class="fa-solid fa-chevron-"></i>
                        {{ $kid->name }}
                    </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="{{ route('kids.evaluation', $kid->id) }}"><i class="fa-solid fa-chevron-left"></i>
                        تقيم المريض
                    </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="{{ route('kids.evaluate.appeals.create', $kid->id) }}"><i
                            class="fa-solid fa-chevron-left"></i>
                        تقيم ABLLS
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
            <div class="dates row" style="border-radius: 8px;overflow: hidden;">
            </div>
            <div class="scroller-tab">
                <div class="left" style="width: 50px !important;"><i class="fa-solid fa-arrow-left"></i></div>
                <div class="right" style="width: 50px !important;"><i class="fa-solid fa-arrow-right"></i></div>
                <ul class="nav nav-tabs ablis-tabs" role="tablist"
                    style="width: calc(100% - 100px); margin: auto;align-items:center;">
                    @foreach ($apps as $key => $val)
                        <li class="nav-item sessions-date" data-id="{{ $val->id }}">
                            <a class="nav-link {{ $val->name == $letr->name ? 'active' : '' }}" data-bs-toggle="tab"
                                href="{{ url()->current() . '?app_Id=' . $val->id }}">{{ $val->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="row tab-content mt-5">
                <div id="A" class="container tab-pane active tab-pane-ablis">
                    <br />
                    <div class="letter-container">
                        <div class="B letterHover pt-5">
                            <div class="letter-title text-center">
                                <h3>({{ $letr->name }}) التعاون وفعالية المعزز</h3>
                            </div>
                            <div class="letter-graph d-flex ">
                                <div class="letter mb-5" style="height: auto;" {{-- style="height: 1100px!important; width:100%; text-align: center;" --}}>
                                    @foreach ($letr->Appale_Nums as $value)
                                        <div class="d-flex justify-content-around">
                                            <div class="question-element"
                                                style="position: relative;width: 24px !important;">
                                                <p>{{ $value->name }}</p>

                                                <div class="letter-question">
                                                    <p>{{ $value->quest }}</p>
                                                </div>

                                            </div>
                                            <div class="graph" style="width: 50%;">
                                                @php
                                                    $num_boxes = count($value->Appale_Ques);
                                                    $box_width = 100 / $num_boxes;
                                                    $count = 0;
                                                    $filled_color = '';
                                                @endphp
                                                {{-- @dd($value) --}}
                                                <div class="garph-color" style="--num-boxes: {{ $num_boxes }};">
                                                    @foreach ($nums as $ke => $val)
                                                        @foreach ($val->Anssessions as $key => $vall)
                                                            @if ($vall->ques_id == $value->id)
                                                                @if ($vall->ans_id !== null)
                                                                    @php
                                                                        $count++;
                                                                        $span = $vall->Usersessions->Session->hex;
                                                                        if ($count == 1) {
                                                                            $filled_color = $span;
                                                                        }
                                                                    @endphp
                                                                    <span class="line"
                                                                        style="background-color: {{ $span }}; width: {{ $box_width }}%;">
                                                                        <div class="line-0"></div>
                                                                        {{-- {{ $vall->ans_old_id }}
                                                                        {{ $value->Appale_Ques }} --}}

                                                                        {{-- {{ count($value->Appale_Ques) }} --}}
                                                                    </span>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                    @for ($i = $count; $i < $num_boxes; $i++)
                                                        <span class="line"
                                                            style="width: {{ $box_width }}%; background-color: #FFFFFF;">
                                                            <div class="line-0"></div>
                                                        </span>
                                                    @endfor
                                                </div>
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

    <!--footer-->
    @include('front.parts.footer')
    <!--footer-->
    <script src="{{ asset('dist/front/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/front/assets/js/jquery-3.6.3.js') }}"></script>
    <script src="{{ asset('dist/front/assets/js/app.js') }}"></script>

    <script>
        $(".question-element").hover(function() {
            $(this).children(".letter-question").toggle();
        })
    </script>
    <script>
        $('.toggle-ques').on('click', function() {
            $(this).toggleClass("up");
            $(this).parent().parent().children('.ablis-answer').toggle();
        });
    </script>
    <script>
        let numbersQues = document.querySelectorAll(".numbers-ques");
        // console.log(numbersQues)
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

        $('.textarea').on('input', function() {
            if ($(this).val().length > 0) {

                $(this).siblings().css("opacity", "0");
            } else {

                $(this).siblings().css("opacity", "1");
            }
        });
        // Get all elements with class "close"
    </script>

    <script type="text/javascript">
        $(document).on('click', ".sessions-date", function() {

            let id = $(this).data('id');
            let link = "{{ url()->current() }}" + "?app_Id=" + id
            window.location.href = link
        });

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
                            "{{ route('kids.evaluate.appeals.create', $kid->id) }} }}"
                    });
                }
            });
        });
    </script>
</body>

</html>
