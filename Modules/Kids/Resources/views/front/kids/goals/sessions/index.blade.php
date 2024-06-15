<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>وصل | الجلسات </title>
    <link rel="shortcut icon" type="image/svg" href="{{ asset('dist/front/assets/images/headerlogo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/session.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/table-style.css') }}" />


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
                <li class="breadcrumb-item active" aria-current="page"><i class="fa-solid fa-chevron-left"></i>
                    الجلسات
                </li>
            </ol>
        </div>
    </nav>
    <!-- nav -->

    <div class="wrapper">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="form-title mt-4 mb-4">
                        <img src="{{ asset('dist/front/assets/images/User,Profile.png') }}" />
                        <h3>الجلسات</h3>
                    </div>
                </div>

                <div class="col-md-7 d-flex align-items-center justify-content-md-end justify-content-start">
                    <button class="border-0 edit-file mx-1">
                        <a href="{{ route('kids.treatment-plans.goals.sessions.create', [$kid->id, $goal->id]) }}"
                            class="add-new-appeals"> <img src="{{ asset('dist/front/assets/images/plus.png') }}"
                                alt=""> إضافة
                            جلسة
                        </a>
                    </button>
                </div>
                @empty(@$sessions[0])
                    <div class="d-flex justify-content-center pt-5">
                        <div class="d-flex justify-content-center rounded py-4">
                            <div class="text-center">
                                <span style="font-weight: bolder; font-size: 25px">لم يتم اضافة أى جلسة حتى الان!</span>
                                <br>
                                <span style="color: #C4C4C4; font-size: 15px">اضغط على زر جلسة للبدء بالجلسة الاولى</span>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-12">
                        <div class="patiant-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th scope="col">رقم الجلسة</th>
                                        <th scope="col">تاريخ</th>
                                        <th scope="col">اسم الاخصائى</th>
                                        <th scope="col">النسبة</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sessions as $item)
                                        <tr>
                                            <td>الجلسة رقم ({{ $loop->iteration }})</td>
                                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td>
                                            <td>{{ $item->customer->name }}</td>
                                            <td>{{ $item->percentage }}%</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endempty
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


    @include('sweetalert::alert')
    @include('sweetalert::validation-alert')
</body>

</html>
