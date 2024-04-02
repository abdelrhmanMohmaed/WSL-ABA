<?php

namespace App\Http\Traits;


use Modules\Kids\Entities\Kid;

trait KidsTrait
{
    function filterKids($request)
    {
        return Kid::
            // where('doctor_id',auth()->user()->id)->
            where(function ($query) use ($request) {
            if ($request->name != null) {
                $query->where('name', 'like', '%' . $request->name . '%');
            }

            if ($request->num != null) {
                $query->where('num', $request->num);
            }

            if ($request->date != null) {
                $query->where('date', $request->date);
            }

            if ($request->gender != null) {
                $query->where('gender', $request->gender);
            }

            if ($request->country_id != null) {
                $query->where('country_id', $request->country_id);
            }

            if ($request->city_id != null) {
                $query->where('city_id', $request->city_id);
            }
        })->get();
    }
}
