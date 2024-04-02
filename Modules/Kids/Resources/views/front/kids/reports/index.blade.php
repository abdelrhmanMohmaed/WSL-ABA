<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>وصل | التقارير</title>
    <link rel="shortcut icon" type="image/svg" href="{{asset('dist/front/assets/images/headerlogo.png')}}">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/albss.css')}}"/>
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/favorite.css')}}"/>
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/report.css')}}"/>
    <style>
        .buttons {
            display: flex;
            justify-content: end;
            margin-right: auto;
        }

        .buttons a, .edit_family_data .edit-file a {
            color: #000;
            font-weight: 800;
            font-size: 15px;
            line-height: 23px;
            display: inline-block;
            padding: 15px 20px;
            text-align: center;
            background: #58b8c2;
            border-radius: 8px;
            text-decoration: none;
        }
    </style>
</head>
<body class=" ">
<!--header-->
@include('front.parts_auth.nav')
<!--breadcrumb-->
<nav class="nav-report" aria-label="breadcrumb mt-5 mb-5">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('welcome')}}">الرئيسية </a></li>
            <li class="breadcrumb-item"><a href="{{route('kids.index')}}"><i class="fa-solid fa-chevron-left"></i>ملفات
                    المرضي </a></li>
            <li class="breadcrumb-item" aria-current="page">
                <a href="{{route('kids.show',$kid->id)}}"><i class="fa-solid fa-chevron-left"></i>
                    {{ $kid->name}}
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <i class="fa-solid fa-chevron-left"></i>
                التقارير
            </li>
        </ol>
    </div>
</nav>

<div class="wrapper">
    <div class="container">
        <div class="row align-items-center">
            <div class="print-div col-md-5 ">
                <div class="form-title mt-4 mb-4">
                    <img src="{{asset('dist/front/assets/images/medical-records 1.png')}}" alt=""/>
                    <h3> تقرير عام</h3>
                </div>
            </div>

            <div class="print-div col-md-7 d-flex align-items-center justify-content-md-end justify-content-start">
                <button class="displayDetailedReports border-0 buttons mx-1">
                    <a class="add-new-appeals">
                        <img
                            src="{{asset('dist/front/assets/images/plus.png')}}" alt="">
                        أظهار التقارير المفصلة
                    </a>
                </button>
                <button class="border-0 buttons mx-1" onclick="window.print()">
                    <a class="add-new-appeals">
                        <i class="fas fa-print fa-xl"></i>
                        طباعة
                    </a>
                </button>
            </div>

            <div class="container-report">
                <div class="pdf-content">
                    <!-- Start First Modal -->
                    <div class="avoid-page-break">
                        <!-- Start Modal one -->
                        <div class="patient-table">
                            <div class="half-row">
                                <div class="row-key">
                                    اسم المريض
                                </div>
                                <div class="row-value">
                                    {{$kid->name}}
                                </div>
                            </div>
                            <div class="half-row">
                                <div class="row-key">
                                    رقم الهوية
                                </div>
                                <div class="row-value">
                                    {{$kid->num}}
                                </div>
                            </div>
                            <div class="half-row">
                                <div class="row-key">
                                    رقم الملف
                                </div>
                                <div class="row-value">
                                    A0{{$kid->id}}
                                </div>
                            </div>
                            <div class="half-row">
                                <div class="row-key">
                                    العمر
                                </div>
                                <div class="row-value">
                                    @php
                                        $birthDate = \Carbon\Carbon::parse($kid->date);
                                        $currentDate = \Carbon\Carbon::now();
                                        $age = $birthDate->diffInYears($currentDate);
                                    @endphp
                                    {{$age}}
                                </div>
                            </div>
                            <div class="half-row">
                                <div class="row-key">
                                    تاريخ بداية التدريب
                                </div>
                                <div class="row-value">
                                    {{@\Carbon\Carbon::parse(@$kid->sessions()->orderBy('created_at','ASC')->first()->created_at)->format('Y-m-d')  }}</p>
                                </div>
                            </div>
                            <div class="half-row">
                                <div class="row-key">
                                    تاريخ التقرير
                                </div>
                                <div class="row-value">
                                    {{@\Carbon\Carbon::now()->format('Y-m-d')}}</p>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal one -->

                        <!-- Start Modal Two -->
                        <div class="session-table">
                            <div class="row">
                                <div class="right-side">
                                    <div class="key">
                                        أجمالى عدد الجلسات
                                    </div>
                                    <div class="value">
                                        {{$kid->sessions->count()}}
                                    </div>
                                </div>
                                <div class="left-side">
                                    <div class="key">
                                        عدد الأهداف التي تم تدريب المريض عليها
                                    </div>
                                    <div class="value">
                                        {{$kid->goals->count()}}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="right-side">
                                    <div class="key">
                                        الأهداف المنجزة
                                    </div>
                                    <div class="value">
                                        {{$kid->goals->where('status',1)->count()}}
                                    </div>
                                </div>
                                <div class="left-side">
                                    <div class="key">
                                        الأهداف تحت التدريب
                                    </div>
                                    <div class="value">
                                        {{$kid->goals->where('status',0)->count()}}</div>
                                </div>
                            </div>

                            <div class="specialist-table">

                                <div class="row">
                                    <div class="titleBold">
                                        الاخصائي
                                    </div>
                                    <div class="titleBold">
                                        عدد الجلسات
                                    </div>
                                    <div class="titleBold">
                                        اتقن
                                    </div>
                                    <div class="titleBold">
                                        لم يتقن
                                    </div>
                                </div>
                                @foreach ($dataModalOne as $customerId => $data)
                                    <div class="row">
                                        <div>
                                            {{$data['name']}}
                                        </div>
                                        <div>
                                            {{$data['sessionsCount']}}
                                        </div>
                                        <div>
                                            {{ $data['mastery1Count'] }}
                                        </div>
                                        <div>
                                            {{ $data['mastery0Count']}}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- End Modal Two -->

                        <!-- Start Modal Three -->
                        <div class="goal-table ">

                            <div class="row avoid-page-break">
                                <div class="index-col"></div>
                                <div class="titleBold id-col">
                                    رمز المهمة
                                </div>
                                <div class="titleBold goal-col">
                                    الهدف
                                </div>
                                <div class="titleBold status-col">
                                    الحالة
                                </div>
                                <div class="basic-level-col">
                                    <div class="titleBold">
                                        مستوى خط الأبتدائى
                                    </div>
                                    <div class="row titleBold">
                                        <div class="col">
                                            التلقين
                                        </div>
                                        <div class="col">
                                            المستوى
                                        </div>
                                    </div>
                                </div>
                                <div class="current-level-col titleBold">
                                    <div>
                                        المستوى الحالي
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            التلقين
                                        </div>
                                        <div class="col">
                                            المستوى
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @foreach($dataModalTwo['goals']  as $item)
                                <div class="row avoid-page-break">
                                    <div class="index-col">{{$loop->iteration}}</div>
                                    <div class="id-col">
                                        {{@$item['appeal']}}
                                    </div>
                                    <div class="goal-col records-goal">
                                        <div>
                                            {{@$item['target']}}
                                        </div>

                                        <div class="records-row">
                                            @foreach($item['customers'] as $customerId => $customer)
                                                <div class="records-col">
                                                    <div>
                                                        {{$customer['customerName']}}
                                                    </div>
                                                    <div>
                                                        {{ $customer['sessionsCount'] }}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="status-col records-status">
                                        <div>
                                            @if($item['totalMastered'] != 0)
                                                أتقن
                                            @elseif($item['totalNotMastered'] != 0)
                                                لم يتقن
                                            @elseif($item['totalUnderTraining'] != 0)
                                                تحت التدريب
                                            @endif
                                        </div>
                                        <div>
                                            {{@$item['totalSessions']}}
                                        </div>
                                    </div>
                                    <div class="basic-level-col">
                                        <div class="row">
                                            <div class="col">
                                                {{@$item['firstType']}}
                                            </div>
                                            <div class="col">
                                                {{@$item['firstPercentageInSessionTable']}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="current-level-col">
                                        <div class="row">
                                            <div class="col">
                                                {{@$item['lastType']}}
                                            </div>
                                            <div class="col">
                                                {{@$item['lastPercentageInSessionTable']}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- End Modal Three -->
                    </div>
                    <!-- End First Modal -->

                    <div class="dynamic-pages"></div>

                    <!-- Last one -->
                    <div class="dr-report avoid-page-break">
                        <div class="form-wrapper">
                            <p class="titleBold">
                                تقرير الاخصائي :
                            </p>
                            <div class="report-content">

                            </div>
                            <div class="signature">
                                <div>
                                    <p class="titleBold">
                                        اسم الاخصائي :
                                    </p>
                                    <p>
                                        {{Auth::guard('customer')->name}}
                                    </p>
                                </div>
                                <div>
                                    <p class="titleBold">
                                        التوقيع :
                                    </p>
                                    <p>

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Last one -->
                </div>
            </div>

        </div>
    </div>
</div>
<!--footer-->
@include('front.parts.footer')
<!--footer-->
<script>
    const displayButton = document.querySelector(".displayDetailedReports");
    const dynamicPages = document.querySelector(".dynamic-pages");
    let isDisplayed = false;

    displayButton.addEventListener("click", (e) => {
        e.preventDefault();

        if (isDisplayed) {
            dynamicPages.classList.remove("active");
            displayButton.innerHTML = `
               <a class="add-new-appeals">
                   <img src="{{asset('dist/front/assets/images/plus.png')}}" alt="">
                   أظهار التقارير المفصلة
               </a>
            `;
        } else {
            dynamicPages.classList.add("active");
            displayButton.innerHTML = `
              <a class="add-new-appeals">
                <img src="{{asset('dist/front/assets/images/minus.png')}}" alt="">
                إخفاء التقارير المفصلة
              </a>
            `;
        }

        isDisplayed = !isDisplayed;
    });

    // start report
    const drawX_Axis = (chart) => {
        const xAxis = chart.querySelector(".x-axis")
        const reservations = JSON.parse(chart.dataset.sessions)
        const step = 100 / (reservations.length - 1)
        let htmlContent = ""

        for (let i = 0; i < reservations.length; i++) {
            htmlContent += `
             <span style="right: ${step * i}%;
               background-color: ${reservations[i].color};">
                الجلسة ${i + 1}
                ${formatDate(reservations[i].date)}
            </span>
        `
        }

        xAxis.innerHTML = htmlContent
    }

    const drawY_Axis = (chart) => {
        const yAxis = chart.querySelector(".y-axis")
        let htmlContent = ""

        for (let i = 0; i <= 100; i += 5) {
            htmlContent += `
            <span style="bottom: ${i}%;">%${i}</span>
        `
        }

        yAxis.innerHTML = htmlContent
    }

    const addHorizontalLines = (chart) => {
        const horizontalLines = chart.querySelector(".horizontal-lines")
        let htmlContent = ""

        for (let i = 0; i <= 100; i += 5) {
            htmlContent += `
            <span style="bottom: ${i}%;"></span>
        `
        }

        horizontalLines.innerHTML = htmlContent
    }

    const addCurvePoints = (chart) => {
        const curvePointsContainer = chart.querySelector(".curve-points-container")
        const reservations = JSON.parse(chart.dataset.sessions)
        const step = 100 / (reservations.length - 1)
        let htmlContent = ""

        // console.log(reservations)
        for (let i = 0; i < reservations.length; i++) {
            // const date = new Date();
            htmlContent += `
            <span
                class="curve-point"
                style="
                    bottom: ${reservations[i].percentage}%;
                    right: ${step * i}%;
                    background-color: ${reservations[i].color};
                    --bg-color: ${reservations[i].color};
                "
            >
                <div>
                    <span>
                        الجلسة
                        ${i + 1}
                    </span>
                    <span>${reservations[i].percentage}%</span>
                    <span>${formatDate(reservations[i].date)}</span>
                </div>
            </span>
        `
        }

        curvePointsContainer.innerHTML = htmlContent
    }

    const connectCurvePoints = (chart) => {
        const curvePointsContainer = chart.querySelector(".curve-points-container")
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

    const buildCustomCharts = () => {
        const customCharts = document.querySelectorAll(".custom-chart")
        customCharts.forEach(chart => {
            drawX_Axis(chart)
            drawY_Axis(chart)
            addHorizontalLines(chart)
            addCurvePoints(chart)
            connectCurvePoints(chart)
        })
    }

    function formatDate(strDate) {
        const date = new Date(strDate);

        return date.getFullYear() + "/" + (date.getMonth() + 1) + "/" + date.getDate();
    }

    const initReport = async () => {

        const response = await fetch("{{route('kids.reports.getData',$kid->id)}}")
        const jsonData = await response.json();
        // console.log(jsonData)
        const dynamicPages = document.querySelector(".dynamic-pages")

        for (let i = 0; i < jsonData.length; i++) {
            // console.log(jsonData)
            const sessionsDetails = jsonData[i].sessions.map(session => ({
                date: formatDate(session.created_at),
                percentage: session.percentage,
                color: "#" + session.indoctrination_type.color,
            }))
            dynamicPages.innerHTML += `
            <div class="avoid-page-break">
                ${i === 0 ? `
                    <div class="heading mt-5">
                    <h2 class="titleBold">
                        التقارير التفصيلية العامة للاهداف
                    </h2>
                </div>
                ` : ""}

                <div class="single-goal-table">
                    <div class="row titleBold">
                        <div class="index-col"></div>
                        <div class="id-col">
                            رمز المهمة
                        </div>
                        <div class="goal-col">
                            الهدف
                        </div>
                        <div class="status-col">
                            الحالة
                        </div>
                    </div>
                    <div class="row">
                        <div class="index-col">1</div>
                        <div class="id-col">${jsonData[i].appeal.name}</div>
                        <div class="goal-col">${jsonData[i].target}</div>
                        <div class="status-col">${jsonData[i].status}</div>
                    </div>
                </div>

                <div class="date-table">
                    <div class="row">
                        <div class="col-1 titleBold">
                            تاريخ بداية التدريب
                        </div>

                        <div class="col-1">${formatDate(jsonData[i].sessions[0].created_at)}</div>
                        <div class="col-1 titleBold">
                            تاريخ نهاية التدريب
                        </div>
                        <div class="col-1">${formatDate(jsonData[i].sessions[jsonData[i].sessions.length - 1].created_at)}</div>
                    </div>
                    <div class="row">
                        <div class="col-3 titleBold">
                            اجمالي عدد الجلسات من بداية التدريب حتى تاريخ هذا التقرير
                        </div>
                        <div class="col-1">${jsonData[i].sessions.length}</div>
                    </div>
                </div>

                <div class="specialists-table">
                    <div class="row titleBold">
                        <div class="col">
                            الاخصائي
                        </div>
                        <div class="col">
                            عدد الجلسات
                        </div>
                        <div class="col">
                            نوع التلقين
                        </div>
                        <div class="col">
                            مستوى خط الأبتدائى
                        </div>
                        <div class="col">
                            المستوى الحالي
                        </div>
                    </div>
                    ${jsonData[i].sessions.map(session => `
                        <div class="row">
                            <div class="col">${session.customer.name}</div>
                            <div class="col">1</div>
                            <div class="col" style="background-color: #${session.indoctrination_type.color}">${session.indoctrination_type.name}</div>
                            <div class="col">${jsonData[i].sessions[0].percentage}</div>
                            <div class="col">${jsonData[i].sessions[jsonData[i].sessions.length - 1].percentage}</div>
                        </div>
                    `).join('')}
                </div>

                <div class="avoid-page-break">
                    <div class="chart-container">
                        <div class="custom-chart" data-sessions=${JSON.stringify(sessionsDetails)}>
                            <div class="y-axis"></div>
                            <div class="horizontal-lines"></div>
                            <div class="curve-points-container"></div>
                            <div class="x-axis"></div>
                        </div>
                    </div>
                </div>
            </div>
        `
        }

        buildCustomCharts()
    }

    initReport()

</script>
</body>
</html>
