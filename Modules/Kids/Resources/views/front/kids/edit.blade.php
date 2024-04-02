@extends('kids::front.layouts.main')

@section('title'," تعديل ملف المريض ($kid->name)")

@section('content')
    <style>
        .select2-container--default .select2-selection--single
        {
            height: 42px !important;
            margin-top: 0.4px !important;

        }
        .select2-container--default .select2-selection--single .select2-selection__arrow b
        {
            display: none !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered
        {
            display: none !important;
        }
    </style>
    <!--header-->
    <nav aria-label="breadcrumb mt-5 mb-5">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('welcome')}}">الرئيسية </a></li>
                <li class="breadcrumb-item"><a href="{{route('kids.index')}}"><i class="fa-solid fa-chevron-left"></i>ملفات
                        المرضي </a></li>

                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fa-solid fa-chevron-left"></i>
                    تعديل ملف المريض
                </li>
            </ol>
        </div>
    </nav>


    <div class="tab-form">
        <form action="{{route('kids.update',$kid->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="container">
                <div class="row">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#kidsMenuEdit">بيانات الطفل</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#fatherMenuEdit">
                                بيانات الأب
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#motherMenuEdit">
                                بيانات الأم
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#familyMenuEdit">بيانات الأسرة</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        @include('kids::front.kids.partials.modals.edit.kidsData')
                        @include('kids::front.kids.partials.modals.edit.fatherData')
                        @include('kids::front.kids.partials.modals.edit.motherData')
                        @include('kids::front.kids.partials.modals.edit.familyData')
                    </div>
                </div>
            </div>

            <button type="submit" class="btn w-50 m-auto d-block save-data">حفظ البيانات</button>
        </form>
    </div>
@endsection

@section('script')


{{--    <script>--}}
{{--        //Validation of name--}}
{{--        let childNme = document.querySelector(".child-name");--}}
{{--        let saveData = document.querySelector(".save-data");--}}
{{--        let error = document.querySelector(".error");--}}
{{--        childNme.onkeyup = function () {--}}
{{--            let count = childNme.value.length;--}}

{{--            error.style.color = "red";--}}
{{--            let countMsg = 20 - count;--}}
{{--            error.innerText = "باقي" + countMsg;--}}
{{--            saveData.disabled = true;--}}

{{--            if (countMsg == 1) {--}}

{{--                error.innerText = "باقي حرف واحد";--}}
{{--                saveData.disabled = true;--}}
{{--            } else if (countMsg === 0 || count > 20) {--}}

{{--                error.style.display = "none";--}}
{{--                saveData.disabled = false;--}}
{{--            }--}}
{{--        }--}}
{{--    </script>--}}
@endsection
