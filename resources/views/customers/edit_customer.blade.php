@extends('layouts.app')

@section('style')
<style type="text/css">
	#avatar{
		width: 150px;
	}
	#avatar:hover{
		width: 150px;
		cursor: pointer;
	}
</style>
@endsection

@section('content')
	<div class="card card-primary card-outline">
	 <div class="card-header">
		<h6 class="m-0" style="display: inline;">تعديل مشتري <span class="text-primary"> {{$data->name}} </span></h6>
	</div> 
		<div class="row">
			{{-- user info --}}
			<div class="col-sm-3" style="margin-top: 15px">
				<div class="card card-primary card-outline">
					<div class="card-body box-profile">
					<div class="text-center">
						<img class="profile-user-img img-fluid img-circle" src="{{asset('uploads/customers/avatar/'.$data->avatar)}}" alt="User profile picture">
					</div>

					<h3 class="profile-username text-center">{{$data->name}}</h3>

					<ul class="list-group list-group-unbordered mb-3">
						<li class="list-group-item">
						<b>تاريخ التسجيل</b> <a class="float-right text-primary">{{Date::parse($data->created_at)->diffForHumans()}}</a>
						</li>

						<li class="list-group-item">
						
						</li>
						

					</ul>
					</div>
					<!-- /.card-body -->
				</div>
			</div>

			<div class="col-sm-9">
				<div class="card-body">
					<form action="{{route('updatecustomers')}}" method="post" enctype="multipart/form-data">
						<div class="row">
							{{csrf_field()}}
							<input type="hidden" name="id" value="{{$data->id}}">
							
							{{-- avatar --}}
							<div class="col-sm-6" style="margin-top: 10px">
								<div class="from-group">
									<label class="text-primary">إختيار صورة <span class="text-primary"> * </span></label>
									<input type="file" name="avatar" accept="image/*" class="form-control">
								</div>
							</div>

							{{-- name --}}
							<div class="col-sm-4">
								<div class="from-group">
									<label class="text-primary">الاسم الاول  : <span class="text-danger">*</span></label>
									<input type="text" name="name_f" class="form-control" value="{{$data->name_f}}" placeholder="إسم المستخدم " required="">
								</div>
							</div>
							<div class="col-sm-4">
								<div class="from-group">
									<label class="text-primary"> الاسم الأخير : <span class="text-danger">*</span></label>
									<input type="text" name="name_l" class="form-control" value="{{$data->name_l}}" placeholder="إسم المستخدم " required="">
								</div>
							</div>


							{{-- email --}}
							<div class="col-sm-6" style="margin-top: 10px">
								<div class="from-group">
									<label class="text-primary">البريد الإلكتروني : <span class="text-danger">*</span></label>
									<input type="email" name="email" class="form-control" value="{{$data->email}}" required placeholder="البريد الإلكتروني" >
								</div>
							</div>
							
						

							{{-- password --}}
							<div class="col-sm-4" style="margin-top: 10px">
								<div class="from-group">
									<label class="text-primary">كلمة المرور : <span class="text-danger">*</span></label>
									<input type="text" name="password" class="form-control" value="" placeholder="كلمة المرور" >
								</div>
							</div>

							{{-- active --}}
							<div class="col-sm-4" style="margin-top: 10px">
								<div class="from-group">
									<label class="text-primary">الحالة : <span class="text-danger">*</span></label>
									<select class="form-control" name="active" id="active">
										<option value="1" @if($data->active == 1) selected @endif>نشط</option>
										<option value="0" @if($data->active == 0) selected @endif>حظر</option>
									</select>
								</div>
							</div>

							<div class="col-sm-6" style="margin-top: 10px">
								<label class="text-primary">  الدول <span class="text-danger">*</span></label>
								<select name="country_id" class="form-control country" required>
									<option value="" disabled selected>إختيار دولة</option>
									@foreach($countries as $value)
										<option value="{{$value->id}}" @if($data->country_id == $value->id) selected @endif>{{$value->name}}</option>
									@endforeach
								</select>
							</div>
							<div class="col-sm-6" style="margin-top: 10px">
								<label class="text-primary"> المحافظة <span class="text-danger">*</span></label>
								<select name="city_id" class="form-control cities" required>

								</select>
							</div>

							{{-- submit --}}
							<div class="col-sm-4 offset-3" style="margin-top: 20px">
								<button class="btn btn-outline-primary btn-block">حفظ</button>
							</div>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>
@endsection

@section('script')
<script type="text/javascript">
	//choose avatar
	function ChooseAvatar(){$("input[name='avatar']").click()}
	var loadAvatar = function(event) {
		var output = document.getElementById('avatar');
		output.src = URL.createObjectURL(event.target.files[0]);
	};


	@if($data->country_id != null)

// get cities
function GetDefaultsubSections()
{
	var data = {
		country    : {{$data->country_id}},
		_token        : $("input[name='_token']").val()
	}
	
		$.ajax({
		url     : "{{ route('Getcities') }}",
		method  : 'post',
		data    : data,
		success : function(s,result){
			$('.cities').html('')
			$('.cities').append(`
			`);
			$.each(s,function(k,v){
			if(v.id == "{{$data->city_id}}")
			{
				$('.cities').append(`
					<option value="${v.id}" selected>${v.name}</option>
				`);
			}else{
				$('.cities').append(`
					<option value="${v.id}">${v.name}</option>
				`);
			}
		})
	}});
}
GetDefaultsubSections()
@endif


// get sub sections
$(document).on('change','.country', function(){

var data = {
country    : $(this).val(),
_token        : $("input[name='_token']").val()
}


    $.ajax({
    url     : "{{ route('Getcities') }}",
    method  : 'post',
    data    : data,
    success : function(s,result){
        $('.cities').html('')
        $('.cities').append(`
        `);
        $.each(s,function(k,v){
        $('.cities').append(`
            <option value="${v.id}">${v.name}</option>
        `);
    })
    }});

});

	
</script>
@endsection


