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
			<h5 class="m-0" style="display: inline;">إضافة مشرف جديد</h5>
		</div>

		<div class="card-body">
			<form action="{{route('storesupervisor')}}" method="post" enctype="multipart/form-data">
				<div class="row">
					{{csrf_field()}}

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
							<input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="إسم المشرف" required="">
						</div>
					</div>

					{{-- phone --}}
					<div class="col-sm-6" style="margin-top: 10px">
						<div class="from-group">
							<label class="text-primary">الجوال  : <span class="text-danger">*</span></label>
							<input type="text" name="phone" class="form-control" value="{{old('phone')}}" placeholder="الجوال" required="">
						</div>
					</div>

					{{-- permission --}}
					<div class="col-sm-6" style="margin-top: 10px">
						<div class="from-group">
							<label class="text-primary">الصلاحية : <span class="text-danger">*</span></label>
							<select class="form-control" name="role">
								{{-- <option value="0">بدون</option> --}}
								@foreach($roles as $value)
									<option value="{{$value->id}}">{{$value->role}}</option>
								@endforeach
							</select>
						</div>
					</div>

					{{-- email --}}
					<div class="col-sm-6" style="margin-top: 10px">
						<div class="from-group">
							<label class="text-primary">البريد الإلكتروني : <span class="text-primary">*</span></label>
							<input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="البريد الإلكتروني" >
						</div>
					</div>

					{{-- password --}}
					<div class="col-sm-3" style="margin-top: 10px">
						<div class="from-group">
							<label class="text-primary">كلمة المرور : <span class="text-danger">*</span></label>
							<input type="text" name="password" class="form-control" value="{{old('password')}}" placeholder="كلمة المرور" required="">
						</div>
					</div>

					{{-- active --}}
					<div class="col-sm-3" style="margin-top: 10px">
						<div class="from-group">
							<label class="text-primary">الحالة : <span class="text-danger">*</span></label>
							<select class="form-control" name="active">
								<option value="1">نشط</option>
								<option value="0">حظر</option>
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

@endsection

@section('script')

@endsection


