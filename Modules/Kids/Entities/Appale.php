<?php

namespace Modules\Kids\Entities;

use Illuminate\Database\Eloquent\Model;


class Appale extends Model
{

    protected $table = 'appales';

    public function Appale_Nums()
    {
        return $this->hasMany('Modules\Kids\Entities\Appale_Num','app_id','id');
    }
}
