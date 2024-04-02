@if (count($errors) > 0 || Session::has('danger') || Session::has('warning') || Session::has('success') || Session::has('info'))
<div class="content " style="margin-bottom: 20px">

	<!-- Aalert Messages -->
	@foreach (['danger', 'warning', 'success', 'info'] as $msg)
		@if(Session::has($msg))

		  <div class="alert alert-{{ $msg }} alert-styled-right alert-arrow-right alert-bordered text-center bounceIn">
		    <button type="button" class="close pull-left" data-dismiss="alert" ><span style="font-size: 35px;line-height: 53px;color: red;">×</span><span class="sr-only">إغلاق</span></button>
		    <strong style="line-height: 50px;">{{ Session::get($msg) }} {{ Session::forget($msg) }} </strong>
		  </div>
		@endif
	@endforeach

	<!-- Vaildtions Messages  -->
	@if (count($errors) > 0)
	    <div class="alert alert-danger alert-styled-right alert-arrow-right text-center bounceIn" >
			<button type="button" class="close pull-left" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="color:#fff">×</span>
		    </button>
	        <ul style="margin-right: 10px; list-style: none">
	            @foreach ($errors->all() as $error)
	                <li >{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
</div>
@endif