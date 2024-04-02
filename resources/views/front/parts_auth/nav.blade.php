<header class="dashboard">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-1 menu-icon" id="menu">
                <p><i class="fa-solid fa-bars"></i></p>
            </div>
            <div class="col-md-6 pc-header-logo">
                <div class="header-logo">
                    <img src="{{asset('dist/front/assets/images/headerlogo.png')}}" alt=""/>
                </div>
            </div>
            <div class="col-md-6 col-1 tap-menu dashboard-menu">
                <ul class="main-menu" id="main-menu">
                    <div class="close-icon" id="close-menu">
                        <p><i class="fa-solid fa-xmark"></i></p>
                    </div>
                    <a class="data" href="{{ route('info_profile') }}"><i class="fa-regular fa-file-lines"></i> البيانات
                        الشخصيه</a>
                    <a class="exit" href="{{ route('logout') }}"> <i class="fa-solid fa-arrow-up-right-from-square"></i>
                        تسجيل خروج </a>
                </ul>
            </div>
            <div class="col-3 header-logo mob-header-logo">
                <img src="{{asset('dist/front/assets/images/headerlogo.png')}}" alt=""/>
            </div>
            <div class="col-md-6 mob-user-details">
                <div class="user-details">
                    <div class="menu-details">

                        <a class="data" href="{{ route('info_profile') }}"><i class="fa-regular fa-file-lines"></i>
                            البيانات الشخصيه</a>


                        <a class="exit" href="{{ route('logout') }}"><i
                                class="fa-solid fa-arrow-up-right-from-square"></i> تسجيل خروج </a>


                    </div>
                    <div class="user-img">
                        <img src="{{asset('uploads/customers/avatar/'.auth()->guard('customer')->user()->avatar)}}"
                             alt=""/>
                    </div>
                    <div class="user-name">
                        <p class="name">{{auth()->guard('customer')->user()->name}}</p>
                        <p class="type">{{auth()->guard('customer')->user()->job_name}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
</header>
