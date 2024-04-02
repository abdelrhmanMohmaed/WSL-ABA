

<!DOCTYPE html>
<html >
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>لوحة التحكم</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style type="text/css">
    @import url("https://fonts.googleapis.com/css?family=Tajawal&display=swap");
    *{
      font-family: 'Tajawal', sans-serif;
    }
    body{
      background-image: url("{{asset('dist/img/back11.jpg')}}");
      background-repeat: round;
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box" style="margin: 10% auto !important;">
  <div class="login-logo" style="width: 215px;
  height: 60px;
  margin: 0 auto 5px auto;
  text-align: center;
  background: white;
  border-radius: 41px;">
    {{-- <span>لوحة التحكم</span> --}}
    <br>
    <img src="{{asset('dist/front/assets/images/headerlogo.png')}}" style="width: 120px;position: relative;bottom: 46px;">
  </div>
  <!-- /.login-logo -->
  <div class="card" style="border-radius: 30px">
     <!-- Vaildtions Messages  -->
      @if (count($errors) > 0)
          <div class="alert alert-danger alert-styled-right alert-arrow-right text-center bounceIn" >
          <button type="button" class="close pull-left" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="color:#fff">×</span>
            </button>
              <ul style="margin-right: 10px; list-style: none">
                  @foreach ($errors->all() as $error)
                      <li >{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
    <div class="card-body login-card-body" style="border-radius: 40px">
      <p class="login-box-msg">قُم بتسجيل الدخول</p>

      <form method="POST" action="{{ route('login') }}">
        {{csrf_field()}}
        <div class="input-group mb-3">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="البريد الإلكتروني" autofocus style="direction: rtl">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <input id="password" type="password" placeholder="كلمة المرور" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" style="direction: rtl">
       
         <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                تذكرني
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" style="background-color: #41d5e1  !important ;border-color:#3eb2c2  !important">دخول</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>

</body>
</html>

