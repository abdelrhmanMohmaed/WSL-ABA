<?php

namespace Modules\Kids\Entities;

use Illuminate\Database\Eloquent\Model;


class Appale_Num extends Model
{

    protected $table = 'appales_nums';

    public function Appale()
    {
        return $this->belongsTo('Modules\Kids\Entities\Appale','app_id','id');
    }

    public function Appale_Ques()
    {
        return $this->hasMany('Modules\Kids\Entities\Appale_Que','num_id','id');
    }
}
