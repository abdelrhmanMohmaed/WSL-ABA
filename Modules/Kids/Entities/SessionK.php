<?php

namespace Modules\Kids\Entities;

use Illuminate\Database\Eloquent\Model;


class SessionK extends Model
{
    protected $table = 'colors';
    public function Usersessions()
    {
        return $this->hasMany('Modules\Kids\Entities\Usersessions','session_id','id');
    }

}
