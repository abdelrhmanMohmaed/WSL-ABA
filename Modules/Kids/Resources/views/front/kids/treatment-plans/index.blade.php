@extends('front.layouts.app')

@section('title','الخطط العلاجية والجلاسات')
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
                <li class="breadcrumb-item active" aria-current="page"><i class="fa-solid fa-chevron-left"></i>
                    الخطط العلاجية و الجلسات
                </li>
            </ol>
        </div>
    </nav>

    <!--user_dashboard-->
    <div class="user-dashboard-details">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <a class="dashboard-card d-block" href="{{ route('kids.treatment-plans.show',$kid->id) }}">
                        <div class="dashboard-card-details">
                            <div class="dashboard-img">
                                <img src="{{asset('dist/front/assets/images/Plus.png')}}"/>
                            </div>
                            <div class="dashboard-title">
                                <h5>أضافة هدف</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a class="dashboard-card d-block" href="{{ route('kids.treatment-plans.goals.index',$kid->id) }}">
                        <div class="dashboard-card-details">
                            <div class="dashboard-img">
                                <img src="{{asset('dist/front/assets/images/Search.png')}}"/>
                            </div>
                            <div class="dashboard-title">
                                <h5>الأهداف تحت التدريب</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a class="dashboard-card d-block" href="{{ route('kids.treatment-plans.goals.accomplishedGoals.index',$kid->id) }}">
                        <div class="dashboard-card-details">
                            <div class="dashboard-img">
                                <img src="{{asset('dist/front/assets/images/checkmark.png')}}"/>
                            </div>
                            <div class="dashboard-title">
                                <h5>الأهداف المنجزه</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
