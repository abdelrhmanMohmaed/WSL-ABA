<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;

class Country extends Model
{

    protected $table = 'countries';

    public function Kids()
    {
        return $this->hasMany('Modules\Kids\Entities\Kid','country_id','id');
    }

    public function Cities()
    {
        return $this->hasMany('App\Models\City','country_id','id');
    }


}
