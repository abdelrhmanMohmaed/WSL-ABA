<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" type="image/svg" href="{{ asset('dist/front/assets/images/headerlogo.png') }}">
    <title>وصل | بيانات الطفل ({{ $kid->name }})</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/family-form.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/table-style.css') }}" />
</head>

<body class="child">
    @include('front.parts_auth.nav')

    <!--breadcrumb-->
    <nav aria-label="breadcrumb mt-5 mb-5">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('welcome') }}">الرئيسية </a></li>
                <li class="breadcrumb-item"><a href="{{ route('kids.index') }}"><i
                            class="fa-solid fa-chevron-left"></i>ملفات
                        المرضي </a></li>
                <li class="breadcrumb-item active" aria-current="page"><i class="fa-solid fa-chevron-left"></i>
                    {{ $kid->name }}
                </li>
            </ol>
        </div>
    </nav>

    <!--user_dashboard-->
    <div class="user-dashboard-details">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <a class="dashboard-card d-block" href="{{ route('kids.details', $kid->id) }}">
                        <div class="dashboard-card-details">
                            <div class="dashboard-img">
                                <img src="{{ asset('dist/front/assets/images/file 2.png') }}" alt="" />
                            </div>
                            <div class="dashboard-title">
                                <h5> بيانات المريض </h5>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-6">
                    <a class="dashboard-card d-block" href="{{ route('kids.evaluation', $kid->id) }}">
                        <div class="dashboard-card-details">
                            <div class="dashboard-img">
                                <img src="{{ asset('dist/front/assets/images/rating 1.png') }}" alt="" />
                            </div>
                            <div class="dashboard-title">
                                <h5> التقييمات</h5>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-6">
                    <a class="dashboard-card d-block" href="{{ route('kids.treatment-plans.index', $kid->id) }}">
                        <div class="dashboard-card-details">
                            <div class="dashboard-img">
                                <img src="{{ asset('dist/front/assets/images/check-list 1.png') }}" alt="" />
                            </div>
                            <div class="dashboard-title">
                                <h5>الجلسات والخطط العلاجية</h5>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-6">
                    <a href="{{ route('kids.reports.index', $kid->id) }}"
                        class="download-report dashboard-card d-block">
                        <div class="dashboard-card-details">
                            <div class="dashboard-img">
                                <img src="{{ asset('dist/front/assets/images/medical-records 1.png') }}"
                                    alt="" />
                            </div>
                            <div class="dashboard-title">
                                <h5>التقارير</h5>
                            </div>
                        </div>
                    </a>
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
        $(".table-menu").click(function() {
            $(this).children('.table-menu-dropdown').slideToggle();
        });
    </script>
    @include('sweetalert::alert')
    @include('sweetalert::validation-alert')
</body>

</html>
