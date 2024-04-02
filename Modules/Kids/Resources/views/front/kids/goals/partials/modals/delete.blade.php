<div class="delete-form">
    <div class="register-form pt-0">
        <div class="container">
            <div style="margin-top: 10%" class="row">
                <form action="{{route('kids.treatment-plans.goals.destroy')}}" method="post" class="mt-5">
                    @csrf
                    <div class="row container me-1 text-center">

                        <div class="form-group col-12 pt-5">
                            <img width="80" height="80" src="{{asset('dist/front/assets/images/Group.png')}}"/>
                        </div>

                        <div class="form-group col-12">
                            <span style="font-weight: bolder" class="pb-2">هل انت متاكد انك تريد حذف هذا الهدف</span>
                            <br>
                            <span style="color: #C4C4C4">لايمكن التراجع عن هذه الخطوه</span>
                        </div>

                        <input type="hidden" name="goal" class="goal"/>
                        <div class="form-group col-12">
                            <button style="background: #D82C2C" type="submit"
                                    class="btn w-75 text-center m-auto btn-danger">
                                حذف
                            </button>
                        </div>

                        <div class="form-group col-12 pb-5">
                            <div id="close" type="button"
                                    class=" w-75 text-center m-auto">
                                الغاء
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
