<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>وصل | الأهداف تحت التدريب</title>
    <link rel="shortcut icon" type="image/svg" href="{{asset('dist/front/assets/images/headerlogo.png')}}">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/albss.css')}}">

    <style>
        .SS-btn a {
            color: #000;
            background: #F3F7F7;
            border-radius: 8px;
            font-weight: 700;
            font-size: 10px;
            line-height: 25px;
            display: inline-block;
            width: 170px;
            height: 64px;
            /*padding: 15px 20px;*/
            text-align: center;
            text-decoration: none;
        }

        .SS-btn span {
            color: #000;
            background: #F8FCFC;
            border-radius: 8px;
            font-weight: 700;
            border: 2px solid #F3F7F7;
            font-size: 10px;
            line-height: 25px;
            display: inline-block;
            width: 170px;
            height: 64px;
            /*padding: 15px 20px;*/
            text-align: center;
            text-decoration: none;
        }

        .modalActive {
            background: rgb(200, 162, 200) !important;
        }

        /*.container-div {*/
        /*    width: 1170px;*/
        /*    border: 0;*/
        /*    border-radius: 8px;*/
        /*}*/

        textarea::placeholder {
            color: #616363;
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
            <li class="breadcrumb-item"><a href="{{route('welcome')}}">الرئيسية </a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{route('welcome')}}">
                    <i class="fa-solid fa-chevron-left"></i> لوحة
                    التحكم
                </a>
            </li>
            <li class="breadcrumb-item"><a href="{{route('kids.index')}}"><i class="fa-solid fa-chevron-left"></i>ملفات
                    المرضي </a></li>
            <li class="breadcrumb-item"><a href="{{route('kids.show',$kid->id)}}">
                    <i class="fa-solid fa-chevron-left"></i>
                    {{ $kid->name}}
                </a>
            </li>
            <li class="breadcrumb-item"><a href="{{route('kids.treatment-plans.index',$kid->id)}}">
                    <i class="fa-solid fa-chevron-left"></i>
                    الخطط العلاجية و الجلسات
                </a>
            </li>
            <li class="breadcrumb-item active"><a href="{{route('kids.treatment-plans.goals.index',$kid->id)}}">
                    <i class="fa-solid fa-chevron-left"></i>
                    الأهداف تحت التدريب
                </a>
            </li>
            <li class="breadcrumb-item active"><a
                    href="{{route('kids.treatment-plans.goals.sessions.index',[$kid->id,$goal->id])}}">
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
        <div class="row align-items-center">
            <form method="POST" action="{{route('kids.treatment-plans.goals.sessions.store',[$kid->id,$goal->id])}}"
                  class="container">
                @csrf
                <div class="container-div d-flex justify-content-center">
                    <div style="border-radius: 8px; width: 1170px; height: 210px; background-color: #F8FCFC!important;"
                         class="row my-5">

                        <div class="col-md-12 justify-content-center row pt-4 pe-4">
                            <div style="width: 1110px; height: 5px;display: flex;">
                                <div
                                    style="border: 0;border-top-right-radius: 8px;border-bottom-right-radius: 8px; background: #F3F3F7; width: 134px; height: 64px; display: flex; align-items: center; justify-content: center;">
                                    <span style="font-weight: bold; font-size: 18px;">الهدف</span>
                                </div>

                                <div
                                    style="border: 1px solid #EDF1F1;padding-right: 10px ;background: #F8FCFC; width: 418px; height: 65px; display: flex; align-items: center;">
                                    <span style="font-weight: bold; font-size: 15px;">{{$goal->target}}</span>
                                </div>

                                <div
                                    style="border: 0;background: #F3F3F7; width: 134px; height: 64px; display: flex; align-items: center; justify-content: center;">
                                    <span style="font-weight: bold; font-size: 18px;">المثير SD</span>
                                </div>

                                <div
                                    style="border: 1px solid #EDF1F1;border-bottom-left-radius: 8px;border-top-left-radius: 8px ;padding-right: 10px ;background: #F8FCFC; width: 418px; height: 65px; display: flex; align-items: center;">
                                    <span style="font-weight: bold; font-size: 18px;">{{$goal->stimulus}}</span>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 justify-content-center row pt-1 pe-4">
                            <div style="width: 1110px; height: 5px;display: flex;">
                                <div
                                    style="border: 0;border-top-right-radius: 8px;border-bottom-right-radius: 8px; background: #F3F3F7; width: 134px; height: 64px; display: flex; align-items: center; justify-content: center;">
                                    <span style="font-weight: bold; font-size: 18px;">نوع التلقين</span>
                                </div>

                                <select name="indoctrinationType" id="indoctrinationTypes" class="form-control"
                                        style="border: 1px solid #EDF1F1;padding-right: 10px ;background: #F8FCFC; width: 418px; height: 65px; display: flex; align-items: center;">
                                    <option selected disabled>اختر نوع التلقين...</option>
                                    @foreach($indoctrinationTypes as $item)
                                        <option value="{{$item->id}}"
                                            @selected(old('indoctrinationType')==$item->id)>
                                            {{$item->name}}
                                        </option>
                                    @endforeach
                                </select>

                                <div
                                    style="border: 0;background: #F3F3F7; width: 134px; height: 64px; display: flex; align-items: center; justify-content: center;">
                                    <span style="font-weight: bold; font-size: 18px;">الاخصائى</span>
                                </div>

                                <div
                                    style="border: 1px solid #EDF1F1;border-bottom-left-radius: 8px;border-top-left-radius: 8px ;padding-right: 10px ;background: #F8FCFC; width: 418px; height: 65px; display: flex; align-items: center;">
                                    <span
                                        style="font-weight: bold; font-size: 18px;">{{ Auth::guard('customer')->user()->name}}</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div style="width: 50px;height: 50px" class="container d-flex justify-content-center">

                </div>

                <!-- Start session test -->
                <div class="container-div d-flex justify-content-center">
                    <div style="width: 1170px;background-color: #F8FCFC!important;" class="row">
                        <div class="col-md-7">
                            <!-- start title -->
                            <div class="SS-btn my-3">
                                <a style="padding-top:20px;width:188px;height: 64px; font-weight: 1000; font-size: 20px;">
                                    المحاولة
                                </a>

                                <a class="nav-item me-3"
                                   style="padding-top:20px;width:450px;height: 64px; font-weight: 1000; font-size: 20px;">
                                    النتيحة
                                </a>
                            </div>
                            <!-- end title -->
                            <!-- frist try -->
                            <div class="SS-btn my-3">
                                <a style="padding:20px;width:188px;height: 64px; font-weight: 1000; font-size: 20px;">
                                    1
                                </a>

                                <span class="positive nav-item me-3"
                                      style="cursor:pointer;padding:20px;width:214.5px;height: 64px; font-weight: 1000; font-size: 20px;">
                                        ايجابية
                                    </span>

                                <span class="native nav-item me-3"
                                      style="cursor:pointer;padding:20px;width:214.5px;height: 64px; font-weight: 1000; font-size: 20px;">
                                        سلبية
                                    </span>
                            </div>
                            <!-- End frist try -->

                            <!-- Start second try -->
                            <div class="SS-btn my-3">
                                <a style="padding:20px;width:188px;height: 64px; font-weight: 1000; font-size: 20px;">
                                    2
                                </a>

                                <span class="positive nav-item me-3"
                                      style="cursor:pointer;padding:20px;width:214.5px;height: 64px; font-weight: 1000; font-size: 20px;">
                                        ايجابية
                                    </span>

                                <span class="native nav-item me-3"
                                      style="cursor:pointer;padding:20px;width:214.5px;height: 64px; font-weight: 1000; font-size: 20px;">
                                        سلبية
                                    </span>
                            </div>
                            <!-- End second try -->

                            <!-- Start third try -->
                            <div class="SS-btn my-3">
                                <a style="padding:20px;width:188px;height: 64px; font-weight: 1000; font-size: 20px;">
                                    3
                                </a>

                                <span class="positive nav-item me-3"
                                      style="cursor:pointer;padding:20px;width:214.5px;height: 64px; font-weight: 1000; font-size: 20px;">
                                        ايجابية
                                    </span>

                                <span class="native nav-item me-3"
                                      style="cursor:pointer;padding:20px;width:214.5px;height: 64px; font-weight: 1000; font-size: 20px;">
                                        سلبية
                                    </span>
                            </div>
                            <!-- End third try -->

                            <!-- Start fourth try -->
                            <div class="SS-btn my-3">
                                <a style="padding:20px;width:188px;height: 64px; font-weight: 1000; font-size: 20px;">
                                    4
                                </a>

                                <span class="positive nav-item me-3"
                                      style="cursor:pointer;padding:20px;width:214.5px;height: 64px; font-weight: 1000; font-size: 20px;">
                                        ايجابية
                                    </span>

                                <span class="native nav-item me-3"
                                      style="cursor:pointer;padding:20px;width:214.5px;height: 64px; font-weight: 1000; font-size: 20px;">
                                        سلبية
                                    </span>
                            </div>
                            <!-- End fourth try -->

                            <!-- Start fifth try -->
                            <div class="SS-btn my-3">
                                <a style="padding:20px;width:188px;height: 64px; font-weight: 1000; font-size: 20px;">
                                    5
                                </a>

                                <span class="positive nav-item me-3"
                                      style="cursor:pointer;padding:20px;width:214.5px;height: 64px; font-weight: 1000; font-size: 20px;">
                                        ايجابية
                                    </span>

                                <span class="native nav-item me-3"
                                      style="cursor:pointer;padding:20px;width:214.5px;height: 64px; font-weight: 1000; font-size: 20px;">
                                        سلبية
                                    </span>
                            </div>
                            <!-- End fifth try -->

                            <!-- Start sixth try -->
                            <div class="SS-btn my-3">
                                <a style="padding:20px;width:188px;height: 64px; font-weight: 1000; font-size: 20px;">
                                    6
                                </a>

                                <span class="positive nav-item me-3"
                                      style="cursor:pointer;padding:20px;width:214.5px;height: 64px; font-weight: 1000; font-size: 20px;">
                                        ايجابية
                                    </span>

                                <span class="native nav-item me-3"
                                      style="cursor:pointer;padding:20px;width:214.5px;height: 64px; font-weight: 1000; font-size: 20px;">
                                        سلبية
                                    </span>
                            </div>
                            <!-- End sixth try -->

                            <!-- Start seventh try -->
                            <div class="SS-btn my-3">
                                <a style="padding:20px;width:188px;height: 64px; font-weight: 1000; font-size: 20px;">
                                    7
                                </a>

                                <span class="positive nav-item me-3"
                                      style="cursor:pointer;padding:20px;width:214.5px;height: 64px; font-weight: 1000; font-size: 20px;">
                                        ايجابية
                                    </span>

                                <span class="native nav-item me-3"
                                      style="cursor:pointer;padding:20px;width:214.5px;height: 64px; font-weight: 1000; font-size: 20px;">
                                        سلبية
                                    </span>
                            </div>
                            <!-- End seventh try -->

                            <!-- Start eight try -->
                            <div class="SS-btn my-3">
                                <a style="padding:20px;width:188px;height: 64px; font-weight: 1000; font-size: 20px;">
                                    8
                                </a>

                                <span class="positive nav-item me-3"
                                      style="cursor:pointer;padding:20px;width:214.5px;height: 64px; font-weight: 1000; font-size: 20px;">
                                        ايجابية
                                    </span>

                                <span class="native nav-item me-3"
                                      style="cursor:pointer;padding:20px;width:214.5px;height: 64px; font-weight: 1000; font-size: 20px;">
                                        سلبية
                                    </span>
                            </div>
                            <!-- End eight try -->

                            <!-- Start nine try -->
                            <div class="SS-btn my-3">
                                <a style="padding:20px;width:188px;height: 64px; font-weight: 1000; font-size: 20px;">
                                    9
                                </a>

                                <span class="positive nav-item me-3"
                                      style="cursor:pointer;padding:20px;width:214.5px;height: 64px; font-weight: 1000; font-size: 20px;">
                                        ايجابية
                                    </span>

                                <span class="native nav-item me-3"
                                      style="cursor:pointer;padding:20px;width:214.5px;height: 64px; font-weight: 1000; font-size: 20px;">
                                        سلبية
                                    </span>
                            </div>
                            <!-- End nine try -->

                            <!-- Start ten try -->
                            <div class="SS-btn my-3">
                                <a style="padding:20px;width:188px;height: 64px; font-weight: 1000; font-size: 20px;">
                                    10
                                </a>

                                <span class="positive nav-item me-3"
                                      style="cursor:pointer;padding:20px;width:214.5px;height: 64px; font-weight: 1000; font-size: 20px;">
                                        ايجابية
                                    </span>

                                <span class="native nav-item me-3"
                                      style="cursor:pointer;padding:20px;width:214.5px;height: 64px; font-weight: 1000; font-size: 20px;">
                                        سلبية
                                    </span>
                            </div>
                            <!-- End ten try -->

                            <!-- Start Add item-->
                            <div id="addDiv" class="SS-btn my-3 me-5">
                                <dix id="addItem"
                                     style="cursor: pointer; padding:20px;width:188px;height: 64px; font-weight: 1000; font-size: 20px;">
                                    <img width="35" height="35"
                                         src="{{asset('dist/front/assets/images/Plus, Add.png')}}"/>
                                </dix>
                            </div>
                            <!-- End Add item -->

                            <!-- Start الاستجابة -->
                            <div class="SS-btn my-3">
                                <a style="padding:20px;width:188px;height: 64px; font-weight: 1000; font-size: 20px;">
                                    نسبة الاستجابة
                                </a>
                                <input type="hidden" name="percentage" class="percentage">
                                <button type="button" class="percentage" class="nav-item me-3"
                                        style="border: 0;border-radius: 8px;
                                   padding:20px;width:449px;height: 64px; font-weight: 1000; font-size: 20px;">
                                    %
                                </button>
                            </div>
                            <!-- End الاستجابة -->
                        </div>

                        <div class="col-md-5">
                            <div style="height: 97%; margin-top: 20px">
                                <textarea name="description" class="p-3" placeholder="ملاحظات الجلسة..."
                                          style="width: 98%; height: 100%;background-color: #F3F7F7;
                                            border-radius: 8px; border: 0;">{{old('description')}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End session test -->

                <div class="d-flex justify-content-center mt-5 w-100">
                    <button type="submit"
                            class="btn mx-1 mt-5 w-50 d-block">حفظ
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--footer-->
@include('front.parts.footer')
<!--footer-->

<script src="{{asset('dist/front/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('dist/front/assets/js/jquery-3.6.3.js')}}"></script>
<script src="{{asset('dist/front/assets/js/app.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{asset('vendor\realrashid\sweet-alert\resources\js\sweetalert.all.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

<script>
    $(document).on("click", '.SS-btn span', function () {
        let $modalActiveElement = $(this).siblings(".modalActive");
        $(this).addClass("modalActive").siblings().removeClass("modalActive");

        // حساب النسبة
        let modalActivePositiveCount = $(".modalActive.positive").length;
        let totalPositiveCount = $(".positive").length;
        let percentage = (modalActivePositiveCount / totalPositiveCount) * 100;

        $('.percentage').text(percentage.toFixed(0) + "%")
        $('.percentage').val(percentage.toFixed(0))
    });
    let counter = 10;
    $("#addItem").on("click", function () {
        if (counter < 20) {
            let div = $("<div>").addClass("SS-btn my-3");

            let a = $("<a>").css({
                padding: "20px",
                cursor: "pointer",
                width: "188px",
                height: "64px",
                fontWeight: "1000",
                fontSize: "20px"
            }).text(counter + 1);

            let positiveSpan = $("<span>").addClass("positive nav-item me-3").css({
                padding: "20px",
                width: "219px",
                cursor:"pointer",
                height: "64px",
                fontWeight: "1000",
                fontSize: "20px"
            }).text("ايجابية");

            let nativeSpan = $("<span>").addClass("native nav-item me-3").css({
                padding: "20px",
                width: "219px",
                cursor:"pointer",
                height: "64px",
                fontWeight: "1000",
                fontSize: "20px"
            }).text("سلبية");

            div.append(a, positiveSpan, nativeSpan);

            $("#addDiv").before(div);
            counter++;

            if (counter == 20) $('#addDiv').hide();
        }
    });
</script>
@include('sweetalert::alert')
@include('sweetalert::validation-alert')
</body>
</html>
