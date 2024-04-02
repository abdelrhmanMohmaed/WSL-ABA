<?php

namespace Modules\Kids\Entities;

use Illuminate\Database\Eloquent\Model;


class Appale_Que extends Model
{
    protected $table = 'appales_quests';
    protected $fillable = ['num_id', 'name', 'num'];

    public function Appale_Num()
    {
        return $this->belongsTo('Modules\Kids\Entities\Appale_Num', 'num_id', 'id');
    }

}
