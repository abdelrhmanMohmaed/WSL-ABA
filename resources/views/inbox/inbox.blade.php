@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h5 class="m-0" style="display: inline;">قائمة الرسائل </h5>
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
                            <i class="fas fa-inbox"></i> إجمالي عدد الرسائل
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

                          @foreach($inbox as $value)
                            <tr class=" @if($value->is_read == 0) text-danger @endif">
                              {{--  user name  --}}
                              <td class="mailbox-name">{{$value->name}}</td>
                              <td class="mailbox-name">{{$value->email}}</td>
                              
                              <td class="mailbox-subject"><a href="{{route('viewmessage',$value->id)}}"> {{ Str::limit($value->subject,50)}} </a></td>
                              <td class="mailbox-date ">{{Date::parse($value->created_at)->diffForHumans()}}</td>
                              <td class="mailbox-name">
                                {{--  <i class="fas fa-eye text-primary" style="margin-left: 5px"></i>  --}}
                                <i class="fas fa-trash text-danger delete" data-id="{{$value->id}}"></i>
                              </td>
                            </tr>
                          @endforeach

                          @if(count($inbox) == 0)
                          <tr>
                            <td class="text-center">لا يوجد رسائل</td>
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
              {{$inbox->links()}}
            </div>
          </div>
          
        </div>
    </div>
@endsection

@section('script')
<script type="text/javascript">
  $('.delete').on('click',function(){
      $.post("{{url('delete-message')}}",{_token:"{{csrf_token()}}",id:$(this).data('id')},function(data, status){
        console.log('status',status)
        console.log('data',data)
          if(status === 'success')
          {
            toastr.success('تم الحذف')
            function pageRedirect() {
              window.location.reload()
            }      
            setTimeout(pageRedirect(), 500);
          }
      });
  })
</script>
@endsection

