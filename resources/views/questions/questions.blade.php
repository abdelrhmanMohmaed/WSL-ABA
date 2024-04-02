@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h5 class="m-0" style="display: inline;">قائمة الأسئلة الشائعة</h5>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary" style="float: left;">
                     إضافة سؤال 
                     <i class="fas fa-plus"></i>
                </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>السؤال بالعربية</th>
                  <th>الإجابة بالعربية</th>
                  <th>النوع</th>
                  {{-- <th>التاريخ</th> --}}
                  <th>التحكم</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $key => $d)
                    <tr>
                      <td>{{$d->question_ar}}</td>
                      <td>{{ Str::limit($d->answer_ar,40)}}</td>
                      <td>{!!UserType($d->type)!!}</td>
                      {{-- <td> <span class="badge badge-success">{{Date::parse($d->created_at)->diffForHumans()}}</span></td> --}}
                      <td>
                        <a href           = "" 
                        class             = "btn btn-info btn-sm edit"
                        data-toggle       = "modal"
                        data-target       = "#modal-update"
                        data-id           = "{{$d->id}}"
                        data-question_ar  = "{{$d->question_ar}}"
                        data-question_en  = "{{$d->question_en}}"
                        data-answer_ar    = "{{$d->answer_ar}}"
                        data-answer_en    = "{{$d->answer_en}}"
                        data-type         = "{{$d->type}}"
                        > <i class="fas fa-edit"></i></a>
                        <a href="{{ route('deletequestions',$d->id) }}"  class="btn btn-danger btn-sm delete"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                @endforeach
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>

      {{-- add area modal --}}
      <div class="modal fade" id="modal-primary">
        <div class="modal-dialog">
          <div class="modal-content bg-primary">
            <div class="modal-header">
              <h4 class="modal-title">إضافة سؤال جديد</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('storequestions') }}" enctype='multipart/form-data' method="post">
                {{csrf_field()}}
                <div class="row">

                  <div class="col-sm-12">
                    <label>السؤال بالعربية</label> <span class="text-danger">*</span>
                    <input type="text" name="question_ar" class="form-control" placeholder=" السؤال بالعربية " required="" maxlength="190" style="margin-bottom: 10px">
                  </div>

                  <div class="col-sm-12">
                    <label>السؤال بالإنجليزية</label> <span class="text-danger">*</span>
                    <input type="text" name="question_en" class="form-control" placeholder=" السؤال بالإنجليزية " required="" maxlength="190" style="margin-bottom: 10px">
                  </div>

                  <div class="col-sm-12">
                    <label>النوع</label> <span class="text-danger">*</span>
                    <select name="type" class="form-control" style="margin-bottom: 10px">
                        <option value="user">مستخدم</option>
                        <option value="provider">مقدم خدمة</option>
                    </select>
                  </div>

                  <div class="col-sm-12">
                    <label> الإجابة بالعربية </label> <span class="text-danger">*</span>
                    <textarea name="answer_ar" rows="3" class="form-control" placeholder=" الإجابة بالعربية " required="" style="margin-bottom: 10px"></textarea>
                  </div>
                  <div class="col-sm-12">
                    <label> الإجابة بالإنجليزية </label> <span class="text-danger">*</span>
                    <textarea name="answer_en" rows="3" class="form-control" placeholder=" الإجابة بالإنجليزية " required="" style="margin-bottom: 10px"></textarea>
                  </div>

                </div>
                <button type="submit" id="submit" style="display: none;"></button>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light save">حفظ</button>
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">إغلاق</button>
            </div>
          </div>
        </div>
      </div>

      {{-- update area modal --}}
      <div class="modal fade" id="modal-update">
        <div class="modal-dialog">
          <div class="modal-content bg-info">
            <div class="modal-header">
              <h4 class="modal-title">تعديل سؤال : <span class="item_name"></span></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('updatequestions') }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="edit_id" value="">
                    <div class="row">

                        <div class="col-sm-12">
                          <label>السؤال بالعربية</label> <span class="text-danger">*</span>
                          <input type="text" name="edit_question_ar" class="form-control" required="" maxlength="190" style="margin-bottom: 10px">
                        </div>
      
                        <div class="col-sm-12">
                          <label>السؤال بالإنجليزية</label> <span class="text-danger">*</span>
                          <input type="text" name="edit_question_en" class="form-control"  required="" maxlength="190" style="margin-bottom: 10px">
                        </div>
      
                        <div class="col-sm-12">
                          <label>النوع</label> <span class="text-danger">*</span>
                          <select name="edit_type" class="form-control" style="margin-bottom: 10px">
                              <option value="user">مستخدم</option>
                              <option value="provider">مقدم خدمة</option>
                          </select>
                        </div>
      
                        <div class="col-sm-12">
                          <label> الإجابة بالعربية </label> <span class="text-danger">*</span>
                          <textarea name="edit_answer_ar" rows="3" class="form-control" required="" style="margin-bottom: 10px"></textarea>
                        </div>
                        <div class="col-sm-12">
                          <label> الإجابة بالإنجليزية </label> <span class="text-danger">*</span>
                          <textarea name="edit_answer_en" rows="3" class="form-control" required="" style="margin-bottom: 10px"></textarea>
                        </div>
      
                      </div>

                    <button type="submit" id="update" style="display: none;"></button>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light update">{{ __('messages.update') }}</button>
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">إغلاق</button>
            </div>
          </div>
        </div>
      </div>

    </div>
@endsection

@section('script')
<script type="text/javascript">

  $('.save').on('click',function(){
    $('#submit').click();
  })

  $('.edit').on('click',function(){

    var id            = $(this).data('id')
    var question_ar   = $(this).data('question_ar')
    var question_en   = $(this).data('question_en')
    var answer_ar     = $(this).data('answer_ar')
    var answer_en     = $(this).data('answer_en')
    var type          = $(this).data('type')
  
    $('.item_name')                      .text(question_ar)
    $("input[name='edit_id']")           .val(id)
    $("input[name='edit_question_ar']")  .val(question_ar) 
    $("input[name='edit_question_en']")  .val(question_en)
    $("textarea[name='edit_answer_ar']") .val(answer_ar)
    $("textarea[name='edit_answer_en']") .val(answer_en)

    $("select[name='edit_type'] > option").each(function() {
      if($(this).val() == type)
      {
        $(this).attr("selected","")
      }else{
        $(this).removeAttr("selected")
      }
    });

  })

  $('.update').on('click',function(){
      $('#update').click();
  })
</script>
@endsection

