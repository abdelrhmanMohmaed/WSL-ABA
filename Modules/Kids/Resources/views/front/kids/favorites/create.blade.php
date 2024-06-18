<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>وصل | اضافة تقيم مفضلات جديد</title>
    <link rel="shortcut icon" type="image/svg" href="{{ asset('dist/front/assets/images/headerlogo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/albss.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/favorite.css') }}" />

    <style>
        .custom-bg {
            background-color: #F8FCFC !important;
        }

        .styled-input {
            background-color: #F8FCFC !important;
            border: 0 solid #F8FCFC !important;
        }

        .try-box-title-header {
            background: #F3F3F7;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;

        }




        .modalActive {
            background: rgb(200, 162, 200) !important;
        }

        .favorite-question {
            display: flex;
            justify-content: space-between;
            background: rgba(0, 0, 0, 0.02);
            border: 1px solid rgba(0, 0, 0, 0.06);
            border-radius: 8px 8px 0px 0px;
        }

        .c-rating-favorite {
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
        }

        .c-rating-favorite span {
            border-left: 1px solid rgba(0, 0, 0, 0.06);
            line-height: 55px;
            display: block;
            cursor: pointer;
            background: #f3f7f7;
            width: 25%;
            height: 100%;
            background-size: contain;
        }

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
    </style>
</head>

<body class="favorite-file">
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
                    <a href="{{ route('kids.show', $kid->id) }}"><i class="fa-solid fa-chevron-left"></i>
                        {{ $kid->name }}
                    </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="{{ route('kids.evaluation', $kid->id) }}"><i class="fa-solid fa-chevron-left"></i>
                        تقيم المريض
                    </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="{{ route('kids.evaluate.favorites.index', $kid->id) }}"><i
                            class="fa-solid fa-chevron-left"></i>
                        تقيم المفضلات
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fa-solid fa-chevron-left"></i>
                    تقيم المفضلات جديد
                </li>
            </ol>
        </div>
    </nav>


    <div class="wrapper">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="form-title mt-4 mb-4">
                        <img src="{{ asset('dist/front/assets/images/plus.png') }}" />
                        <h3>اضافة تقييم مفضلات جديد</h3>
                    </div>
                </div>
                <form method="POST" action="{{ route('kids.evaluate.favorites.store', $kid->id) }}">
                    @csrf
                    @include('kids::front.kids.favorites.partials.modals.writeInstruction')

                    @include('kids::front.kids.favorites.partials.modals.writeFavoriteForm')

                    @include('kids::front.kids.favorites.partials.modals.checkTable')
                    @include('kids::front.kids.favorites.partials.modals.calculationFavorite')

                    <div class="d-flex justify-content-center mt-5 w-100">
                        <button type="submit" class="btn mx-1 mt-5 w-50 d-block">حفظ
                        </button>
                    </div>
                </form>
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
        $('body').on("keyup keypress change", "#firstInput", function() {
            $('.firstItem,.firstFavoriteName').text($(this).val());
        });

        $('body').on("keyup keypress change", "#secondInput", function() {
            $('.secondItem,.secondFavoriteName').text($(this).val());
        });

        $('body').on("keyup keypress change", "#thirdInput", function() {
            $('.thirdItem,.thirdFavoriteName').text($(this).val());
        });

        $('body').on("keyup keypress change", "#fourthInput", function() {
            $('.fourthItem,.fourthFavoriteName').text($(this).val());
        });

        $('body').on("keyup keypress change", "#fifthInput", function() {
            $('.fifthItem,.fifthFavoriteName').text($(this).val());
        });

        $('body').on("keyup keypress change", "#sixthInput", function() {
            $('.sixthItem,.sixthFavoriteName').text($(this).val());
        });
    </script>

    <script>
        function displayFavouriteDetails(name, countOfChoices, secondItem, percentageFirstTable, fourthItem, fifthItem) {
            let realName = name.html();
            let firstItemClickCount = $(countOfChoices).length;
            let firstCalculation = (((firstItemClickCount / 30) * 100).toFixed(0)) + '%';
            let displayEquation = firstItemClickCount + " ÷ 30 × 100 = " + firstCalculation;

            // Display the name and percentage
            $(secondItem).html(realName);
            $(percentageFirstTable).val(firstCalculation);

            $(fourthItem).val(firstItemClickCount + ' مرات');
            $(fifthItem).val(displayEquation);
        }

        $('.c-rating-favorite').on("click", "span", function() {

            const inputs = ['#firstInput', '#secondInput', '#thirdInput', '#fourthInput', '#fifthInput',
                '#sixthInput'
            ];

            if (inputs.every(input => $(input).val() !== '')) {

                let $modalActiveElement = $(this).siblings(".modalActive");
                $(this).addClass("modalActive").siblings().removeClass("modalActive");

                if ($modalActiveElement.length > 0) {
                    if ($modalActiveElement.hasClass("firstItem")) {

                        displayFavouriteDetails($('.firstFavoriteName'),
                            '.c-rating-favorite .firstItem.modalActive', '.firstFavoriteName',
                            '.firstFavoritePercentage', '#firstFavoriteCount', '#firstFavoritePercentage'
                        );
                    } else if ($modalActiveElement.hasClass("secondItem")) {

                        displayFavouriteDetails($('.secondFavoriteName'),
                            '.c-rating-favorite .secondItem.modalActive', '.secondFavoriteName',
                            '.secondFavoritePercentage', '#secondFavoriteCount', '#secondFavoritePercentage'
                        );
                    } else if ($modalActiveElement.hasClass("thirdItem")) {

                        displayFavouriteDetails($('.thirdFavoriteName'),
                            '.c-rating-favorite .thirdItem.modalActive', '.thirdFavoriteName',
                            '.thirdFavoritePercentage', '#thirdFavoriteCount', '#thirdFavoritePercentage'
                        );
                    } else if ($modalActiveElement.hasClass("fourthItem")) {

                        displayFavouriteDetails($('.fourthFavoriteName'),
                            '.c-rating-favorite .fourthItem.modalActive', '.fourthFavoriteName',
                            '.fourthFavoritePercentage', '#fourthFavoriteCount', '#fourthFavoritePercentage'
                        );
                    } else if ($modalActiveElement.hasClass("fifthItem")) {

                        displayFavouriteDetails($('.fifthFavoriteName'),
                            '.c-rating-favorite .fifthItem.modalActive', '.fifthFavoriteName',
                            '.fifthFavoritePercentage', '#fifthFavoriteCount', '#fifthFavoritePercentage'
                        );
                    } else if ($modalActiveElement.hasClass("sixthItem")) {

                        displayFavouriteDetails($('.sixthFavoriteName'),
                            '.c-rating-favorite .sixthItem.modalActive', '.sixthFavoriteName',
                            '.sixthFavoritePercentage', '#sixthFavoriteCount', '#sixthFavoritePercentage'
                        );
                    }
                }

                if ($(this).hasClass('firstItem')) {
                    displayFavouriteDetails($(this), '.c-rating-favorite .firstItem.modalActive',
                        '.firstFavoriteName',
                        '.firstFavoritePercentage', '#firstFavoriteCount', '#firstFavoritePercentage'
                    );
                } else if ($(this).hasClass('secondItem')) {
                    displayFavouriteDetails($(this), '.c-rating-favorite .secondItem.modalActive',
                        '.secondFavoriteName',
                        '.secondFavoritePercentage', '#secondFavoriteCount', '#secondFavoritePercentage'
                    );
                } else if ($(this).hasClass('thirdItem')) {
                    displayFavouriteDetails($(this), '.c-rating-favorite .thirdItem.modalActive',
                        '.thirdFavoriteName',
                        '.thirdFavoritePercentage', '#thirdFavoriteCount', '#thirdFavoritePercentage'
                    );
                } else if ($(this).hasClass('fourthItem')) {
                    displayFavouriteDetails($(this), '.c-rating-favorite .fourthItem.modalActive',
                        '.fourthFavoriteName',
                        '.fourthFavoritePercentage', '#fourthFavoriteCount', '#fourthFavoritePercentage'
                    );
                } else if ($(this).hasClass('fifthItem')) {
                    displayFavouriteDetails($(this), '.c-rating-favorite .fifthItem.modalActive',
                        '.fifthFavoriteName',
                        '.fifthFavoritePercentage', '#fifthFavoriteCount', '#fifthFavoritePercentage'
                    );
                } else if ($(this).hasClass('sixthItem')) {
                    displayFavouriteDetails($(this), '.c-rating-favorite .sixthItem.modalActive',
                        '.sixthFavoriteName',
                        '.sixthFavoritePercentage', '#sixthFavoriteCount', '#sixthFavoritePercentage'
                    );
                } else {
                    console.log('null');
                }
            }
        });
    </script>
    @include('sweetalert::alert')
    @include('sweetalert::validation-alert')
</body>

</html>
