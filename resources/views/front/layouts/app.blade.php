<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>وصل | @yield('title')</title>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"/>

    <link rel="icon" href=
        "{{asset('dist/front/assets/images/headerlogo.png')}}"
          type="image/x-icon">
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/login.css')}}"/>
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/table-style.css')}}"/>
    @yield('style')
    <style>
        .user-dashboard-details {
            margin-top: 65px;
        }

    </style>

</head>
<body>

@if(auth()->guard('customer')->check())

    @include('front.parts_auth.nav')

@else

    @include('front.parts.nav')

@endif



@yield('content')
@include('front.parts.footer')
<script src="{{asset('dist/front/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('dist/front/assets/js/jquery-3.6.3.js')}}"></script>
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor\realrashid\sweet-alert\resources\js\sweetalert.all.js')}}"></script>
<script src="{{asset('dist/front/assets/js/app.js')}}"></script>
@yield('script')
@include('sweetalert::alert')
@include('sweetalert::validation-alert')
</body>
</html>
