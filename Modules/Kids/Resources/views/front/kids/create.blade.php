@extends('kids::front.layouts.main')

@section('title','انشاء ملف جديد')

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
    <nav aria-label="breadcrumb mt-5 mb-5">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('welcome')}}">الرئيسية </a></li>

                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fa-solid fa-chevron-left"></i>
                    اضافه ملف
                </li>
            </ol>
        </div>
    </nav>

    <div class="tab-form">
        <form action="{{ route('kids.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="row">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#kidsMenu">بيانات الطفل</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#fatherMenu">بيانات الأب</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#motherMenu">بيانات الأم</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#familyMenu">بيانات الأسرة</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        @include('kids::front.kids.partials.modals.create.kidsData')
                        @include('kids::front.kids.partials.modals.create.fatherData')
                        @include('kids::front.kids.partials.modals.create.motherData')
                        @include('kids::front.kids.partials.modals.create.familyData')
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center ">
                <button type="submit" name="submit" value="saveDataBtn1"
                        class="btn mx-1 d-block">حفظ البيانات
                </button>
                <a style="font-weight:900;font-size:20px;line-height:27px" href="{{route('welcome')}}" type="submit"
                   class="btn mx-1 d-block">الرجوع للرئيسية
                </a>
                <button type="submit" name="submit" value="saveDataBtn2"
                        class="btn mx-1 d-block">حفظ و ملئ بيانات جديدة
                </button>
            </div>

        </form>
    </div>

@endsection


@section('script')

    <!-- start get cities Done -->
    <script>

        $('body').on('change', '.country', function () {
            let data = {
                country: $(this).val(),
                _token: $("input[name='_token']").val()
            }

            $.ajax({
                url: "{{ route('kids.cities') }}",
                method: 'post',
                data: data,
                success: function (result) {
                    $('.cities').html(result)
                }
            });
        });

        $(':radio').on('click', function () {
            if ($(this).val() == '1') {
                $(this).parent().parent().siblings('.comment').find('#comment').css("visibility", "visible").prop('disabled', false);
            } else {

                $(this).parent().parent().siblings('.comment').find('#comment').css("visibility", "hidden").prop('disabled', true);
                $(this).parent().parent().siblings('.comment').find('#comment').val("");
            }
        });

    </script>
    <!-- end get cities Done -->

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
