<aside class="main-sidebar sidebar-dark-primary elevation-4"  style="background-color: {{ auth()->user()->sidebar_background }} !important;">
  <!-- Brand Logo -->
  <a href="{{route('home')}}" class="brand-link text-left" style="padding: 3px;background: #fff;border-bottom: 1px solid #fff;">
    <img src="{{asset('dist/front/assets/images/headerlogo.png')}}" style="width: 100%;
    height: 45px;
    position: relative;
    ">
    {{-- <span class="brand-text font-weight-light" style="color: white"> سلسلة تك  </span> --}}
  </a>

<a href="{{route('home')}}" class="brand-link text-left" style="padding: 3px;background: #f2f2f2;border-bottom: 1px solid #004777;color: black;height: 47px;">
    <img src="{{asset('uploads/users/avatar/'.Auth::user()->avatar)}}" style="width: 39px;border-radius: 34px;padding: 4px;">
    <span class="brand-text font-weight-light" style="color: #004777;font-size: 18px;">{{Auth::user()->name}}</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    
    {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image" style="width: 50px">
        <img src="{{asset('uploads/users/avatar/'.Auth::user()->avatar)}}" class="img-circle elevation-2" alt="User Image" style="width: 100%;border-radius: 30px;height: 34px">
      </div>
      <div class="info">
        @if(Auth::check())
          <a href="{{route('edittsupervisors',Auth::user()->id)}}" class="d-block">{{Auth::user()->name}}</a>
        @endif
      </div>
    </div> --}}

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        {{menu()}}
      </ul>
    </nav>
  </div>
</aside>