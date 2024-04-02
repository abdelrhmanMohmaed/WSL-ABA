<div class="accomplishedPlan-form">
    <div class="accomplishedPlan-register-form pt-0">
        <div class="container">
            <div style="height: 100vh" class="row">
                <form style="height: 620px" action="{{route('kids.treatment-plans.goals.accomplishedGoals.update')}}"
                      method="post"
                      class="mt-5">
                    @csrf
                    <legend class="titleModel" style="font-weight: bolder;margin-top: 30px;padding-right: 25px" class="mt-5 me-5 pe-3 ">
                        A1 المهمة
                    </legend>

                    <div class="row container me-1">
                        <div class="form-group col-12 ">
                            <label for="target" style="font-weight: bolder">الهدف</label>
                            <input type="text" name="target" disabled
                                   class="form-control w-100 target" placeholder="أدخل الهدف الجديدً..."/>
                        </div>

                        <div class="col-12">
                            <div class="mx-2 mt-3">
                                <input class="form-check-input" type="radio" name="mastery" id="inlineRadio1" value="1">
                                <label class="form-check-label" for="inlineRadio1">اتقن</label>
                                &nbsp;
                                <input class="form-check-input" type="radio" name="mastery" id="inlineRadio2" value="0">
                                <label class="form-check-label" for="inlineRadio2">لم يتقن</label>
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <label for="stimulus" style="font-weight: bolder">التقرير</label>
                            <textarea placeholder="ادخل التقرير التابع لهذا الهدف هنا..."
                                      class="form-control" name="description" rows="9" cols="60"
                                      style="height: 250px"></textarea>
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
