<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>وصل | أضافة جلسة جديدة</title>
    <link rel="shortcut icon" type="image/svg" href="{{ asset('dist/front/assets/images/headerlogo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/style.css') }}" />

    <style>
        /* Start Form Fields */
        .custom-bg {
            background-color: #F8FCFC;
        }

        .custom-box {
            background: #F3F3F7;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .custom-content {
            background: #F8FCFC;
            border: 1px solid #EDF1F1;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .rounded-start-custom {
            border-radius: 0 8px 8px 0;
        }

        .rounded-end-custom {
            border-radius: 8px 0 0 8px;
        }

        /* Start Form Fields */
        .try-box-title,
        .try-box-title-header {
            background: #F3F3F7;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;

        }

        .try-box-count {
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #EDF1F1;
            border-radius: 8px;
            cursor: pointer;
        }

        .modalActive {
            background-color: rgb(200, 162, 200);
        }

        .custom-textarea {
            background-color: #F3F7F7;
            width: 100%;
            border-radius: 0.375rem;
            border: none;
            padding: 1rem;
            box-sizing: border-box;
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
                <li class="breadcrumb-item active"><a href="{{ route('kids.treatment-plans.goals.index', $kid->id) }}">
                        <i class="fa-solid fa-chevron-left"></i>
                        الأهداف تحت التدريب
                    </a>
                </li>
                <li class="breadcrumb-item active"><a
                        href="{{ route('kids.treatment-plans.goals.sessions.index', [$kid->id, $goal->id]) }}">
                        <i class="fa-solid fa-chevron-left"></i>
                        الجلسات
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><i class="fa-solid fa-chevron-left"></i>
                    أضافة الجلسات
                </li>
            </ol>
        </div>
    </nav>
    <!-- nav -->

    <div class="wrapper">
        <div class="container">
            <form method="POST"
                action="{{ route('kids.treatment-plans.goals.sessions.store', [$kid->id, $goal->id]) }}">
                @csrf

                <div class="row d-flex justify-content-center align-items-center rounded-3 p-3 my-5 custom-bg">
                    <div class="col-12 col-md-12 d-flex flex-wrap align-items-center p-3">
                        <div class="custom-box col-12 col-md-2 rounded-start-custom">
                            <span class="fw-bold fs-5">الهدف</span>
                        </div>
                        <div class="custom-content col-12 col-md-4">
                            <span class="fw-bold fs-6">{{ $goal->target }}</span>
                        </div>
                        <div class="custom-box col-12 col-md-2">
                            <span class="fw-bold fs-5">المثير SD</span>
                        </div>
                        <div class="custom-content col-12 col-md-4 rounded-end-custom">
                            <span class="fw-bold fs-6">{{ $goal->stimulus }}</span>
                        </div>
                    </div>

                    <div class="col-12 col-md-12 d-flex flex-wrap align-items-center p-3">
                        <div class="custom-box col-12 col-md-2 rounded-start-custom">
                            <span class="fw-bold fs-5">نوع التلقين</span>
                        </div>
                        <div class="custom-content col-12 col-md-4">
                            <select name="indoctrinationType" id="indoctrinationTypes" class="form-control">
                                <option selected disabled>اختر نوع التلقين...</option>
                                @foreach ($indoctrinationTypes as $item)
                                    <option value="{{ $item->id }}" @selected(old('indoctrinationType') == $item->id)>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="custom-box col-12 col-md-2">
                            <span class="fw-bold fs-5">الأخصائي</span>
                        </div>
                        <div class="custom-content col-12 col-md-4 rounded-end-custom">
                            <span class="fw-bold fs-6">{{ Auth::guard('customer')->user()->name }}</span>
                        </div>
                    </div>
                </div>

                <div class="row d-flex justify-content-center align-items-center rounded-3 p-3 my-5 custom-bg">
                    <div class="col-12 col-md-12 d-flex flex-wrap align-items-center p-3">
                        <div id="reference-div" class="col-12 col-md-8">
                            <div class="d-flex justify-content-around">

                                <div class="col-md-3 col-3">
                                    <div class="try-box-title-header col-12 col-md-12">
                                        <span class="fw-bold fs-5">المحاولة</span>
                                    </div>
                                </div>
                                <div class="col-md-8 col-8">
                                    <div class="try-box-title-header col-12 col-md-12">
                                        <span class="fw-bold fs-5">النتيجة</span>
                                    </div>
                                </div>
                            </div>

                            <!-- 1 -->
                            <div class="d-flex justify-content-around pt-3">
                                <div class="col-md-3 col-3">
                                    <div class="try-box-title col-12 col-md-12">
                                        <span class="fw-bold fs-5">1</span>
                                    </div>
                                </div>
                                <div class="col-md-8 d-flex justify-content-between col-9 choices-container">
                                    <div class="try-box-count col-4 col-md-6 positive" style="width: 48%">
                                        <span class="fw-bold fs-5">إيجابية</span>
                                    </div>
                                    <div class="try-box-count col-4 col-md-6 native" style="width: 48%">
                                        <span class="fw-bold fs-5">سلبية</span>
                                    </div>
                                </div>
                            </div>
                            <!-- 1 -->
                            <!-- 2 -->
                            <div class="d-flex justify-content-around pt-3">
                                <div class="col-md-3 col-3">
                                    <div class="try-box-title col-12 col-md-12">
                                        <span class="fw-bold fs-5">2</span>
                                    </div>
                                </div>
                                <div class="col-md-8 d-flex justify-content-between col-9 choices-container">
                                    <div class="try-box-count col-4 col-md-6 positive" style="width: 48%">
                                        <span class="fw-bold fs-5">إيجابية</span>
                                    </div>
                                    <div class="try-box-count col-4 col-md-6 native" style="width: 48%">
                                        <span class="fw-bold fs-5">سلبية</span>
                                    </div>
                                </div>
                            </div>
                            <!-- 2 -->
                            <!-- 3 -->
                            <div class="d-flex justify-content-around pt-3">
                                <div class="col-md-3 col-3">
                                    <div class="try-box-title col-12 col-md-12">
                                        <span class="fw-bold fs-5">3</span>
                                    </div>
                                </div>
                                <div class="col-md-8 d-flex justify-content-between col-9 choices-container">
                                    <div class="try-box-count col-4 col-md-6 positive" style="width: 48%">
                                        <span class="fw-bold fs-5">إيجابية</span>
                                    </div>
                                    <div class="try-box-count col-4 col-md-6 native" style="width: 48%">
                                        <span class="fw-bold fs-5">سلبية</span>
                                    </div>
                                </div>
                            </div>
                            <!-- 3 -->
                            <!-- 4 -->
                            <div class="d-flex justify-content-around pt-3">
                                <div class="col-md-3 col-3">
                                    <div class="try-box-title col-12 col-md-12">
                                        <span class="fw-bold fs-5">4</span>
                                    </div>
                                </div>
                                <div class="col-md-8 d-flex justify-content-between col-9 choices-container">
                                    <div class="try-box-count col-4 col-md-6 positive" style="width: 48%">
                                        <span class="fw-bold fs-5">إيجابية</span>
                                    </div>
                                    <div class="try-box-count col-4 col-md-6 native" style="width: 48%">
                                        <span class="fw-bold fs-5">سلبية</span>
                                    </div>
                                </div>
                            </div>
                            <!-- 4 -->
                            <!-- 5 -->
                            <div class="d-flex justify-content-around pt-3">
                                <div class="col-md-3 col-3">
                                    <div class="try-box-title col-12 col-md-12">
                                        <span class="fw-bold fs-5">5</span>
                                    </div>
                                </div>
                                <div class="col-md-8 d-flex justify-content-between col-9 choices-container">
                                    <div class="try-box-count col-4 col-md-6 positive" style="width: 48%">
                                        <span class="fw-bold fs-5">إيجابية</span>
                                    </div>
                                    <div class="try-box-count col-4 col-md-6 native" style="width: 48%">
                                        <span class="fw-bold fs-5">سلبية</span>
                                    </div>
                                </div>
                            </div>
                            <!-- 5 -->
                            <!-- 6 -->
                            <div class="d-flex justify-content-around pt-3">
                                <div class="col-md-3 col-3">
                                    <div class="try-box-title col-12 col-md-12">
                                        <span class="fw-bold fs-5">6</span>
                                    </div>
                                </div>
                                <div class="col-md-8 d-flex justify-content-between col-9 choices-container">
                                    <div class="try-box-count col-4 col-md-6 positive" style="width: 48%">
                                        <span class="fw-bold fs-5">إيجابية</span>
                                    </div>
                                    <div class="try-box-count col-4 col-md-6 native" style="width: 48%">
                                        <span class="fw-bold fs-5">سلبية</span>
                                    </div>
                                </div>
                            </div>
                            <!-- 6 -->
                            <!-- 7 -->
                            <div class="d-flex justify-content-around pt-3">
                                <div class="col-md-3 col-3">
                                    <div class="try-box-title col-12 col-md-12">
                                        <span class="fw-bold fs-5">7</span>
                                    </div>
                                </div>
                                <div class="col-md-8 d-flex justify-content-between col-9 choices-container">
                                    <div class="try-box-count col-4 col-md-6 positive" style="width: 48%">
                                        <span class="fw-bold fs-5">إيجابية</span>
                                    </div>
                                    <div class="try-box-count col-4 col-md-6 native" style="width: 48%">
                                        <span class="fw-bold fs-5">سلبية</span>
                                    </div>
                                </div>
                            </div>
                            <!-- 7 -->
                            {{-- <!-- 8 -->
                            <div class="d-flex justify-content-around pt-3">
                                <div class="col-md-3 col-3">
                                    <div class="try-box-title col-12 col-md-12">
                                        <span class="fw-bold fs-5">8</span>
                                    </div>
                                </div>
                                <div class="col-md-8 d-flex justify-content-between col-9 choices-container">
                                    <div class="try-box-count col-4 col-md-6 positive" style="width: 48%">
                                        <span class="fw-bold fs-5">إيجابية</span>
                                    </div>
                                    <div class="try-box-count col-4 col-md-6 native" style="width: 48%">
                                        <span class="fw-bold fs-5">سلبية</span>
                                    </div>
                                </div>
                            </div>
                            <!-- 8 -->
                            <!-- 9 -->
                            <div class="d-flex justify-content-around pt-3">
                                <div class="col-md-3 col-3">
                                    <div class="try-box-title col-12 col-md-12">
                                        <span class="fw-bold fs-5">9</span>
                                    </div>
                                </div>
                                <div class="col-md-8 d-flex justify-content-between col-9 choices-container">
                                    <div class="try-box-count col-4 col-md-6 positive" style="width: 48%">
                                        <span class="fw-bold fs-5">إيجابية</span>
                                    </div>
                                    <div class="try-box-count col-4 col-md-6 native" style="width: 48%">
                                        <span class="fw-bold fs-5">سلبية</span>
                                    </div>
                                </div>
                            </div>
                            <!-- 9 -->
                            <!-- 10 -->
                            <div class="d-flex justify-content-around pt-3">
                                <div class="col-md-3 col-3">
                                    <div class="try-box-title col-12 col-md-12">
                                        <span class="fw-bold fs-5">10</span>
                                    </div>
                                </div>
                                <div class="col-md-8 d-flex justify-content-between col-9 choices-container">
                                    <div class="try-box-count col-4 col-md-6 positive" style="width: 48%">
                                        <span class="fw-bold fs-5">إيجابية</span>
                                    </div>
                                    <div class="try-box-count col-4 col-md-6 native" style="width: 48%">
                                        <span class="fw-bold fs-5">سلبية</span>
                                    </div>
                                </div>
                            </div>
                            <!-- 10 --> --}}

                            <!-- + and - -->
                            <div class="d-flex justify-content-around pt-3 lastOneDiv">
                                <div class="col-md-3 col-12">
                                    <div class="try-box-title-header col-12 col-md-12">
                                        <div class="addDiv">
                                            <dix id="addItem">
                                                <img width="33" height="33"
                                                    src="{{ asset('dist/front/assets/images/Plus, Add.png') }}" />
                                            </dix>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 d-flex justify-content-between col-9 choices-container">

                                </div>
                            </div>
                            <!-- + and - -->

                            <div class="d-flex justify-content-around pt-3">
                                <div class="col-md-3 col-3">
                                    <div class="try-box-title-header col-12 col-md-12">
                                        <span class="fw-bold fs-5 text-center">نسبة الاستجابة</span>
                                    </div>

                                    <input type="hidden" name="percentage" class="percentage">
                                </div>
                                <div class="col-md-8 col-8">
                                    <div class="try-box-title-header col-12 col-md-12">
                                        <span class="percentage fw-bold fs-5 text-center">%</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-4 mt-4">
                            <div class="col-md-12">
                                <textarea class="custom-textarea" placeholder="ملاحظات الجلسة..." name="description" id="description"
                                    cols="30" rows="42">{{ old('description') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-5 w-100">
                    <button type="submit" class="btn mx-1 mt-5 w-50 d-block">حفظ
                    </button>
                </div>
            </form>
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
        // Start choice positive or negative
        $(document).on("click", '.choices-container .try-box-count', function() {
            let $parent = $(this).closest('.choices-container');
            $parent.find('.modalActive').removeClass('modalActive');
            $(this).addClass('modalActive');
            updatePercentage();
        });

        function updatePercentage() {
            let modalActivePositiveCount = $(".modalActive.positive").length;
            let totalPositiveCount = $(".positive").length;
            let percentage = (modalActivePositiveCount / totalPositiveCount) * 100;

            $('.percentage').text(percentage.toFixed(0) + "%");
            $('.percentage').val(percentage.toFixed(0));
        }
        // End choice positive or negative 

        let counter = 7; // 10

        $("#addItem").on("click", function() {
            if (counter < 20) {
                let div = $("<div>").addClass("d-flex justify-content-around pt-3 new-item");

                let numberDiv = $("<div>").addClass("col-md-3 col-3");
                let numberTitle = $("<div>").addClass("try-box-title col-12 col-md-12");
                let numberSpan = $("<span>").addClass("fw-bold fs-5").text(counter + 1);

                numberTitle.append(numberSpan);
                numberDiv.append(numberTitle);

                let choicesContainer = $("<div>").addClass(
                    "col-md-8 d-flex justify-content-between col-9 choices-container");

                let positiveDiv = $("<div>").addClass("try-box-count col-4 col-md-6 positive").css("width", "48%");
                let positiveSpan = $("<span>").addClass("fw-bold fs-5").text("إيجابية");
                positiveDiv.append(positiveSpan);

                let nativeDiv = $("<div>").addClass("try-box-count col-4 col-md-6 native").css("width", "48%");
                let nativeSpan = $("<span>").addClass("fw-bold fs-5").text("سلبية");
                nativeDiv.append(nativeSpan);

                choicesContainer.append(positiveDiv, nativeDiv);

                div.append(numberDiv, choicesContainer);

                if ($(".remove-btn").length === 0) {
                    let removeButton = $("<div>").addClass("remove-btn").css({
                        cursor: "pointer",
                    }).append(
                        $("<img>").attr({
                            width: "25",
                            height: "25",
                            src: "{{ asset('dist/front/assets/images/minus.png') }}",
                        })
                    ).on("click", function() {
                        $(".new-item").last().remove();
                        counter--;
                        updateNumbers();
                        updatePercentage();
                        if (counter < 20) {
                            $('.addDiv').show();
                        }
                        if (counter === 7) { // 10
                            $(this).remove();
                        }
                    });

                    $(".addDiv").before(removeButton);
                }

                $(".lastOneDiv").before(div);
                counter++;

                if (counter == 20) {
                    $('.addDiv').hide();
                }
                updatePercentage();
            }
        });

        function updateNumbers() {
            $('.try-box-title span').each(function(index) {
                $(this).text(index + 1);
            });
        }
        document.addEventListener('DOMContentLoaded', function() {
            var referenceDiv = document.getElementById('reference-div');
            var referenceDivHeight = referenceDiv.offsetHeight;

            var textArea = document.getElementById('description');
            textArea.style.height = referenceDivHeight + 'px';
        });
    </script>

    @include('sweetalert::alert')
    @include('sweetalert::validation-alert')
</body>

</html>
