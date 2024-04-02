<!DOCTYPE html>
<html >
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>لوحة التحكم</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/svg" href="{{asset('dist/front/assets/images/logo/favicon.png')}}">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">
  {{-- animate css --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Bootstrap 4 RTL -->
  <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
 {{-- ckeditor --}}
  <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
  {{-- <script src="{{asset('dist/ckeditor/ckeditor.js')}}"></script> --}}
  
  @if(session()->get('locale') == "en")
  <link rel="stylesheet" href="{{asset('dist/css/customl.css')}}">

 
                       
  @else
  <link rel="stylesheet" href="{{asset('dist/css/custom.css')}}">
  @endif
  <!-- Custom style for RTL -->
  <style>
   .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active, .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active{
    background-color: {{ auth()->user()->sidebar_active }};
   }
   nav.main-header.navbar.navbar-expand.navbar-white.navbar-light{
    background-color: {{ auth()->user()->header_color }};
   }
   .content-wrapper{
    background-color: {{ auth()->user()->background_color }};

   }
   body{
    background-color: {{ auth()->user()->background_color }};

   }
   section.content-header{
    background-color: {{ auth()->user()->nav_color }};
   }

   .text-main{
    color:{{ auth()->user()->sidebar_icon }};
  }
  .main-footer{
   
    border: none;
    padding: 1rem;
    color: #000;
    background: {{ auth()->user()->nav_color }};
  }
  :not(.layout-fixed) .main-sidebar {
    bottom: 55px;
}
  </style>
  @yield('style')
</head>
<body class="hold-transition sidebar-mini">

<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('home')}}" class="nav-link text-primary"> <i class="nav-icon fas fa-home"> </i> الرئيسيه </a>
      </li>
      {{-- {{NavbarMenu()}} --}}
      
      {{-- <li class="nav-item d-none d-sm-inline-block">
        <img src="{{asset('dist/front/assets/images/logo/Group.png')}}" style="width: 38px;border-radius: 52px;">
      </li> --}}
    </ul>

    <ul class="navbar-nav mr-auto-navbav">

    <li class="nav-item dropdown">
        <!--<strong>{{ __('messages.Choose_Language') }} </strong>-->
        
          <select class="changeLang" style=" background: rgba(250, 250, 250, 0.0);border:none">
            <option value="ar" {{ session()->get('locale') == 'ar' ? 'selected' : '' }}>🇪🇬&emsp;عربي</option>

            <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}> 🇬🇧&emsp;English</option>
            
        </select>
    </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="{{ route('inbox') }}" class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
          <i class="fas fa-envelope" style="font-size: 25px;color:#404040"></i>
          @if( InboxUnreadCount() > 0)
            <span class="badge badge-danger navbar-badge">{{ InboxUnreadCount() }}</span>
          @endif
        </a>
      </li>


      <li class="nav-item dropdown show">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
          <i class="fas fa-bell" style="font-size: 25px;color:#404040"></i>
          @if( AdminNotification()['count'] > 0)
            <span class="badge badge-danger navbar-badge">{{ AdminNotification()['count'] }}</span>
          @endif
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">{{ AdminNotification()['count'] }} إشعار</span>
          <div class="dropdown-divider"></div>
          
          @foreach( AdminNotification()['last'] as $noti)
          <a href="{{ !is_null($noti->order_id) ? route('orderdetails',$noti->order_id) : '#' }} " target="_blank" class="dropdown-item">
            <i class="fas fa-bell text-primary" style="font-size: 20px"></i> {{ Str::limit($noti->noti,20) }}
            <span class="float-right text-muted text-sm">{{Date::parse($noti->created_at)->format('h:m / Y-m-d')}}</span>
          </a>
          <div class="dropdown-divider"></div>
          @endforeach

          <a href="{{ route('notifications') }}" class="dropdown-item dropdown-footer">عرض كل الإشعارات</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link" href="{{ route('inbox') }}" class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
          <i class="fas fa-person-booth" style="font-size: 25px;color:#404040"></i>
          @if( InboxUnreadCount() > 0)
            <span class="badge badge-danger navbar-badge">{{ InboxUnreadCount() }}</span>
          @endif
        </a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      <a class="nav-link" class="nav-link" href="#" aria-expanded="false"  data-toggle="modal" data-target="#modaldemoc">
      <i class="fas fa-cog" style="font-size: 25px;color:#404040"></i>
        </a>    
        </li>

      
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('logout')}}" class="nav-link text-danger"><i class="fas fa-sign-out-alt text-danger"></i>  </a>
      </li>
    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('../parts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
     @include('../parts.page_header')
    {{-- @include('../parts.alert') --}}

    
    {{-- loading --}}
    <section class="content loading" style="position: fixed;z-index: 999;width: 80%;margin-top: 5%">
      <div class="row">
        <div class="col-sm-12 text-center">
          <i class="fas fa-spinner fa-pulse text-primary" style="font-size: 60px"></i>
          <h4 style="margin-top: 10px">جاري تحميل البيانات</h4>
        </div>
      </div>
    </section>
     <!-- Main content -->
    <section class="content real_content" style="display: no.e;">
    {{-- add section modal --}}
        <div class="modal" id="modaldemoc">
            <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title"> {{ __('messages.color') }}</h6><button aria-label="Close" class="close" data-dismiss="modal"
                        type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                <form action="{{ route('color_change') }}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                      <div class="row">
                        <div class="col-sm-6">
                          <label>{{ __('messages.color_sidebar') }}</label> <span class="text-danger">*</span>
                          <input type="color" value="{{ auth()->user()->sidebar_background }}" name="color_sidebar" class="form-control" placeholder="{{ __('messages.color_sidebar') }} " required="" style="margin-bottom: 10px">
                        </div>
                        <div class="col-sm-6">

                          <label>{{ __('messages.color_sidebar_icon') }}</label> <span class="text-danger">*</span>
                          <input type="color" value="{{ auth()->user()->sidebar_icon }}" name="color_sidebar_icon" class="form-control" placeholder="{{ __('messages.color_sidebar_icon') }} " required="" style="margin-bottom: 10px">
                        </div>
                        <div class="col-sm-6">
                          <label>{{ __('messages.color_sidebar_active') }}</label> <span class="text-danger">*</span>
                          <input type="color" value="{{ auth()->user()->sidebar_active }}" name="color_sidebar_active" class="form-control" placeholder="{{ __('messages.color_sidebar_active') }} " required="" style="margin-bottom: 10px">
                        </div>
                        <div class="col-sm-6">
                          <label>{{ __('messages.background_color') }}</label> <span class="text-danger">*</span>
                          <input type="color" value="{{ auth()->user()->background_color }}" name="background_color" class="form-control" placeholder="{{ __('messages.background_color') }} " required="" style="margin-bottom: 10px">
                        </div>
                        <div class="col-sm-6">
                          <label>{{ __('messages.nav_color') }}</label> <span class="text-danger">*</span>
                          <input type="color" value="{{ auth()->user()->nav_color }}" name="nav_color" class="form-control" placeholder="{{ __('messages.nav_color') }} " required="" style="margin-bottom: 10px">
                        </div>
                        <div class="col-sm-6">
                          <label>{{ __('messages.header_color') }}</label> <span class="text-danger">*</span>
                          <input type="color" value="{{ auth()->user()->header_color }}" name="header_color" class="form-control" placeholder="{{ __('messages.header_color') }} " required="" style="margin-bottom: 10px">
                        </div>

                      </div>
                        <button type="submit" id="submit" style="display: none;"></button>
                </form>
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-primary save">حفظ</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">إغلاق</button>
                </div>
            </div>
            </div>
        </div>
        @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>Copyright &copy; 2023 </strong> All rights
    reserved
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="{{asset('vendor\realrashid\sweet-alert\resources\js\sweetalert.all.js')}}"></script>

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- my code -->

<script src="{{asset('dist/js/my_code.js')}}"></script>

<script type="text/javascript">

  //fillter search arabic
  $(function(){
       // $(".dataTables_filter>label:after").text('color');
       // $(".dataTables_length>label > span:first-child ").html("عدد النتائج :");
       $(".dataTables_filter>label > input").attr("placeholder", "أكتب كلمة للبحث");
    })

    $('a[data-toggle="pill"]').on('shown.bs.tab', function (e) {
      localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
      $('.nav-tabs a[href="' + activeTab + '"]').tab('show');
    }
    $(document).ready(function(){
      $('a[data-toggle="pill"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
      });
      var activeTab = localStorage.getItem('activeTab');
      if(activeTab){
        $('#myTab a[href="' + activeTab + '"]').tab('show');
      }
    }); 
    
    
	$(document).ready(function(){
	    $("#example2").DataTable({
	      "paging": true,
	      "lengthChange": true,
	      "searching": true,
	      "ordering": true,
	      "info": true,
	      "autoWidth": true,
        "order": [[0, 'desc']],
	    });
	})
  
  // notification


  //ShowNotification('title','body','https://www.hour-tec.com')
  
</script>
<script src = "https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js" > </script> 
<script src = "https://www.gstatic.com/firebasejs/8.3.2/firebase-analytics.js" > </script>
<script src = "https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js" > </script>
<script src="{{asset('dist/js/firebase.js')}}"></script>

<script src="https://cdn.socket.io/4.6.0/socket.io.min.js" integrity="sha384-c79GN5VsunZvi+Q/WObgk2in0CbZsHnjEqvFxC5DxHn9lTfNce2WW6h2pH6u/kF+" crossorigin="anonymous"></script>



<script>
  

var noti_permission = Notification.permission
  const messaging = firebase.messaging();

  if(noti_permission !== 'granted') // default - denied - granted
  {
    toastr.error('من فضلك قُم بالسماح للإشعارات')
    Notification.requestPermission().then((permission) => {
      console.log(permission)
    });
  }else{
  messaging.requestPermission()
    .then(function () {
      return messaging.getToken()
    })
    .then(function(token) {
      if(token !== "{{ auth()->user()->fcm_token }}")
      {
        $.get("{{url('update-fcm-token')}}" + '/' + token + '/' + 'user'
        , function (data, status) {
          //console.log(data)
        })
      }
    })
    .catch(function (err) {
    console.log("Unable to get permission to notify.", err);
    });
  }

  var url = "{{ route('changeLang') }}";
        
  $(".changeLang").change(function(){
      window.location.href = url + "?lang="+ $(this).val();
  });
  $('.save').on('click',function(){
        $('#submit').click();
    })

</script>
@include('sweetalert::alert')
@include('sweetalert::validation-alert')

 @yield('script')
</body>
</html>
