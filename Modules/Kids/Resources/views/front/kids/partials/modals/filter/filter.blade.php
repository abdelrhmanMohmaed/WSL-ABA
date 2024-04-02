<div class="fixed-form">
    <div class="register-form pt-0">
        <div class="container">
            <div style="height: 100vh" class="row">
                <form style="height: 80vh" class="mt-5">
                    <legend class="text-center mt-5"> فلترة البحث</legend>
                    <p class="text-center">تحسين البحث عن المرضى من خلال تحديد المعايير وتصفية
                        النتائج بدقة</p>
                    <div class="row container">
                        <div class="form-group col-6">
                            <label> الاسم كاملاً</label>
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                placeholder="أدخل الاسم كاملاً..."
                            />
                        </div>
                        <div class="form-group col-6">
                            <label>رقم الهوية</label>
                            <input
                                type="number"
                                name="num"
                                class="form-control"
                                placeholder="أدخل رقم الهوية..."
                            />
                        </div>

                        <div class="form-group col-6">
                            <label>تاريخ الميلاد</label>
                            <input
                                type="date"
                                name="date"
                                class="form-control"
                                placeholder="أدخل تاريخ الميلاد..."
                            />
                        </div>
                        <div class="form-group col-6">
                            <label>الجنس</label>
                            <select class="form-control" name="gender">
                                <option value="">اختر الجنس</option>
                                <option value="1">ذكر</option>
                                <option value="0">انثي</option>
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="country">الجنسية</label>
                            <select class="form-control" name="country_id">
                                <option value="">اختر الجنسيه</option>
                                @foreach($countries as $country)
                                    <option
                                        value="{{ $country->id }}">{{ $country->name_ar }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="country">السكن</label>
                            <select class="form-control" name="city_id">
                                <option value="">اختر مكان السكن</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name_ar }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" name="filter"
                                class="btn mt-5  mb-5 w-25 text-center m-auto btn-blue">موافق
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
