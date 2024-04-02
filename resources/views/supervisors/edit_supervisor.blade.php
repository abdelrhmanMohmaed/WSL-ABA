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
		<h6 class="m-0" style="display: inline;">تعديل مشرف <span class="text-primary"> {{$user->name}} </span></h6>
	</div>
		<div class="row">
			{{-- user info --}}
			<div class="col-sm-3" style="margin-top: 15px">
				<div class="card card-primary card-outline">
					<div class="card-body box-profile">
					<div class="text-center">
						<img class="profile-user-img img-fluid img-circle" src="{{asset('uploads/users/avatar/'.$user->avatar)}}" alt="User profile picture">
					</div>

					<h3 class="profile-username text-center">{{$user->name}}</h3>

					<p class="text-muted text-center">@if($user->Role){{$user->Role->role}}@else بدون @endif</p>

					<ul class="list-group list-group-unbordered mb-3">
						<li class="list-group-item">
						<b>تاريخ التسجيل</b> <a class="float-right text-primary">{{Date::parse($user->created_at)->diffForHumans()}}</a>
						</li>
						<li class="list-group-item">
						<b>التقارير</b> <a href="{{ route('reports',$user->id) }}" class="float-right text-primary">التقارير</a>
						</li>

					</ul>
					</div>
					<!-- /.card-body -->
				</div>
			</div>

			<div class="col-sm-9">
				<div class="card-body">
					<form action="{{route('updatesupervisor')}}" method="post" enctype="multipart/form-data">
						<div class="row">
							{{csrf_field()}}
							<input type="hidden" name="id" value="{{$user->id}}">
							
							{{-- avatar --}}
							<div class="col-sm-6" style="margin-top: 10px">
								<div class="from-group">
									<label class="text-primary">إختيار صورة <span class="text-primary"> * </span></label>
									<input type="file" name="avatar" accept="image/*" class="form-control">
								</div>
							</div>

							{{-- name --}}
							<div class="col-sm-6" style="margin-top: 10px">
								<div class="from-group">
									<label class="text-primary">إسم المشرف : <span class="text-danger">*</span></label>
									<input type="text" name="name" class="form-control" value="{{$user->name}}" placeholder="إسم المشرف" required="">
								</div>
							</div>

							{{-- email --}}
							<div class="col-sm-6" style="margin-top: 10px">
								<div class="from-group">
									<label class="text-primary">البريد الإلكتروني : <span class="text-primary">*</span></label>
									<input type="email" name="email" class="form-control" value="{{$user->email}}" placeholder="البريد الإلكتروني" >
								</div>
							</div>

							{{-- permission --}}
							<div class="col-sm-6" style="margin-top: 10px">
								<div class="from-group">
									<label class="text-primary">الصلاحية : <span class="text-danger">*</span></label>
									<select class="form-control" name="role" id="role">
										<option value="0">بدون</option>
										@foreach($roles as $value)
											<option value="{{$value->id}}" @if($user->role == $value->id) selected @endif>{{$value->role}}</option>
										@endforeach
									</select>
								</div>
							</div>

							{{-- phone --}}
							<div class="col-sm-6" style="margin-top: 10px">
								<div class="from-group">
									<label class="text-primary">الجوال : <span class="text-danger">*</span></label>
									<input type="text" name="phone" class="form-control" value="{{$user->phone}}" >
								</div>
							</div>

							{{-- password --}}
							<div class="col-sm-3" style="margin-top: 10px">
								<div class="from-group">
									<label class="text-primary">كلمة المرور : <span class="text-danger">*</span></label>
									<input type="text" name="password" class="form-control" value="{{old('password')}}" placeholder="كلمة المرور" >
								</div>
							</div>

							{{-- active --}}
							<div class="col-sm-3" style="margin-top: 10px">
								<div class="from-group">
									<label class="text-primary">الحالة : <span class="text-danger">*</span></label>
									<select class="form-control" name="active" id="active">
										<option value="1" @if($user->active == 1) selected @endif>نشط</option>
										<option value="0" @if($user->active == 0) selected @endif>حظر</option>
									</select>
								</div>
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
	function ChooseAvatar(){$("input[name='avatar']").click()}
	var loadAvatar = function(event) {
		var output = document.getElementById('avatar');
		output.src = URL.createObjectURL(event.target.files[0]);
	};
</script>
@endsection


