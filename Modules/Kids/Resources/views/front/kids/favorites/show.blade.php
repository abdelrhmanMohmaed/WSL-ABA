<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>وصل | المفضلات السابقة</title>
    <link rel="shortcut icon" type="image/svg" href="{{ asset('dist/front/assets/images/headerlogo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="a0nymous" referrerpolicy="0-referrer" /> 
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/family-form.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/table-style.css') }}" />
</head>

<body class="patiant-file">
    <!--header-->
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
                    <a href="{{ route('kids.show', $kid->id) }}">
                        <i class="fa-solid fa-chevron-left"></i>
                        {{ $kid->name }}
                    </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="{{ route('kids.evaluation', $kid->id) }}">
                        <i class="fa-solid fa-chevron-left"></i>
                        التقيمات
                    </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="{{ route('kids.evaluate.favorites.index', $kid->id) }}">

                        <i class="fa-solid fa-chevron-left"></i>
                        تقيم المفضلات
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fa-solid fa-chevron-left"></i>
                    المفضلات السابقة
                </li>
            </ol>
        </div>
    </nav>
    <!--breadcrumb-->
    <div class="wrapper">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-md-6">
                    <div class="form-title mt-4 mb-4">
                        <img src="{{ asset('dist/front/assets/images/folder-archive-box.png') }}" />
                        <h3>المفضلات السابقة</h3>
                    </div>
                </div>
                <div class="col-12">
                    <div class="patiant-table">
                        <table>
                            <thead>
                                <tr>
                                    <th scope="col">رقم التقيم</th>
                                    <th scope="col">تاريخ التقيم</th>
                                    <th scope="col">اسم الاخصائى</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($favorites as $item)
                                    <tr>
                                        <td>التقيم رقم ({{ $loop->iteration }})</td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($item->create_date)->format('d/m/Y') }}
                                        </td>
                                        <td class="td-table-menu">
                                            {{ $item->customer->name }}
                                            <div class="table-menu">
                                                <p><i class="fa-solid fa-ellipsis-vertical fa-rotate-270"></i></p>
                                                <div class="table-menu-dropdown">
                                                    <p>
                                                        <a href="{{ route('kids.evaluate.favorites.index', ['kid' => $kid->id, 'favorite' => $item->id]) }}"
                                                            target="_blank">
                                                            <img src="https://www.citypng.com/public/uploads/preview/eye-view-watching-green-icon-download-png-11640343973hj2oufpggb.png"
                                                                width="20px" height="20px" alt="">
                                                            عرض الملف
                                                        </a>
                                                    </p>

                                                    <form
                                                        action="{{ route('kids.evaluate.favorites.destroy', $item->id) }}"
                                                        method="POST" id="deleteForm">
                                                        @csrf
                                                        @method('DELETE')
                                                        <img src="https://icon-library.com/images/red-recycle-bin-icon/red-recycle-bin-icon-18.jpg"
                                                            width="20px" height="20px" alt="">
                                                        <button style="border:none; outline:0; background-color:white;"
                                                            type="submit" onclick="confirmDelete(event)">
                                                            <p style="font-size:12px;">حذف الملف</p>
                                                        </button>
                                                    </form>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
        $(".table-menu").click(function() {

            $(this).children('.table-menu-dropdown').slideToggle();
        });

        function confirmDelete(event) {
            event.preventDefault();
            if (confirm('هل أنت متأكد من رغبتك في حذف الملف؟')) {
                document.getElementById('deleteForm').submit();
            }
        }
    </script>
    @include('sweetalert::alert')
    @include('sweetalert::validation-alert')
</body>

</html>
