@extends('front.layouts.app')

@section('title','الرئيسية')
@section('content')
<div class="preloader">
    <div class="prelaoder-img">
      <img src="{{asset('dist/front/assets/images/Group 1000003787.png')}}" alt="">

    </div>
    <div class="preloader-sec h-100">
      <div class="d-flex justify-content-center align-items-center h-100">

        <div class="loader">

          <img src=  "{{asset('dist/front/assets/images/headerlogo.png')}}" alt="">

          <br>
          <img src="{{asset('dist/front/assets/images/Group 1000003788.png')}}" class="mt-md-5 mt-3 mb-1" width="90px">

          <div class="loading-bar">
            <span></span>
          </div>
        </div>

      </div>
    </div>
  </div>
<div class="main">
      <div class="main-img">
        <img src="{{asset('dist/front/assets/images/Mask group.png')}}" alt="" />
      </div>
    </div>
    <div class="aboutUs">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="sec-img">
              <img
                src="{{asset('dist/front/assets/images/Group 1000003469.png')}}"
                height="64px"
                width="64px"
                alt=""
              />
            </div>
            <div class="title">
              <h3>عن وصل</h3>
            </div>
            <div class="text">
              <p>
                نظام إلكتروني يتيح للأخصائيين ومحللين السلوك التطبيقي العمل على
                تقييم وتأهيل وتدريب الحالات التي تعاني من اضطراب طيف التوحد
                والاضطرابات النمائية الأخرى وفق نظام تحليل السلوك التطبيقي (ABA)
              </p>
            </div>
          </div>

          <div class="col-12">
            <div class="sec-img">
              <img src="{{asset('dist/front/assets/images/Group 1000003476.png')}}" alt="" />
            </div>
            <div class="title">
              <h3>خدماتنا</h3>
            </div>
            <div class="text">
              <p>
                نسعى لتقديم أفضل الخدمات التي تتناسب مع احتياجات المختصين في
                المجال، والتي تبدأ بالتقييمات الأولية وإدراج الخطة العلاجية
                المناسبة التي تتوافق مع إمكانيات وقدرات ومدى ادراك كل حالة من
                خلال مقياس (ABLLS) وتقديم الجلسات اليومية وذلك لتحقيق أهداف
                الخطط العلاجية ومتابعة تقييم الحالات ومدى نسبة تطورها بشكل
                مستمر.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="aims">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">


              <div class="flip-card">

                <div class="aims-card  flip-card-back">
                  <div class="aims-img">
                    <img src="{{asset('dist/front/assets/images/solution (2) 1.png')}}"alt="" />
                  </div>
                  <div class="aim-title">
                    <h4>أهدافنا</h4>
                  </div>

                 </div>
               <div class="aims-card  flip-card-front">
                <div class="aims-img">
                  <img src="{{asset('dist/front/assets/images/solution (2) 1.png')}}" alt="" />
                </div>
                <div class="aim-title">
                  <h4>أهدافنا</h4>
                </div>
                <div class="aim-text">
                  <p>
                    تطوير سبل التقييم والتأهيل والتدريب لزيادة قدرة الأخصائيين
                    ومحللين السلوك على تقديم خدمات تحليل السلوك للحالات التي تعاني
                    من اضطراب طيف التوحد والاضطرابات النمائية بكل يسر وسهولة
                  </p>
                </div>
               </div>

            </div>
          </div>
          <div class="col-md-4">
             <div class="flip-card">
              <div class="aims-card  flip-card-back scaled-colored-back">
                <div class="aims-img">
                  <img src="{{asset('dist/front/assets/images/solution (1) 1.png')}}" alt="" />
                </div>
                <div class="aim-title">
                  <h4>رسالتنا</h4>
                </div>

               </div>

               <div class="aims-card  flip-card-front   scaled-colored-front">
                <div class="aims-img">
                  <img src="{{asset('dist/front/assets/images/solution (1) 1.png')}}" alt="" />
                </div>
                <div class="aim-title">
                  <h4>رسالتنا</h4>
                </div>
                <div class="aim-text">
                  <p>
                    تقديم خدمات تحليل السلوك التطبيقي إلكترونياً لمساعدة الأخصائيين
                     ومحللي السلوك على الاستفادة من التقنية خلال موقع “وصل”
                  </p>
                </div>
               </div>

            </div>
          </div>
          <div class="col-md-4">
             <div class="flip-card">

                <div class="aims-card  flip-card-back">
                  <div class="aims-img">
                    <img src="{{asset('dist/front/assets/images/strategic-vision (1) 1.png')}}" alt="" />
                  </div>
                  <div class="aim-title">
                    <h4>رؤيتنا</h4>
                  </div>

                 </div>
               <div class="aims-card  flip-card-front">
                <div class="aims-img">
                  <img src="{{asset('dist/front/assets/images/strategic-vision (1) 1.png')}}" alt="" />
                </div>
                <div class="aim-title">
                  <h4>رؤيتنا</h4>
                </div>
                <div class="aim-text">
                  <p>تتمثل رؤيتنا في تقديم منظومة
                    إلكترونية متكاملة تتيح للأخصائيين ومحللين السلوك التطبيقي
                     جميع الخدمات التي تسهم في تطوير الحالات التي تعاني من
                     اضطراب طيف التوحد والاضطرابات النمائية الاخرى

                  </p>
                </div>
               </div>

            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
