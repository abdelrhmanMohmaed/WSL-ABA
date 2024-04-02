<?php

namespace Modules\Kids\Entities;

use Illuminate\Database\Eloquent\Model;


class Appsessions extends Model
{

    protected $table = 'app_sessions';
    public function Usersessions()
    {
        return $this->belongsTo('Modules\Kids\Entities\Usersessions', 'session_id', 'id');
    }

    public function Appale()
    {
        return $this->belongsTo('Modules\Kids\Entities\Appale','app_id','id');
    }

    public function Anssessions()
    {
        return $this->hasMany('Modules\Kids\Entities\Anssessions','app_id','id');
    }
}
