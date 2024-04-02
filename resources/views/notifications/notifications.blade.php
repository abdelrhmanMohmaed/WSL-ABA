@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h5 class="m-0" style="display: inline;">قائمة الإشعارات </h5>
              <a href="{{ route('notifications.delete_all') }}" class="btn btn-danger delete" style="float:left;width:95px">حذف الكل</a>
            </div>
            <!-- /.card-header -->

            <!-- /.card-body -->
            <div class="card-body">
              <div class="row">

                <div class="col-md-3">
                  <div class="card">

                    <div class="card-body p-0">
                      <ul class="nav nav-pills flex-column">
                        <li class="nav-item active">
                          <a href="#" class="nav-link">
                            <i class="fas fa-inbox"></i> إجمالي عدد الإشعارات
                            <span class="badge bg-primary float-right">{{$all}}</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="fas fa-envelope-open"></i> عدد المقروء 
                            <span class="badge bg-success float-right">{{$read}}</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="fas fa-envelope"></i> عدد الغير مقروء 
                            <span class="badge bg-warning float-right">{{$not_read}}</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                    <!-- /.card-body -->
                  </div>
                </div>

                <!-- /.col -->
                <div class="col-md-9">
                  <div class="card card-primary card-outline">

                    <!-- /.card-header -->
                    <div class="card-body p-0">

                      <div class="table-responsive mailbox-messages">
                        <table class="table table-hover table-striped">
                          <tbody>

                          @foreach($data as $value)
                            <tr class=" @if($value->seen == '0') text-danger @endif">                              
                              <td class="mailbox-subject"><a href="{{ !is_null($value->order_id) ? route('orderdetails',$value->order_id) : '#'}}" target="_blank"> {{ $value->noti }} </a></td>
                              <td class="mailbox-date ">{{Date::parse($value->created_at)->diffForHumans()}}</td>
                            </tr>
                          @endforeach

                          @if(count($data) == 0)
                          <tr>
                            <td class="text-center">لا يوجد إشعارات</td>
                          </tr>
                          @endif
                          </tbody>
                        </table>
                        <!-- /.table -->
                      </div>
                      <!-- /.mail-box-messages -->
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->
              </div>
            </div>
            <!-- /.card-body -->
          </div>

          <div class="row text-center">
            <div class="col-sm-12 text-center">
              {{$data->links()}}
            </div>
          </div>
          
        </div>
    </div>
@endsection

@section('script')

@endsection

