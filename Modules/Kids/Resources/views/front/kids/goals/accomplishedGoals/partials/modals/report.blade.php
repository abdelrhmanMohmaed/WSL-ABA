<div class="reportPlan-form">
    <div class="reportPlan-register-form pt-0">
        <div class="container">
            <div style="height: 100vh" class="row">
                <form style="height: 600px"
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
                            <div class="form-group col-12 ">
                                <label  style="font-weight: bolder">ألاتقان</label>
                                <input type="text" name="" disabled
                                       class="form-control w-100 mastery"/>
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <label for="stimulus" style="font-weight: bolder">التقرير</label>
                            <textarea placeholder="ادخل التقرير التابع لهذا الهدف هنا..." disabled
                                      class="form-control description" name="description" rows="9" cols="60"
                                      style="height: 250px"></textarea>
                        </div>
                        
                        <div class="form-group col-12 text-center">
                            <button style="background: #D82C2C" type="button" class="exist btn w-75 text-center m-auto btn-danger">
                                خروج
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
