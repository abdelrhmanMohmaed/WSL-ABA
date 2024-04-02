<div class="fixed-form">
    <div class="register-form pt-0">
        <div class="container">
            <div style="height: 100vh" class="row">
                <form style="height: 500px" method="post" action="{{route('kids.treatment-plans.goals.store',$kid->id)}}" class="mt-5">
                    @csrf
                    <legend id="titleModel" style="font-weight: bolder" class="mt-5 me-5 pe-3 my-5">
                        A1 المهمة
                    </legend>
                    <p class="me-1">
                        ادخل الهدف و المثير التابع لهذه المهمة
                    </p>

                    <div class="row container me-1">
                        <div class="form-group col-12 ">
                            <label for="target" style="font-weight: bolder">الهدف</label>
                            <input type="text" name="target" id="target"
                                class="form-control bg-white-800" placeholder="أدخل الهدف الجديدً..." />
                        </div>
                        <div class="form-group col-12">
                            <label for="stimulus" style="font-weight: bolder">المثير SD</label>
                            <input type="text" name="stimulus" id="stimulus"
                                   class="form-control" placeholder="أدخل المثير..." />
                        </div>

                        <input type="hidden" name="appeal" id="task" />

                        <button style="background-color: #834E9A!important;" type="submit"
                                class="btn mt-5  mb-5 w-25 text-center m-auto btn-blue">
                            حفط واضافة
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
