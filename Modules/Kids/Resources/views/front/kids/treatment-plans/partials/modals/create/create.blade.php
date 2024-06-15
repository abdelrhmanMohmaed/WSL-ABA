<div class="createModel h-auto align-content-center">
    <div class="model-body">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 mx-auto">
                    <form class="bg-white rounded-4 p-4 text-center" method="post"
                        action="{{ route('kids.treatment-plans.goals.store', $kid->id) }}">
                        @csrf
                        <div class="d-flex justify-content-end pt-3">
                            <button type="button" class="btn-close text-danger fw-bolder" aria-label="Close">x</button>
                        </div>
                        <h3 class="mt-5 text-center">
                            أضافة أهداف أخرى
                        </h3>
                        <p class="text-center text-muted mb-4">
                            ادخل الهدف والمثير التابع لهذه المهمة
                        </p>

                        <div class="row container m-auto justify-content-center">
                            <div class="form-group col-12 mb-3">
                                <label for="target"
                                    class="form-label text-black d-block mb-1 fw-normal fs-6">الهدف</label>
                                <input type="text" name="target" class="form-control p-2 w-100 rounded-2 target"
                                    placeholder="أدخل الهدف الجديدً..." />
                            </div>

                            <div class="form-group col-12 mb-3">
                                <label for="target" class="form-label text-black d-block mb-1 fw-normal fs-6">المثير
                                    SD</label>
                                <input type="text" name="stimulus" class="form-control p-2 w-100 rounded-2 target"
                                    placeholder="أدخل المثير..." />
                            </div>
                        </div>
                        <input type="hidden" name="appeal" id="appeal">
                        <button type="submit" class="mt-3 w-75 btn-new-target text-center rounded-2 text-white p-2">
                            حفظ
                        </button>
                        <div class="d-flex justify-content-center">
                            <div type="button" class="btn-cancel mt-3 w-75 text-center rounded-2 p-2">
                                إلغاء
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
