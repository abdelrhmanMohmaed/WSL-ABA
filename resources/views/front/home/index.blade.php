@extends('front.layouts.app')

@section('title','الرئيسية')
@section('content')
    <!--breadcrumb-->
    <nav aria-label="breadcrumb mt-5 mb-5">
        <div class="container">
            <ol class="breadcrumb">
            </ol>
        </div>
    </nav>


    <!--breadcrumb-->
    <nav aria-label="breadcrumb mt-5 mb-5">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page"><i class="fa-solid fa-chevron-left"></i> لوحة
                    التحكم
                </li>
            </ol>
        </div>
    </nav>

    <!--user_dashboard-->
    <div class="user-dashboard-details">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <a class="dashboard-card d-block" href="{{ route('kids.create') }}">
                        <div class="dashboard-card-details">
                            <div class="dashboard-img">
                                <img src="{{asset('dist/front/assets/images/new-file 1.png')}}" alt=""/>
                            </div>
                            <div class="dashboard-title">
                                <h5>فتح ملف جديد</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a class="dashboard-card d-block" href="{{ route('kids.index') }}">
                        <div class="dashboard-card-details">
                            <div class="dashboard-img">
                                <img src="{{asset('dist/front/assets/images/file 1.png')}}" alt=""/>
                            </div>
                            <div class="dashboard-title">
                                <h5>ملفات المرضى</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a class="dashboard-card d-block">
                        <div class="dashboard-card-details">
                            <div class="dashboard-img">
                                <img src="{{asset('dist/front/assets/images/statistical-graphic.png')}}" alt=""/>
                            </div>
                            <div class="dashboard-title">
                                <h5>الإحصائيات</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
