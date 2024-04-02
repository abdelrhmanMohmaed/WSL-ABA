<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;

class City extends Model
{
    protected $table = 'cities';

    public function Kids()
    {
        return $this->hasMany('Modules\Kids\Entities\Kid','city_id','id');
    }

    public function Country()
    {
        return $this->belongsTo('App\Models\Country','country_id','id');
    }


}
