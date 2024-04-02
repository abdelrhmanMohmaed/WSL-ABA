<div class="fixed-form">
    <div class="register-form pt-0">
        <div class="container ">
            <div style="height: 100vh; margin-top: 90px" class="row">
                <form style="height: 300px;margin-top: 190px" action="{{route('kids.treatment-plans.goals.update')}}" method="post" class="mt-5">
                    @csrf
                    <legend class="titleModel" style="font-weight: bolder;margin-top: 30px;padding-right: 25px" class="mt-5 me-5 pe-3 ">
                        A1 المهمة
                    </legend>
                    <div class="row container me-1">
                        <div class="form-group col-12 ">
                            <label for="target" style="font-weight: bolder">الهدف</label>
                            <input type="text" name="target" class="target"
                                   class="form-control bg-white-800" placeholder="أدخل الهدف الجديدً..."/>
                        </div>


                        <input type="hidden" name="goal" class="goal"/>

                        <button style="background-color: #834E9A!important;" type="submit"
                                class="btn mt-5  mb-5 w-50 text-center m-auto btn-blue">
                            حفط
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
