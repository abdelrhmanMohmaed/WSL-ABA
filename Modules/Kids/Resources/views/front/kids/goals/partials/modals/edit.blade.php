<div class="edit-model w-100 fixed-form">
    <div class="edit-form">
        <div class="container mw-100 d-flex justify-content-center align-items-center min-vh-100">
            <div class="row w-100 justify-content-center">
                <form class="w-50 m-auto mx-2 bg-white rounded-4 p-4"
                    action="{{ route('kids.treatment-plans.goals.update') }}" method="post">
                    <div class="d-flex justify-content-end pt-3">
                        <button type="button" class="btn-close text-danger fw-bolder" aria-label="Close">x</button>
                    </div>
                    @csrf
                    <legend class="titleModel text-center fs-4 mb-4">
                        A1 المهمة
                    </legend>
                    <div class="row container m-auto justify-content-center">
                        <div class="form-group col-12 mb-3">
                            <label for="target"
                                class="form-label text-black d-block mb-1 fw-normal fs-6">الهدف</label>
                            <input type="text" name="target" class="form-control p-2 w-100 rounded-2 target"
                                placeholder="أدخل الهدف الجديدً..." />
                            <input type="hidden" name="goal" class="goal" />
                        </div>
                        <button type="submit" class="mt-3 w-75 btn-new-target text-center rounded-2 text-white p-2">
                            حفظ
                        </button>
                        <div type="button" class="btn-cancel mt-2 w-75 text-center rounded-2 p-2 mb-4">
                            إلغاء
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
