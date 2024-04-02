<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>وصل | @yield('title')</title>
    <link rel="shortcut icon" type="image/svg" href="{{asset('dist/front/assets/images/headerlogo.png')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="a0nymous" referrerpolicy="0-referrer"/>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/select2.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/family-form.css') }}"/>

    @yield('style')
    <style>
        .ui-datepicker-title .ui-datepicker-year{
            width: 55% !important;
        }

    </style>
</head>

<body>
<!--header-->
@include('front.parts_auth.nav')

@yield('content')



<!--footer-->
@include('front.parts.footer')

<script src="{{ asset('dist/front/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dist/front/assets/js/jquery-3.6.3.js') }}"></script>
<script src="{{ asset('dist/front/assets/js/app.js') }}"></script>

<script src="{{ asset('dist/front/assets/js/select2.min.js') }}"></script>
<script src="{{ asset('vendor\realrashid\sweet-alert\resources\js\sweetalert.all.js') }}"></script>

<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

@include('sweetalert::alert')
@include('sweetalert::validation-alert')

@yield('script')
<script>
    $(document).ready(function () {
        $(".js-example-basic-single").select2();
    });

    $(function () {
        $(".datePicker").datepicker({
            dateFormat: "yy-mm-dd",
            changeMonth: true,
            changeYear: true,
            yearRange: '1970:+0'
        });
    });

    <!-- start get cities Done -->

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

    <!-- end get cities Done -->
</script>
</body>
</html>
