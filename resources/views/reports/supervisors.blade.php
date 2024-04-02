@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-sm-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h5 class="m-0" style="display: inline;">قائمة المشرفين</h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>الصوره</th>
                  <th>الإسم</th>
                  <th>الصلاحيه</th>
                  <th>التحكم</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $key => $value)
	                <tr>
	                  <td>{{$key+1}}</td>
	                  {{-- <td>{{$value->avatar}}</td> --}}
	                  <td style="padding-top: 1px"><img alt="Avatar" class="table-avatar" src="{{asset('uploads/users/avatar/'.$value->avatar)}}" style="border-radius: 50%;display: inline;width: 2.5rem;"></td>
	                  <td>{{$value->name}}</td>
	                  @if($value->Role)
	                  	<td>{{$value->Role->role}}</td>
	                  @else
	                  	<td>بدون</td>
	                  @endif
	                  <td>
		                <a href="{{route('reports',$value->id)}}" class="btn btn-success btn-sm " type="submit">  التقارير <i class="fas fa-eye"></i></a>
		                <a href="{{route('edittsupervisors',$value->id)}}" class="btn btn-primary btn-sm " type="submit">  الملف الشخصي <i class="fas fa-edit"></i></a>
	                  </td>
	                </tr>
                @endforeach
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
		</div>
	</div>
@endsection

@section('javascript')
<script type="text/javascript">

</script>
@endsection