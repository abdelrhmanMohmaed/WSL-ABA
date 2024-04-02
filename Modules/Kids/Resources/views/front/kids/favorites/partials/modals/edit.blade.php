<div class="fixed-form pt-5">
    <div class="register-form pt-0">
        <div class="container">
            <div style="height: 100vh" class="row">
                <form style="height: 35vh" method="post" action="{{route('kids.evaluate.favorites.update')}}" class="mt-5">
                    @csrf
                    <input id="favoriteId" type="hidden" name="favorite" >
                    <legend class="text-center m-2 mt-5"> تعديل تاريخ المفضلات</legend>
                    <div class="row container">
                        <div class="form-group col-8 ">
                            <label>التاريخ</label>
                            <input
                                type="date" name="date" class="form-control pr-5"
                                placeholder="أدخل التاريخ الجديد..."/>
                        </div>
                        <button type="submit"
                                class="btn mt-5 mb-5 w-25 text-center m-auto btn-blue">
                            موافق
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
