@extends('layouts.app')

@section('content')

<div class="container-fluid">
	<div class="card card-primary card-outline">
	    <div class="card-body">
		    <div class="row">
		    	<div class="col-sm-12">
		    		<div class="row">
						<div class="col-sm-10 " >
							<label>إسم الصلاحيه</label>
							<input type="text" value="{{$role->role}}" name="role" class="form-control" required="">
						</div>
				    	<div class="col-sm-2 " style="margin-top: 30px">
				    		<div class="form-group row">
								<div class="col-sm-8" style="margin-top: 6px">
									<label>تحديد الكل</label>
								</div>
								<div class="col-sm-4">
									<input type="checkbox" id="check_all" name="check_all" class="form-control">
								</div>
							</div>
						</div>
		    		</div>
		    	</div>

				{{EditPermissions($role->id)}}
				<div class="col-sm-4 offset-4" style="margin-top:20px">
					<button class="btn btn-outline-primary btn-block update_permission" type="submit">حفظ</button>
				</div>
			</div>
	    </div>
	</div>
</div>

@endsection

@section('script')
	<script type="text/javascript">

		$('#check_all').on('click',function(){
			$('input:checkbox').not(this).prop('checked', this.checked);
		})

		$('.father').on('click',function(){
			var id = $(this).data('id')
			$('.child'+id).not(this).prop('checked', this.checked);
		})

		$('.update_permission').on('click',function(){
			var role = $('input[name="role"]').val()
			var ids = [];
			var role_id = "{{$role->id}}"
	     	$('.permission:checkbox:checked').each(function(i){
	          ids[i] = $(this).val();
	        });

	        if(ids.length === 0)
	        {
		        toastr.error('يجب إختيار صلاحيات')
	        }else if(role === '')
	        {
	        	toastr.error('يجب إدخال إسم الصلاحية')
	        }else{
	       	  // $('.real_content').css('display','none')
      		  // $('.loading').css('display','block')
			  $.post("{{url('admin/update-permission')}}",{_token:"{{csrf_token()}}",id:role_id,ids:ids,role:role},function(data, status){
			    console.log('status',status)
			    console.log('data',data)
			    // $('.real_content').css('display','block')
      	// 	    $('.loading').css('display','none')
				if(status === 'success')
				{
					toastr.success('تم حفظ التعديلات بنجاح')
					setTimeout(function() 
					{
						location.replace("{{url('admin/permissions')}}")
					}, 500);
				}

			  });
	        }
		})
	</script>
@endsection