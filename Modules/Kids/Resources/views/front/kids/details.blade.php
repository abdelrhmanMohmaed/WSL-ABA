<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> وصل | بيانات المريض ({{ $kid->name }})</title>

    <link rel="shortcut icon" type="image/svg" href="{{ asset('dist/front/assets/images/headerlogo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="a0nymous" referrerpolicy="0-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/family-form.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/table-style.css') }}" />
</head>

<body class="edit_family_data">

    @include('front.parts_auth.nav')

    <nav aria-label="breadcrumb mt-5 mb-5">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('welcome') }}">الرئيسية </a></li>
                <li class="breadcrumb-item"><a href="{{ route('kids.index') }}"><i
                            class="fa-solid fa-chevron-left"></i>ملفات
                        المرضي </a></li>
                <li class="breadcrumb-item"><a href="{{ route('kids.show', $kid->id) }}">
                        <i class="fa-solid fa-chevron-left"></i>{{ $kid->name }} </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><i class="fa-solid fa-chevron-left"></i>بيانات
                    المريض
                </li>
            </ol>
        </div>
    </nav>

    <div class="tab-form">
        <form>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-5 ">
                        <div class="form-title mt-4 mb-4">
                            <img src="{{ asset('dist/front/assets/images/file 2.png') }}">
                            <h3>بيانات المريض</h3>
                        </div>
                    </div>

                    <div class="col-md-7 d-flex align-items-center justify-content-md-end justify-content-start">
                        <button class="border-0 edit-file mx-1">
                            <a href="{{ route('kids.edit', $kid->id) }}"> <img
                                    src="{{ asset('dist/front/assets/images/edit.png') }}" alt=""> تعديل
                                البيانات </a>
                        </button>
                        <button class="border-0 edit-file mx-1" 
                        {{-- onclick="window.print()" --}}
                        >
                            <a href="{{ route('kids.print', $kid->id) }}">
                                <i class="fas fa-print fa-xl"></i> طباعة</a>
                        </button>
                    </div>
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#kidDataShow">بيانات الطفل</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#fatherDataShow">بيانات الأب</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#motherDataShow">
                                بيانات الأم</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#familyDataShow">بيانات الأسرة</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        @include('kids::front.kids.partials.modals.show.kidsData')
                        @include('kids::front.kids.partials.modals.show.fatherData')
                        @include('kids::front.kids.partials.modals.show.motherData')
                        @include('kids::front.kids.partials.modals.show.familyData')
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!--footer-->
    @include('front.parts.footer')
    <!--footer-->



    {{-- <div class="printFile">
        @include('kids::front.kids.print')
    </div> --}}
    <script src="{{ asset('dist/front/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/front/assets/js/jquery-3.6.3.js') }}"></script>
    <script src="{{ asset('dist/front/assets/js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('vendor\realrashid\sweet-alert\resources\js\sweetalert.all.js') }}"></script>

    @include('sweetalert::alert')
    @include('sweetalert::validation-alert')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".js-example-basic-single").select2();
        });
    </script>
</body>

</html>
