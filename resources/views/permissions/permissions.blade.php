@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
            <h3 class="m-0" style="display: inline;">قائمة الصلاحيات</h3>
            </div>

            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th >إسم الصلاحية</th>
                            <th>التاريخ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $key => $value)
                        <tr>
                            <td>
                                {{$key + 1}}
                            </td>
                            <td>
                                <a>
                                    {{$value->role}}
                                </a>
                            </td>

                            <td class="project-state">
                                <span class="badge badge-success">{{Date::parse($value->created_at)->diffForHumans()}}</span>
                            </td>

                            <td class="project-actions text-right">
                                    <a href="{{route('editrolepage',$value->id)}}" class="btn btn-primary btn-sm " type="submit">  تعديل <i class="fas fa-edit"></i></a>
                                <form action="{{route('deletepermission')}}" method="post" style="display: inline-block;">
                                    {{csrf_field()}}
                                    <input type="hidden" name="id" value="{{$value->id}}">
                                    <button class="btn btn-danger btn-sm delete" type="submit">  حذف <i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
