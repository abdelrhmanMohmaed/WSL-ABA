@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h5 class="m-0" style="display: inline;">قائمة البنوك</h5>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary" style="float: left;">
                    إضافة بنك 
                     <i class="fas fa-plus"></i>
                </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>إسم البنك</th>
                  <th>إسم المستفيد</th>
                  <th>رقم الحساب</th>
                  <th>أي بان</th>
                  <th>التحكم</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $key => $d)
                    <tr>
                      <td>{{$d->bank_name}}</td>
                      <td>{{$d->beneficiary_name}}</td>
                      <td>{{$d->account_number}}</td>
                      <td>{{$d->iban}}</td>
                      <td style="line-height: 65px">
                        <a href                = "" 
                        class                  = "btn btn-info btn-sm edit"
                        data-toggle            = "modal"
                        data-target            = "#modal-update"
                        data-id                = "{{$d->id}}"
                        data-bank_name         = "{{$d->bank_name}}"
                        data-beneficiary_name  = "{{$d->beneficiary_name}}"
                        data-account_number    = "{{$d->account_number}}"
                        data-iban              = "{{$d->iban}}"
                        > <i class="fas fa-edit"></i></a>
                        <a href="{{ route('deletebank',$d->id) }}"  class="btn btn-danger btn-sm delete"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                @endforeach
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>

      {{-- add modal --}}
      <div class="modal fade" id="modal-primary">
        <div class="modal-dialog">
          <div class="modal-content bg-primary">
            <div class="modal-header">
              <h4 class="modal-title">إضافة بنك جديد</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('storebank') }}" enctype='multipart/form-data' method="post">
                {{csrf_field()}}
                <div class="row">
                    
                  <div class="col-sm-12">
                    <label>إسم البنك</label> <span class="text-danger">*</span>
                    <input type="text" name="bank_name" class="form-control" placeholder="إسم البنك" required="" maxlength="190" style="margin-bottom: 10px">
                  </div>

                  <div class="col-sm-12">
                    <label>إسم المستفيد</label> <span class="text-danger">*</span>
                    <input type="text" name="beneficiary_name" class="form-control" placeholder="إسم المستفيد" required="" maxlength="190" style="margin-bottom: 10px">
                  </div>

                  <div class="col-sm-12">
                    <label>رقم الحساب</label> <span class="text-danger">*</span>
                    <input type="text" name="account_number" class="form-control" placeholder="رقم الحساب" required="" maxlength="190" style="margin-bottom: 10px">
                  </div>


                  <div class="col-sm-12">
                    <label>أي بان</label> <span class="text-danger">*</span>
                    <input type="text" name="iban" class="form-control" placeholder="أي بان" required="" maxlength="190" style="margin-bottom: 10px">
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

      {{-- update modal --}}
      <div class="modal fade" id="modal-update">
        <div class="modal-dialog">
          <div class="modal-content bg-info">
            <div class="modal-header">
              <h4 class="modal-title">تعديل بنك : <span class="item_name"></span></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('updatebank') }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="edit_id" value="">
                    <div class="row">

                        <div class="col-sm-12">
                            <label>إسم البنك</label> <span class="text-danger">*</span>
                            <input type="text" name="edit_bank_name" class="form-control" placeholder="إسم البنك" required="" maxlength="190" style="margin-bottom: 10px">
                        </div>

                        <div class="col-sm-12">
                            <label>إسم المستفيد</label> <span class="text-danger">*</span>
                            <input type="text" name="edit_beneficiary_name" class="form-control" placeholder="إسم المستفيد" required="" maxlength="190" style="margin-bottom: 10px">
                        </div>

                        <div class="col-sm-12">
                            <label>رقم الحساب</label> <span class="text-danger">*</span>
                            <input type="text" name="edit_account_number" class="form-control" placeholder="رقم الحساب" required="" maxlength="190" style="margin-bottom: 10px">
                        </div>


                        <div class="col-sm-12">
                            <label>أي بان</label> <span class="text-danger">*</span>
                            <input type="text" name="edit_iban" class="form-control" placeholder="أي بان" required="" maxlength="190" style="margin-bottom: 10px">
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
      var id                = $(this).data('id')
      var bank_name         = $(this).data('bank_name')
      var beneficiary_name  = $(this).data('beneficiary_name')
      var account_number    = $(this).data('account_number')
      var iban              = $(this).data('iban')

      $('.item_name')                          .text(bank_name)
      $("input[name='edit_id']")               .val(id)
      $("input[name='edit_bank_name']")        .val(bank_name) 
      $("input[name='edit_beneficiary_name']") .val(beneficiary_name) 
      $("input[name='edit_account_number']")   .val(account_number) 
      $("input[name='edit_iban']")             .val(iban) 
  })

  $('.update').on('click',function(){
      $('#update').click();
  })
</script>
@endsection

