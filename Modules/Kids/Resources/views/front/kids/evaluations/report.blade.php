<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>وصل | التقارير</title>
    <link rel="shortcut icon" type="image/svg" href="{{ asset('dist/front/assets/images/headerlogo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/albss.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/favorite.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/report.css') }}" />
    <style>
        .buttons {
            background: #58b8c2;
        }

        .container-report {
            padding: 24px;
            background-color: rgba(115, 201, 204, 0.05);
        }

        textarea[readonly] {
            resize: none;
        }

        .page-break {
            page-break-before: always;
        }

        .container-notes {
            opacity: 0;
            height: 0;
            overflow: hidden;
        }

        .active {
            opacity: 1;
            height: auto;
        }

        .rtl-text p {
            white-space: pre-line;
        }

        @media print {

            .hiddButton,
            .main-header,
            .nav-report,
            .print-div,
            #menu,
            #footer {
                display: none !important;
            }
        }
    </style>
</head>

<body class=" ">
    <!--header-->
    @include('front.parts_auth.nav')

    <!--breadcrumb-->
    <nav aria-label="breadcrumb mt-5 mb-5">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('welcome') }}">الرئيسية </a></li>
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
                <li class="breadcrumb-item" aria-current="page">
                    <a href="{{ route('kids.evaluate.appeals.vertical-draw', $kid->id) }}">
                        <i class="fa-solid fa-chevron-left"></i>
                        الرسم العمودي للتقييم
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fa-solid fa-chevron-left"></i>
                    تقرير التقييم
                </li>
            </ol>
        </div>
    </nav>

    <div class="wrapper">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="form-title mt-4 mb-4">
                        <img src="{{ asset('dist/front/assets/images/medical-records 1.png') }}" alt="" />
                        <h3>تقرير التقييم</h3>
                    </div>
                    <button style="background-color: {{ $userSession->session->hex }}"
                        class="border-0 d-flex justify-content-end mx-1 my-3 rounded-3">
                        <a class="text-dark fw-bolder d-inline-block px-3 py-3 text-center text-decoration-none">
                            <h9>
                                <span> تقييم بتاريخ</span> {{ date('Y/m/d', strtotime($userSession->created_at)) }}
                            </h9>
                        </a>
                    </button>
                </div>

                <div class="hiddButton col-md-7 d-flex align-items-center justify-content-md-end justify-content-start">
                    <button
                        class="displayDetailedReports border-0 d-flex justify-content-end mr-auto mx-1 displayNotes">
                        <a
                            class="buttons text-dark fw-bolder d-inline-block px-3 py-3 text-center rounded-3 text-decoration-none">
                            <img src="{{ asset('dist/front/assets/images/plus.png') }}" alt="" width="25"
                                height="25">
                            أظهار الملخصات
                        </a>
                    </button>
                    <button class="border-0 d-flex justify-content-end mr-auto mx-1" onclick="window.print()">
                        <a
                            class="buttons text-dark fw-bolder d-inline-block px-3 py-3 text-center rounded-3 text-decoration-none">
                            <i class="fas fa-print fa-xl"></i>
                            طباعة
                        </a>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="wrapper">
        <div class="container">
            <div class="row align-items-center">
                <div class="container-report">
                    <div class="wrapper">
                        <div class="container">
                            <div class="p-3">
                                <div class="bg-white rounded-4 p-3 border rtl-text">
                                    <h4 class="fw-medium">تقرير التقييم :</h4>
                                    <div>
                                        <p class="mb-3">
                                            {{ @$userSession->evaluation_report }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="page-break"></div>

                        <div class="container container-notes">
                            <div class="p-3">
                                <div class="bg-white rounded-4 p-3 border rtl-text">
                                    <h4 class="fw-medium">الملاحظات:</h4>
                                    <div>
                                        @forelse ($appSessions as $item)
                                            @if ($item->Appale->id != 26)
                                                <strong>{{ $item->Appale->name }}:</strong>
                                                <p class="mb-3">
                                                    {{ $item->desc }}
                                                </p>
                                            @endif

                                        @empty
                                            <p>لا توجد ملاحظات</p>
                                        @endforelse
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
    <script>
        const displayButton = document.querySelector(".displayNotes");
        const containerNotes = document.querySelector(".container-notes");
        let isDisplayed = false;

        displayButton.addEventListener("click", (e) => {
            e.preventDefault();

            if (isDisplayed) {
                containerNotes.classList.remove("active");
                displayButton.innerHTML = `
                <a class="buttons text-dark fw-bolder d-inline-block px-3 py-3 text-center rounded-3 text-decoration-none">
                    <img src="{{ asset('dist/front/assets/images/plus.png') }}" alt=""  width="25" height="25">
                    أظهار الملخصات
                </a>
            `;
            } else {
                containerNotes.classList.add("active");
                displayButton.innerHTML = `
                <a class="buttons text-dark fw-bolder d-inline-block px-3 py-3 text-center rounded-3 text-decoration-none">
                    <img src="{{ asset('dist/front/assets/images/minus.png') }}" alt=""  width="25" height="25">
                    إخفاء الملخصات
                </a>
            `;
            }

            isDisplayed = !isDisplayed;
        });
    </script>
</body>

</html>
