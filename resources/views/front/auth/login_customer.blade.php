<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>وصل | تسجيل الدخول</title>

    <link rel="icon" href=
        "{{asset('dist/front/assets/images/headerlogo.png')}}"
          type="image/x-icon">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/login.css')}}"/>
</head>
<body class="login">
<header class="main-header">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-1 menu-icon" id="menu">
                <p><i class="fa-solid fa-bars"></i></p>
            </div>
            <div class="col-md-3 col-4 pc-col">
                <div class="header-logo pc-header-logo">
                    <img src="{{asset('dist/front/assets/images/headerlogo.png')}}" alt=""/>
                </div>
            </div>
            <div class="col-md-6 col-1 tap-menu">
                <ul class="main-menu" id="main-menu">
                    <div class="close-icon" id="close-menu">
                        <p><i class="fa-solid fa-xmark"></i></p>
                    </div>
                    <li><a href="{{route('welcome')}}">الرئيسية</a></li>
                    <li><a href="#footer">تواصل معنا</a></li>
                    <li class="login-btn">
                        <a href="{{ route('login_doctor') }}" class="login">تسجيل دخول</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 col-6">
                <div class="login-btn pc-login-btn">
                    <a href="{{ route('login_doctor') }}" class="login">تسجيل دخول</a>
                </div>
                <div class="header-logo mob-header-logo">
                    <img src="{{asset('dist/front/assets/images/headerlogo.png')}}" alt=""/>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="login-form">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-lg-8">
                <form action="{{ route('login_doctor_complete') }}" class="valid" enctype='multipart/form-data'
                      method="post">
                    {{csrf_field()}}

                    <legend>تسجيل الدخول</legend>
                    <div class="form-group">
                        <div class="input-icon">
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                id="exampleInputName1"
                                onblur="getVal()"
                                required
                                placeholder=" أسم المستخدم"
                            />
                            <i class="fa-regular fa-user icon"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-icon">
                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                required
                                id="exampleInputPassword1"
                                onblur="getPass()"
                                placeholder="كلمة المرور"
                            />
                            <i class="fa-solid fa-unlock-keyhole icon pass-icon"></i>
                        </div>
                    </div>
                    <button type="submit" class="btn mt-4 w-50 m-auto">
                        تسجيل الدخول
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--footer-->
<footer id="footer">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="footer-logo">
                    <img src="{{asset('dist/front/assets/images/footerlogo.png')}}" alt=""/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="social">
                    <div class="social-title">
                        <h4>تابعنا على مواقع التواصل</h4>
                    </div>
                    <ul class="social-menu">
                        <li>
                            <a href=""><img src="{{asset('dist/front/assets/images/tiktok.png')}}" alt=""/></a>
                        </li>
                        <li>
                            <a href=""><img src="{{asset('dist/front/assets/images/snapchat.png')}}" alt=""/></a>
                        </li>
                        <li>
                            <a href=""><img src="{{asset('dist/front/assets/images/twitter.png')}}" alt=""/></a>
                        </li>
                        <li>
                            <a href=""><img src="{{asset('dist/front/assets/images/insta.png')}}" alt=""/></a>
                        </li>
                        <li>
                            <a href=""><img src="{{asset('dist/front/assets/images/fb.png')}}" alt=""/></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-12">
                <div class="sub-footer">
                    <p class="right-text">
                        <img
                            src="{{asset('dist/front/assets/images/copyright.png')}}"
                            width="24px"
                            height="24px"
                            alt=""
                        />
                        وصل 2023. جميع الحقوق محفوظة
                    </p>
                    <p class="policy-page"><a href="">الخصوصية وشروط الاستخدام</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="{{asset('dist/front/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('dist/front/assets/js/jquery-3.6.3.js')}}"></script>
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor\realrashid\sweet-alert\resources\js\sweetalert.all.js')}}"></script>
<script src="{{asset('dist/front/assets/js/app.js')}}"></script>
<script>
    function getVal() {
        const val = document.querySelector('input').value;
        let icon = document.querySelector(".icon");

        if (val != "") {
            icon.style.display = "none";
        }

    }

    function getPass() {
        const pass = document.querySelector("input[type='password']").value;

        let passIcon = document.querySelector(".pass-icon");
        if (pass != "") {
            passIcon.style.display = "none";
        }

    }
</script>
@include('sweetalert::alert')
@include('sweetalert::validation-alert')
</body>
</html>
