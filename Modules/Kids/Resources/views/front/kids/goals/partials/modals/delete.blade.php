<div class="delete-model">
    <div class="delete-form h-100">
        <div class="container mw-100 d-flex justify-content-center align-items-center h-100">
            <div class="row w-50 justify-content-center h-100">
                <form
                    class="w-50 m-auto mx-2 bg-white rounded-4 pt-5 pb-2 h-50 d-flex justify-center align-content-center"
                    action="{{ route('kids.treatment-plans.goals.destroy') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-12 text-center">
                            <img width="80" height="80" src="{{ asset('dist/front/assets/images/Group.png') }}" />
                        </div>

                        <div class="form-group col-12 text-center">
                            <span style="font-weight: bolder" class="pb-2">هل انت متأكد أنك تريد حذف هذا الهدف؟</span>
                            <br>
                            <span style="color: #C4C4C4">لا يمكن التراجع عن هذه الخطوة.</span>
                        </div>

                        <input type="hidden" name="goal" class="goal" />

                        <button style="background: #D82C2C" type="submit"
                            class="btn w-75 text-center m-auto btn-danger">
                            حذف
                        </button>
                        <div type="button" class="btn-cancel w-75 text-center m-auto">
                            الغاء
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
