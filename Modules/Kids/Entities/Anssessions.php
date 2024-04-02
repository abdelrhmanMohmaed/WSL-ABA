<?php

namespace Modules\Kids\Entities;

use Illuminate\Database\Eloquent\Model;


class Anssessions extends Model
{

    protected $table = 'ans_sessions';
    public function Usersessions()
    {
        return $this->belongsTo('Modules\Kids\Entities\Usersessions', 'session_id', 'id');
    }

    public function Appsessions()
    {
        return $this->belongsTo('Modules\Kids\Entities\Usersessions', 'app_id', 'id');
    }

    public function Appale_Nums()
    {
        return $this->belongsTo('Modules\Kids\Entities\Appale_Num','ques_id','id');
    }

    public function Appale_Que()
    {
        return $this->belongsTo('Modules\Kids\Entities\Appale_Num','ans_id','id');
    }

}
