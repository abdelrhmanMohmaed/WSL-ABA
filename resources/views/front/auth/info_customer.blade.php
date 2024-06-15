@extends('front.layouts.app')
@section('title', 'البيانات الشخصية')
@section('style')
    <style>
        .pdf-img {
            display: flex;
        }

        .pdf-item {
            position: relative;
            display: flex;
            align-items: center;
        }

        .close {
            position: absolute;
            bottom: 15px;
            background-color: transparent;
            width: 20px;
            height: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .pdf-item:hover .close {
            opacity: 1;
        }

        .close i {
            color: #ff0000;
            font-size: 12px;
        }
    </style>
@endsection
@section('content')

    <div class="main-colored">
        <!--breadcrumb-->
        <nav aria-label="breadcrumb mt-5 mb-5">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('welcome') }}">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><i class="fa-solid fa-chevron-left"></i>
                        البيانات الشخصية
                    </li>
                </ol>
            </div>
        </nav>
        <div class="colored-bg"></div>
        <div class="bread-crumb"></div>
        <div class="register-form">
            <div class="container">
                <div class="row">
                    <form class="personal-data" action="{{ route('update_profile_info') }}" enctype='multipart/form-data'
                        method="post">
                        @csrf
                        <button class="edit-btn" type="submit">
                            <a> <img src="{{ asset('dist/front/assets/images/edit.png') }}" /> تعديل</a>
                        </button>
                        <div class="user-detailss justify-content-start w-100">
                            <div class="user-img">
                                <div class="edit-img">
                                    <label for="input-file"><img src="{{ asset('dist/front/assets/images/editIMG.png') }}"
                                            alt="" /></label>
                                    <input type="file" id="input-file" name="avatar" accept="image/*" />
                                </div>
                                <img src="{{ asset('uploads/customers/avatar/' . auth()->guard('customer')->user()->avatar) }}"
                                    id="user_img" alt="" />
                            </div>
                            <div class="user-name">
                                <p class="name">{{ auth()->guard('customer')->user()->name }}</p>
                                <p class="type">{{ auth()->guard('customer')->user()->job_name }}</p>
                            </div>
                        </div>

                        <legend style="text-align: start">البيانات الشخصية</legend>
                        <div class="form_item d-flex">
                            <div class="form-group">
                                <label>الاسم كاملاً</label>
                                <input type="text" name="name" required
                                    value="{{ auth()->guard('customer')->user()->name }}" class="form-control"
                                    placeholder="أدخل الاسم كاملاً..." />
                            </div>

                            <div class="form-group">
                                <label>البريد الالكتروني</label>
                                <input type="email" name="email" required
                                    value="{{ auth()->guard('customer')->user()->email }}" class="form-control"
                                    placeholder="أدخل البريد الالكتروني..." />
                            </div>

                            <div class="form-group">
                                <label>رقم التواصل</label>
                                <input type="number" name="phone" required
                                    value="{{ auth()->guard('customer')->user()->phone }}" class="form-control"
                                    placeholder="أدخل رقم التواصل..." />
                            </div>
                            <div class="form-group">


                                <label>الدرجة العلمية</label>

                                <select class="form-control" name="degree" required>
                                    <option value="select"> أدخل الدرجة العلمية...</option>
                                    <option value="Master" @selected(auth()->guard('customer')->user()->degree == 'Master')>
                                        ماجستير
                                    </option>
                                    <option value="doctor" @selected(auth()->guard('customer')->user()->degree == 'doctor')>
                                        دكتوراه
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>التخصص</label>
                                <input type="text" name="spaci" required
                                    value="{{ auth()->guard('customer')->user()->spaci }}" class="form-control"
                                    placeholder="أدخل التخصص..." />
                            </div>
                            <div class="form-group">
                                <label>مكان العمل</label>
                                <input type="text" required name="place_work"
                                    value="{{ auth()->guard('customer')->user()->place_work }}" class="form-control"
                                    placeholder="أدخل مكان العمل..." />
                            </div>
                            <div class="form-group">
                                <label>المسمى الوظيفي</label>
                                <input type="text" required name="job_name"
                                    value="{{ auth()->guard('customer')->user()->job_name }}" class="form-control"
                                    placeholder="أدخل المسمى الوظيفي..." />
                            </div>
                            <div class="form-group">
                                <label>المنطقة </label>
                                <input type="text" required name="area"
                                    value="{{ auth()->guard('customer')->user()->area }}" class="form-control"
                                    placeholder="أدخل المنطقة..." />
                            </div>
                            <div class="form-group">
                                <label>المدينة</label>
                                <input type="text" required name="city"
                                    value="{{ auth()->guard('customer')->user()->city }}" class="form-control"
                                    placeholder="أدخل المدينة..." />
                            </div>


                            <div class="form-group">
                                <label style="width: 35%"> الشهادات والدورات</label>
                                <input type="file" name="file" class="form-control"
                                    placeholder="أدخل الشهادات والدورات.." />

                                <div class="pdf-img">
                                    @foreach (auth()->guard('customer')->user()->Files as $key => $value)
                                        <div class="pdf-item">
                                            <a href="{{ asset('uploads/files/' . $value->file) }}" class="pdf-link"
                                                target="_blank">
                                                <img src="{{ asset('dist/front/assets/images/pdf 1.png') }}"
                                                    alt="">
                                            </a>

                                            <a href="{{ route('destroy.certification', $value->id) }}" class="close"
                                                onclick="removeFile(event)">
                                                <i class="fa-solid fa-xmark"></i>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--footer-->

@endsection
