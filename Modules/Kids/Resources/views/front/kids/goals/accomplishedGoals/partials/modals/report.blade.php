<div class="report-model">
    <div class="report-form">
        <div class="container">
            <div class="row vh-100 justify-content-center">
                <form class="w-50 m-auto mx-2 bg-white rounded-4">
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

                        <div class="form-group col-12">
                            <label for="target" style="font-weight: bolder">ألاتقان</label>
                            <input type="text" name="target" disabled class="form-control w-100 mastery" />
                        </div>

                        <div class="form-group col-12">
                            <label for="stimulus" style="font-weight: bolder">التقرير</label>
                            <textarea disabled placeholder="ادخل التقرير التابع لهذا الهدف هنا..." class="form-control description"
                                name="description" rows="9" cols="60" style="height: 250px"></textarea>
                        </div>

                        <button style="background: #D82C2C" type="button"
                            class="btn-cancel rounded-2 p-2 my-4 text-center text-white">
                            خروج
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
