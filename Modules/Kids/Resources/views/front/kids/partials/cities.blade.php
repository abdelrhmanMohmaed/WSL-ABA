
<option selected disabled>اختار المدينة...</option>
@foreach($cities as $item)
    <option value="{{$item->id}}" @selected(old('city_id') == $item->id)>{{$item->name_ar}}</option>
@endforeach
