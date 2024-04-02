@extends('front.layouts.app')

@section('title','بيانات التسجيل')

@section('content')

    <div class="main-colored">
        <div class="colored-bg"></div>
        <div class="bread-crumb"></div>
        <div class="register-form">
            <div class="container">
                <div class="row">
                    <form action="{{ route('update_profile_info') }}" class="valid" enctype='multipart/form-data'
                          method="post">
                        @csrf
                        <legend>بيانات التسجيل</legend>
                        <p>سنقوم بطرح بعض الأسئلة التي يتوجب عليك الاجابة عليها جميعاً</p>
                        <div class="form_item d-flex">
                            <div class="form-group">
                                <label>الاسم كاملاً</label>
                                <input type="text" name="name" value="{{ old('name') }}" required
                                       class="form-control" placeholder="أدخل الاسم كاملاً..."/>
                            </div>
                            <div class="form-group">
                                <label>البريد الالكتروني</label>
                                <input type="email" name="email" value="{{ old('email') }}" required
                                       class="form-control" placeholder="أدخل البريد الالكتروني..."/>
                            </div>
                            <div class="form-group">
                                <label>رقم التواصل</label>
                                <input type="number" name="phone" value="{{ old('phone') }}" required
                                       class="form-control" placeholder="أدخل رقم التواصل..."/>
                            </div>
                            <div class="form-group">
                                <label>الدرجة العلمية</label>

                                <select class="form-control" name="degree" required>
                                    <option> أدخل الدرجة العلمية...</option>
                                    <option value="institute">معهد</option>
                                    <option value="diploma">دبلوم</option>
                                    <option value="bachelors">بكاليريوس</option>
                                    <option value="Master">ماجستير</option>
                                    <option value="doctor"> دكتوراه</option>
                                    <option value="prof"> بروفيسور</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>التخصص</label>
                                <input type="text" name="spaci" value="{{ old('spaci') }}" required
                                       class="form-control" placeholder="أدخل التخصص..."/>
                            </div>
                            <div class="form-group">
                                <label>مكان العمل</label>
                                <input type="text" required value="{{ old('place_work') }}" name="place_work"
                                       class="form-control" placeholder="أدخل مكان العمل..."/>
                            </div>
                            <div class="form-group">
                                <label>المسمى الوظيفي</label>
                                <input type="text" required name="job_name" value="{{ old('job_name') }}"
                                       class="form-control" placeholder="أدخل المسمى الوظيفي..."/>
                            </div>
                            <div class="form-group">
                                <label>المنطقة </label>
                                <input type="text" required name="area" value="{{ old('area') }}"
                                       class="form-control" placeholder="أدخل المنطقة..."/>
                            </div>
                            <div class="form-group">
                                <label>المدينة</label>
                                <input type="text" value="{{ old('city') }}" required name="city"
                                       class="form-control" placeholder="أدخل المدينة..."/>
                            </div>
                            <div class="form-group">
                                <label> الشهادات والدورات</label>

                                <div class="pdf-img d-flex">

                                    <input type="file" name="file" class="form-control"
                                           placeholder="أضف الشهادات والدورات"/>
                                    <p>أدخل الشهادات والدورات</p>

                                    <a class="pdf-link">
                                        <img src="{{ asset('dist/front/assets/images/pdf 1.png') }}" alt=""/>
                                    </a>
                                </div>
                            </div>
                            <button type="submit" class="btn mt-5 w-50 m-auto">حفظ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
