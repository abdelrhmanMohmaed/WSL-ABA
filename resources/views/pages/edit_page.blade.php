@extends('layouts.app')

@section('content')

  <div class="card card-primary card-outline">

    <div class="card-header">
        <h5 class="m-0" style="display: inline;">تعديل صفحة <span class="text-primary">{{ $data->title_ar }}</span></h5>
    </div>

    <div class="card-body p-0">
        <div class="grid" style="padding: 15px">
            <form action="{{ route('updatepage') }}" method="post">
                @csrf()
                <input type="hidden" value="{{ $data->id }}" name="id">
                <div class="row">

                    <div class="col-sm-5">
                        <label>العنوان بالعربية</label>
                        <input class="form-control"  name="title_ar" value="{{ $data->title_ar }}" required>
                    </div>

                    <div class="col-sm-5">
                        <label>العنوان بالإنجليزية</label>
                        <input class="form-control"  name="title_en" value="{{ $data->title_en }}" required>
                    </div>

                    <div class="col-sm-2">
                        <label>ظهور بالرئيسية</label>
                       <select name="show_main" class="form-control">
                           <option value="1" {{ $data->show_main == 1 ? 'selected' : '' }}>نعم</option>
                           <option value="0" {{ $data->show_main == 0 ? 'selected' : '' }}>لا</option>
                       </select>
                    </div>

                </div>

                <div class="row" style="margin-top: 15px">
                    <div class="col-sm-6">
                        <label>المحتوي بالعربية</label>
                        <textarea class="form-control"  name="content_ar" id="editor1" rows="10" cols="80" required>{{ $data->content_ar }}</textarea>
                    </div>
                    <div class="col-sm-6">
                        <label>المحتوي بالإنجليزية</label>
                        <textarea class="form-control"  name="content_en" id="editor1" rows="10" cols="80" required>{{ $data->content_ar }}</textarea>
                    </div>
                </div>

                <div class="row" style="text-align: center;padding:20px 0 10px 0">
                    <div class="col-sm-6 offset-3">
                        <button type="submit" class="btn btn-block btn-primary">حفظ</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

  </div>

  <script>
      var option = {
        language: 'ar',
        uiColor: '#9AB8F3'
      }
    CKEDITOR.replace( 'content_ar',option );
    CKEDITOR.replace( 'content_en',option );
  </script>

@endsection

