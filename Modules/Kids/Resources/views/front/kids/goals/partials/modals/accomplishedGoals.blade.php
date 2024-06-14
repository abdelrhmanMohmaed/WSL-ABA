<div class="accomplishedPlan-model">
    <div class="accomplishedPlan-form">
        <div class="container">
            <div class="row vh-100 justify-content-center">
                <form class="w-50 m-auto mx-2 bg-white rounded-4"
                    action="{{ route('kids.treatment-plans.goals.accomplishedGoals.update') }}" method="post">
                    <div class="d-flex justify-content-end pt-3">
                        <button type="button" class="btn-close text-danger fw-bolder" aria-label="Close">x</button>
                    </div>
                    @csrf
                    <legend class="titleModel mt-4 pl-4" style="font-weight: bolder;">
                        A1 المهمة
                    </legend>

                    <div class="row container me-1 justify-content-center">
                        <div class="form-group col-12">
                            <label for="target" style="font-weight: bolder">الهدف</label>
                            <input type="text" name="target" disabled class="form-control w-100 target"
                                placeholder="أدخل الهدف الجديدً..." />
                        </div>

                        <div class="col-12">
                            <div class="mx-2 mt-3">
                                <input class="form-check-input" type="radio" name="mastery" id="inlineRadio1"
                                    value="1">
                                <label class="form-check-label" for="inlineRadio1">اتقن</label>
                                &nbsp;
                                <input class="form-check-input" type="radio" name="mastery" id="inlineRadio2"
                                    value="0">
                                <label class="form-check-label" for="inlineRadio2">لم يتقن</label>
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <label for="stimulus" style="font-weight: bolder">التقرير</label>
                            <textarea placeholder="ادخل التقرير التابع لهذا الهدف هنا..." class="form-control" name="description" rows="9"
                                cols="60" style="height: 250px"></textarea>
                        </div>

                        <input type="hidden" name="goal" class="goal" />

                        <button type="submit" class="mt-5 w-75 btn-new-target text-center rounded-2 text-white p-2">
                            حفط
                        </button>
                        <div type="button" class="btn-cancel rounded-2 p-2 mb-4 text-center">
                            الغاء
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
