@extends('layouts.app')
@section('style')

<style type="text/css">
	.contacts{direction: ltr !important;}
    .newc{direction: ltr !important;}
    .vcentered{
        direction: ltr !important;
        text-align: left;
    
    }
</style>
@endsection
@section('content')
	<div class="row">
		<div class="col-sm-12">
    <div class="container">
    <div class="panel messages-panel">
        <div class="contacts-list">
            <div class="inbox-categories">
                <div data-toggle="tab" class="acts" data-target="#inbox"  class="active"> محادثاتي </div>
                <div data-toggle="tab" class="acts" data-target="#sent"> الكل </div>
            
            </div>
            <div class="tab-content">
                <div id="inbox" class="contacts-outter-wrapper tab-pane active">
                   
                    <div class="contacts-outter">
                        <ul class="list-unstyled contacts">
                        @foreach($chats as $key => $value)
                          @if($value->one_id == auth()->user()->id)
                            <li data-id="{{$value->tow_id}}" class="newc">
                            <img alt="" class="img-circle medium-image" src="{{asset('uploads/users/avatar/'.$value->towUser->avatar)}}">
                            <div class="vcentered info-combo">
                                    <h3 class="no-margin-bottom name"> {{$value->towUser->name}} </h3>
                          
                                    <h5 class="mass_{{$value->id}}"> {{$value->Massages->last()->message}} </h5>
                                </div>
                              
                            </li>
                            @else
                            <li data-id="{{$value->one_id}}" class="newc">
                            <img alt="" class="img-circle medium-image" src="{{asset('uploads/users/avatar/'.$value->oneUser->avatar)}}">
                            <div class="vcentered info-combo">
                                    <h3 class="no-margin-bottom name"> {{$value->oneUser->name}} </h3>
                          

                               
                                    <h5 class="mass_{{$value->id}}"> {{$value->Massages->last()->message}} </h5>
                                </div>
                              
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div id="sent" class="contacts-outter-wrapper tab-pane">
                    
                    <div class="contacts-outter">
                        <ul class="list-unstyled contacts success">
                          @foreach($users as $key => $value)
                          @if($value->id != auth()->user()->id)
                            <li data-id="{{$value->id}}" class="newc">
                                <img alt="" class="img-circle medium-image" src="{{asset('uploads/users/avatar/'.$value->avatar)}}">

                                <div class="vcentered info-combo">
                                    <h3 class="no-margin-bottom name">{{$value->name}} </h3>
                                </div>
                                
                            </li>
                            @endif
                          @endforeach

                        </ul>
                    </div>
                </div>
               
            </div>
        </div>

            <div class="message-body">
                <div class="message-top">
                  
                    <div class="new-message-wrapper">
                      

                        <div class="chat-footer new-message-textarea">
                            <textarea class="send-message-text"></textarea>
                            <label class="upload-file">
                                <input type="file" required="">
                                <i class="fa fa-paperclip"></i>
                            </label>
                            <button type="button" class="send-message-button btn-info"> <i class="fa fa-send"></i> </button>
                        </div>
                    </div>
                </div>

                <div class="message-chat">
                   
                </div>
            </div>
            {{csrf_field()}}

    </div>
</div>
		</div>
	</div>
@endsection

@section('script')
<script src="https://momentjs.com/downloads/moment.min.js"></script>

<script>
$(".acts").click(function(){
  $(".contacts-outter-wrapper").toggleClass("active");
});

$('.newc').on('click',function(){
        var id         = $(this).data('id');
        $.get("{{url('admin/get-message-chat')}}/"+id
        ,function(s, status){

            console.log(s);
            $('.chat-body').html(' ');
            $.each(s,function(k,v){
                $('.chat-body').addClass( 'chat_' + v.chat_id + 'id_{{auth()->user()->id}}' );
              if(v.senduser.id == "{{auth()->user()->id}}"){
                $('.chat-body').append(`
                  <div class="message info">
                      <img alt="" class="img-circle medium-image" src="{{asset('uploads/users/avatar/')}}/${v.senduser.avatar}">

                      <div class="message-body">
                          <div class="message-info">
                              <h4>  ${v.senduser.name} </h4>
                              <h5> <i class="fa fa-clock-o"></i>  ${moment(v.created_at).format('LT')} </h5>
                          </div>
                          <hr>
                          <div class="message-text">
                          ${v.message}
                          </div>
                      </div>
                      <br>
                  </div>
                  `);
          
              }else{
                $('.chat-body').append(`
                  <div class="message my-message">
                      <img alt="" class="img-circle medium-image" src="{{asset('uploads/users/avatar/')}}/${v.senduser.avatar}">

                      <div class="message-body">
                          <div class="message-info">
                              <h4>  ${v.senduser.name} </h4>
                              <h5> <i class="fa fa-clock-o"></i>  ${moment(v.created_at).format('LT')} </h5>
                          </div>
                          <hr>
                          <div class="message-text">
                          ${v.message}
                          </div>
                      </div>
                      <br>
                  </div>
            `);
            $(".chat-body").animate({ scrollTop: $('.chat-body')[0].scrollHeight}, 50);
              }
          
        }); 
        });
        $('.message-chat').html(' ');
        $('.message-chat').append(`
        <div class="chat-body">
        </div>

        <div class="chat-footer">
        {{csrf_field()}}

            <input type="hidden" name="user_id" value="${id}">

            <input type="text" class="send-message-text" name="message">
           
            <button type="button"  id="chatInput" class="send-message-button btn-info sendmassage"> <i class="fas fa-paper-plane"></i> </button>

            </div>
        
        `);
        
    })

    $(document).on('click','.sendmassage', function(){

      var id         = $('input[name="user_id"]').val();
      var message    = $('input[name="message"]').val();
      if(message  === ''){

        toastr.error('يجب إدخال رسالة')

      }else{
       
        $.get("{{url('admin/send-message-chat')}}/"+id+"/"+message
                ,function(s, status){

                    $('.chat-body').addClass( 'chat_' + s.chat_id + 'id_{{auth()->user()->id}}' );

                        let ip_address = '127.0.0.1';
                        let socket_port = '3000';
                        let socket = io(ip_address + ':' + socket_port);
                        socket.emit('sendmessageToServer', {
                            message: s.message,
                            chat_id: s.chat_id,
                            send_id: s.send_id,
                            to_id: s.to_id,
                            name: s.senduser.name,
                            created_at: s.created_at,
                            avatar: s.senduser.avatar,
                        });
                        $('input[name="message"]').val("");
                   
        
        
        });
      

        }});
        let ip_address = '127.0.0.1';
        let socket_port = '3000';
        let socket = io(ip_address + ':' + socket_port);
        socket.on('sendmessageToServer', function(data){
            $('.chat_' + data.chat_id + 'id_' + data.send_id).append(`
                <div class="message info">
                    <img alt="" class="img-circle medium-image" src="{{asset('uploads/users/avatar/')}}/${data.avatar}">

                    <div class="message-body">
                        <div class="message-info">
                            <h4>  ${data.name} </h4>
                            <h5> <i class="fa fa-clock-o"></i>  ${moment(data.created_at).format('LT')} </h5>
                        </div>
                        <hr>
                        <div class="message-text">
                        ${data.message}
                        </div>
                    </div>
                    <br>
                </div>
            `);

            $('.chat_' + data.chat_id + 'id_' + data.to_id).append(`
                <div class="message  my-message">
                    <img alt="" class="img-circle medium-image" src="{{asset('uploads/users/avatar/')}}/${data.avatar}">

                    <div class="message-body">
                        <div class="message-info">
                            <h4>  ${data.name} </h4>
                            <h5> <i class="fa fa-clock-o"></i>  ${moment(data.created_at).format('LT')} </h5>
                        </div>
                        <hr>
                        <div class="message-text">
                        ${data.message}
                        </div>
                    </div>
                    <br>
                </div>
            `);

            $('.mass_' + data.chat_id).html(data.message);

            $(".chat-body").animate({ scrollTop: $('.chat-body')[0].scrollHeight}, 50);
        });

        
            
</script>
@endsection