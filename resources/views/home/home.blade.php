@extends('layouts.app')
<style type="text/css">
    .selectize-input{
        min-height: 38px !important
    }
.card img {
    width: 70px;
    height: 70px!important;
}

	#gallery-photo-add {
    display: inline-block;
    position: absolute;
    z-index: 1;
    width: 100%;
    height: 50px;
    top: 0;
    left: 0;
    opacity: 0;
    cursor: pointer;
	}
</style>
@section('content')
<div class="container-fluid">

    <div class="row">
      @foreach(Home() as $h)
        <div class="col-lg-3 col-6">
          <div class="small-box {{$h['color']}}">
            <div class="inner">
              <h3>{{$h['count']}}</h3>

              <p>{{$h['title']}}</p>
            </div>
            <div class="icon">
              {!!$h['icon']!!}
            </div>
            <a href="{{route($h['route'])}}" class="small-box-footer">عرض المزيد</a>
          </div>
        </div>
      @endforeach
    </div>

    <div class="row">
      <div class="col-md-6">
        <!-- USERS LIST -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title" style="float: right"> احدث المشتركين </h3>

            <div class="card-tools"  style="float: left">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <ul class="users-list clearfix">
            @foreach($users as $key => $val)
              <li>
                <img src="{{asset('uploads/customers/avatar/'.$val->avatar)}}" alt="User Image">
                <a class="users-list-name" href="{{route('editcustomers',$val->id)}}">{{$val->name}}</a>
                <span class="users-list-date">{{Date::parse($val->created_at)->diffForHumans()}}</span>
              </li>
              @endforeach  
            </ul>
            <!-- /.users-list -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer text-center">
            <a href="{{route('customers')}}">عرض جميع المشتركين</a>
          </div>
          <!-- /.card-footer -->
        </div>
        <!--/.card -->
       
          
        <!--/.card -->
      </div>
     
    </div>

    </div>

  
   

 

  

</div>
@endsection


@section('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 

@endsection

