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
							<input type="text" name="role" class="form-control" required="">
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

				{{Permissions()}}
				<div class="col-sm-4 offset-4" style="margin-top:20px">
					<button class="btn btn-outline-primary btn-block add_permission" type="submit">اضافه</button>
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

		$('.add_permission').on('click',function(){
			var role = $('input[name="role"]').val()
			var ids = [];
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
	       	  //$('.real_content').css('display','none')
      		  //$('.loading').css('display','block')
			  $.post("{{url('admin/add-permission')}}",{_token:"{{csrf_token()}}",ids:ids,role:role},function(data, status){
			    //$('.real_content').css('display','block')
      		    //$('.loading').css('display','none')
      		    if(status === 'success')
      		    {
      		    	toastr.success('تم حفظ الصلاحيه بنجاح')
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