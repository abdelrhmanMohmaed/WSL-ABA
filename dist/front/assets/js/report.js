const drawX_Axis = (chart) => {
    const xAxis = chart.querySelector(".x-axis")
    const reservations = JSON.parse(chart.dataset.sessions)
    const step = 100 / (reservations.length - 1)
    let htmlContent = ""

    for (let i = 0; i < reservations.length; i++) {
        htmlContent += `
            <span style="right: ${step * i}%;">
                ${reservations[i].date}
                الجلسة ${i + 1}
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
            <span style="bottom: ${i-2}%;">%${i}</span>
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

    for (let i = 0; i < reservations.length; i++) {
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
                    <span>${reservations[i].date}</span>
                    <span>
                        الجلسة
                        ${i + 1}
                    </span>
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

const initReport = () => {

    // fetch("https://wsl-aba.com/test/5")
    fetch("https://wsl-aba.com/test/5")

        .then(res => res.json())
        .then(data => {
            console.log(data)
        })

    console.log(jsonData)
    const dynamicPages = document.querySelector(".dynamic-pages")

    for (let i = 0; i < jsonData.length; i++) {
        const sessionsDetails = jsonData[i].sessions.map(session => ({
            date: session.created_at,
            percentage: session.percentage,
            color: "#" + session.indoctrination_type.color,
        }))
        dynamicPages.innerHTML += `
            <div class="avoid-page-break">
                ${i === 0 ? `
                    <div class="heading">
                    <h2>
                        التقارير التفصيلية العامة للاهداف
                    </h2>
                </div>
                ` : ""}

                <div class="single-goal-table">
                    <div class="row">
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
                        <div class="col-1">
                            تاريخ بداية التدريب
                        </div>
                        <div class="col-1">${jsonData[i].sessions[0].created_at}</div>
                        <div class="col-1">
                            تاريخ نهاية التدريب
                        </div>
                        <div class="col-1">${jsonData[i].sessions[jsonData[i].sessions.length - 1].created_at}</div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            اجمالي عدد الجلسات من بداية التدريب حتى تاريخ هذا التقرير
                        </div>
                        <div class="col-1">${jsonData[i].sessions.length}</div>
                    </div>
                </div>

                <div class="specialists-table">
                    <div class="row">
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
                            مستوى خط الأساس
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
                            <div class="col"></div>
                            <div class="col"></div>
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

// document.querySelector(".print-report-btn").addEventListener("click", () => {
//     window.print()
// })
