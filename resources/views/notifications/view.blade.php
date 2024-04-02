@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
               
  
                <div class="card-tools">
                    <h3 class="card-title text-primary">{{ $message->name }}</h3>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="mailbox-read-info">
                  <h5>{{ $message->title }}</h5>
                  <h6>From: {{ $message->email }}
                    <span class="mailbox-read-time float-right">{{ $message->created_at }}</span></h6>
                </div>

                <!-- /.mailbox-controls -->
                <div class="mailbox-read-message">
                    {{ $message->subject }}
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

