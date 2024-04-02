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
			<h5 class="m-0" style="display: inline;">إضافة مشتري جديد</h5>
		</div>

		<div class="card-body">
			<form action="{{route('storecustomers')}}" method="post" enctype="multipart/form-data">
				<div class="row">
					{{csrf_field()}}

					{{-- avatar --}}
					<div class="col-sm-4" style="margin-top: 10px">
						<div class="from-group">
							<label class="text-primary">إختيار صورة <span class="text-primary"> * </span></label>
							<input type="file" name="avatar" accept="image/*" class="form-control">
						</div>
					</div>

					{{-- name --}}
					<div class="col-sm-4" style="margin-top: 10px">
						<div class="from-group">
							<label class="text-primary">الأسم الأول  : <span class="text-danger">*</span></label>
							<input type="text" name="name_f" class="form-control" value="{{old('name_f')}}" placeholder="إسم المستخدم " required="">
						</div>
					</div>
					<div class="col-sm-4" style="margin-top: 10px">
						<div class="from-group">
							<label class="text-primary"> الأسم الأخير : <span class="text-danger">*</span></label>
							<input type="text" name="name_l" class="form-control" value="{{old('name_l')}}" placeholder="إسم المستخدم " required="">
						</div>
					</div>


					{{-- email --}}
					<div class="col-sm-4" style="margin-top: 10px">
						<div class="from-group">
							<label class="text-primary">البريد الإلكتروني : <span class="text-danger">*</span></label>
							<input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="البريد الإلكتروني" required>
						</div>
					</div>

					{{-- password --}}
					<div class="col-sm-4" style="margin-top: 10px">
						<div class="from-group">
							<label class="text-primary">كلمة المرور : <span class="text-danger">*</span></label>
							<input type="text" name="password" class="form-control" value="{{old('password')}}" placeholder="كلمة المرور" required="">
						</div>
					</div>

					<div class="col-sm-6" style="margin-top: 10px">
						<label class="text-primary">  الدول <span class="text-danger">*</span></label>
						<select name="country_id" class="form-control country" required>
							<option value="" disabled selected>إختيار دولة</option>
							@foreach($countries as $value)
								<option value="{{$value->id}}">{{$value->name}}</option>
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

@endsection

@section('script')

@section('script')
<script type="text/javascript">
	function ChooseAvatar(){$("input[name='avatar']").click()}
	var loadAvatar = function(event) {
		var output = document.getElementById('avatar');
		output.src = URL.createObjectURL(event.target.files[0]);
	};

	
// get cities
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


