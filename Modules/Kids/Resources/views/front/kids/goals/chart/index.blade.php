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
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/session.css')}}">
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/table-style.css')}}"/>
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/custom-chart.css')}}"/>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            position: relative;
            border: none;
            outline: none;
        }

        .chart-container {
            direction: ltr !important;

            position: relative;
            z-index: 1;
        }

        .background-container {
            position: relative;
            z-index: 0;
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
            <li class="breadcrumb-item active" aria-current="page"><i class="fa-solid fa-chevron-left"></i>
                الرسم البيانى
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
                    <img src="{{asset('dist/front/assets/images/paint.png')}}"/>
                    <h3>الرسم البيانى</h3>
                </div>
            </div>


            <div class="d-flex flex-row bd-highlight mb-3 w-100">
                @foreach($indoctrinationTypes as $item)
                    <div class="p-2 bd-highlight w-75 text-center">
                        <svg height="10" width="10">
                            <circle cx="5" cy="5" r="5" stroke="black" stroke-width="0"
                                    fill="#{{$item->color}}"/>
                        </svg>
                        <span style="font-size: 10px">
                    {{$item->name}}
                    </span>
                    </div>
                @endforeach
            </div>
            <div style="background-color: #F8FCFC!important;" class="tab-content">
                <div class="container">
                    <div class="text-data">
                        <div class="fw-bold d-flex justify-content-center  align-items-center pb-5">
                            <div class="mt-5 w-75">

                                <div class="custom-chart">
                                    <div class="y-axis"></div>
                                    <div class="horizontal-lines"></div>
                                    <div class="curve-points-container"></div>
                                    <div class="x-axis"></div>
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
<script src="{{asset('dist/front/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('dist/front/assets/js/jquery-3.6.3.js')}}"></script>
<script src="{{asset('dist/front/assets/js/app.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{asset('vendor\realrashid\sweet-alert\resources\js\sweetalert.all.js')}}"></script>

<script>
    const drawX_Axis = (reservations) => {
        const xAxis = document.querySelector(".x-axis")
        const step = 100 / (reservations.length - 1)
        let htmlContent = ""

        for (let i = 0; i < reservations.length; i++) {
            const date = new Date(reservations[i].created_at);
            htmlContent += `
            <span style="right: ${step * i}%;
               background-color: #${reservations[i].indoctrination_type.color};">
                ${date.getFullYear() + "/" + (date.getMonth() + 1) + "/" + date.getDate()}
                الجلسة ${i + 1}
            </span>`
        }

        xAxis.innerHTML = htmlContent
    }

    const drawY_Axis = () => {
        const yAxis = document.querySelector(".y-axis")
        let htmlContent = ""

        for (let i = 0; i <= 100; i += 5) {
            htmlContent += `<span style="bottom: ${i}%;">%${i}</span>`
        }
        yAxis.innerHTML = htmlContent
    }

    const addHorizontalLines = () => {
        const horizontalLines = document.querySelector(".horizontal-lines")
        let htmlContent = ""

        for (let i = 0; i <= 100; i += 5) {
            htmlContent += `<span style="bottom: ${i}%;"></span>`
        }

        horizontalLines.innerHTML = htmlContent
    }

    const addCurvePoints = (reservations) => {
        const curvePointsContainer = document.querySelector(".curve-points-container")
        const step = 100 / (reservations.length - 1)
        let htmlContent = ""

        for (let i = 0; i < reservations.length; i++) {
            const date = new Date(reservations[i].created_at);
            htmlContent += `
            <span
                class="curve-point"
                style="
                    bottom: ${reservations[i].percentage}%;
                    right: ${step * i}%;
                    background-color: #${reservations[i].indoctrination_type.color};
                    --bg-color: #${reservations[i].indoctrination_type.color};
                ">
                <div >
                    <span>
                        ${date.getFullYear() + "/" + (date.getMonth() + 1) + "/" + date.getDate()}
                    </span>
                    <span>
                       ${reservations[i]['customer']['name']}
                    </span> <span>
                        الجلسة
                        ${i + 1}
                    </span>
                </div>
            </span>
        `
        }

        curvePointsContainer.innerHTML = htmlContent
    }

    const connectCurvePoints = () => {
        const curvePointsContainer = document.querySelector(".curve-points-container")
        const curvePoints = curvePointsContainer.querySelectorAll(".curve-point")
        const curveFragment = document.createDocumentFragment()

        for (let i = 0; i < curvePoints.length - 1; i++) {
            const xDistance = (parseInt(curvePoints[i].offsetLeft) - parseInt(curvePoints[i + 1].offsetLeft))
            const yDistance = (parseInt(curvePoints[i].offsetTop) - parseInt(curvePoints[i + 1].offsetTop))
            const lineHeight = Math.sqrt((yDistance ** 2) + (xDistance ** 2))
            const angle = (Math.atan2(xDistance, yDistance) * 180) / Math.PI

            const curveLine = document.createElement("span")
            curveLine.classList.add("curve-lines")
            curveLine.style.backgroundColor = curvePoints[i].style.backgroundColor
            curveLine.style.height = `${lineHeight}px`

            if (yDistance > 0) {
                curveLine.style.bottom = curvePoints[i].style.bottom
                curveLine.style.right = curvePoints[i].style.right
                curveLine.style.transformOrigin = 'bottom right'
                curveLine.style.transform = `rotate(-${angle}deg)`
            } else {
                curveLine.style.bottom = curvePoints[i + 1].style.bottom
                curveLine.style.right = curvePoints[i + 1].style.right
                curveLine.style.transformOrigin = 'bottom left'
                curveLine.style.transform = `rotate(-${angle + 180}deg)`
            }

            curveFragment.append(curveLine)
        }

        curvePointsContainer.append(curveFragment)
    }

    const buildCustomChart = (reservations) => {
        drawX_Axis(reservations)
        drawY_Axis()
        addHorizontalLines()
        addCurvePoints(reservations)
        connectCurvePoints()
    }

    const initCustomChart = (reservations) => {
        buildCustomChart(reservations)

        window.addEventListener("resize", () => buildCustomChart(reservations))
    }


    $(window).on('load', function () {
        $.ajax({
            url: '{{ url('kids/treatment-plans/goals/charts/API/') }}'+"/" + {{$kid->id}} + "/" + {{$goal->id}},
            type: "get",
            dataType: 'json',
            success: function (response) {
                initCustomChart(response);
            }
        });
    });
</script>


@include('sweetalert::alert')
@include('sweetalert::validation-alert')
</body>
</html>
