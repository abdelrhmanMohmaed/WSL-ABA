@extends('layouts.app')

@section('content')

  <div class="card card-primary card-outline">

    <div class="card-header">
        @if(!is_null($user))
        <h5 class="m-0" style="display: inline;">تقارير المشرف <a href="{{route('edittsupervisors',$user->id)}}">{{$user->name}}</a></h5>
      @else
        <h5 class="m-0" style="display: inline;">قائمة التقارير</h5>
      @endif
      	{{-- delete all reports --}}
      	@if(count($reports) > 1 && $user)
	       <span class="card-title">
	       		<form action="{{route('deleteallreports')}}" method="post" style="display: inline;">
	       			{{csrf_field()}}
                       <input type="hidden" name="id" value="{{$user->id}}">
	                <button class="btn btn-danger btn-sm delete" type="submit">  حذف تقارير {{$user->name}} <i class="fas fa-trash"></i></button>
	       		</form>
	       </span>
        @else
        <span class="card-title">
            <form action="{{route('deleteallreports')}}" method="post" style="display: inline;">
                {{csrf_field()}}
                <input type="hidden" name="id">
             <button class="btn btn-danger btn-sm delete" type="submit">  حذف جميع التقارير  <i class="fas fa-trash"></i></button>
            </form>
        </span>
       @endif
    </div>

    <div class="card-body p-0">
      <table class="table table-striped projects">
          <thead>
              <tr>
                  <th style="width: 1%">
                     ID
                  </th>
                  <th style="width: 20%">
                      إسم المشرف
                  </th>
                  <th style="width: 60%">
                      الحدث
                  </th>
                  <th >
                      الوقت
                  </th>
                  <th style="width: 15%">
                  </th>
              </tr>
          </thead>
          <tbody>
          	@foreach($reports as $report)
              <tr>
                  <td>
                      {{$report->User ? $report->User->id : '-'}}
                  </td>
                  <td>
                      <a>
                          {{$report->User ? $report->User->name : '-'}}
                      </a>
                      <br>
                      <small class="badge badge-warning">
                        @if($report->User)
                            @if($report->User->Role)
                                {{$report->User->Role->role}}
                            @endif
                        @else
                            بدون
                        @endif
                      </small>
                  </td>

                  <td>
                  	<span class="badge badge-info">{{$report->event}}</span>
                  </td>

                  <td class="project-state">
                      <span class="badge badge-success">{{Date::parse($report->created_at)->format('h:m / Y-m-d')}}</span>
                  </td>

                  <td class="project-actions text-right">
                  	<form action="{{route('deletereport')}}" method="post" style="display: inline-block;">
                  		{{csrf_field()}}
                  		<input type="hidden" name="id" value="{{$report->id}}">
                  		<button class="btn btn-danger btn-sm delete" type="submit">  حذف <i class="fas fa-trash"></i></button>
                  	</form>

                  </td>
              </tr>
             @endforeach


          	@if(count($reports) == 0)
              <tr>
                  <td>
                  </td>
                  <td>
                  </td>

                  <td>
                  	<h4 >لا يوجد تقارير</h4>
                  </td>

                  <td class="project-state">
                  </td>

                  <td class="project-actions text-right">
                  </td>
              </tr>
          	@endif


          </tbody>
      </table>
      
    </div>

  </div>
        <div class="col-sm-12 text-center">
      	{{$reports->links()}}
      </div>

@endsection
