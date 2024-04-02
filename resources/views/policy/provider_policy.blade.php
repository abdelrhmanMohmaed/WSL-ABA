@extends('layouts.app')

@section('content')

  <div class="card card-primary card-outline">

    <div class="card-header">
        <h5 class="m-0" style="display: inline;">شروط وأحكام مقدمي الخدمات</h5>
    </div>

    <div class="card-body p-0">
        <div class="grid" style="padding: 15px">
            <form action="{{ route('updateproviderpolicy') }}" method="post">
                @csrf()
                <div class="row">
                    <div class="col-sm-6">
                        <label>الشروط والأحكام بالعربية</label>
                        <textarea class="form-control"  name="policy_ar" id="editor1" rows="10" cols="80" >{{ $data->provider_policy_ar }}</textarea>
                    </div>
                    <div class="col-sm-6">
                        <label>الشروط والأحكام بالإنجليزية</label>
                        <textarea class="form-control"  name="policy_en" id="editor1" rows="10" cols="80" >{{ $data->provider_policy_ar }}</textarea>
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
  CKEDITOR.replace( 'policy_ar',option );
  CKEDITOR.replace( 'policy_en',option );
</script>

@endsection
