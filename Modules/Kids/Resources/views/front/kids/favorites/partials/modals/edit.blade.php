<div class="edit-model">
    <div class="edit-form">
        <div class="container">
            <div class="row vh-100 justify-content-center">
                <form class="w-50 m-auto mx-2 bg-white rounded-4" action="{{ route('kids.evaluate.favorites.update') }}"
                    method="post">
                    <div class="d-flex justify-content-end pt-3">
                        <button type="button" class="btn-close text-danger fw-bolder" aria-label="Close">x</button>
                    </div>
                    @csrf
                    <legend class="my-4 pl-4 fw-bolder text-center">
                        تعديل تاريخ المفضلات
                    </legend>

                    <div class="row container me-1 justify-content-center">
                        <div class="form-group col-12">
                            <label for="favoriteDate" style="font-weight: bolder">التاريخ</label>
                            <input id="favoriteDate" type="date" name="date" class="form-control w-100 target" />
                        </div>

                        <input id="favoriteId" type="hidden" name="favorite">

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
