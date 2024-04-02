@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
               
  
                <div class="card-tools">
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="mailbox-read-info">
                  <h5>{{ $message->title }}</h5>
                    <span class="mailbox-read-time float-right">{{ $message->created_at }}</span></h6>
                </div>

                <!-- /.mailbox-controls -->
                <div class="mailbox-read-message">
                    {{ $message->subject }}
                </div>
                <div class="mailbox-read-message">
                  @if(!is_null($message->image))
                  <img src="{{ asset('uploads/dealers/'.$message->image) }}" style="width: 200px;">
                  @endif
                </div>
                <!-- /.mailbox-read-message -->
              </div>
              <!-- /.card-body -->

            </div>
            <!-- /.card -->
          </div>
    </div>
@endsection

@section('script')
<script type="text/javascript">

</script>
@endsection

